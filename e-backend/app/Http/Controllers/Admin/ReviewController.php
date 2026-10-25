<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function index(): Application|Factory|View
    {
        return view('admin.reviews.index')
            ->with([
                'reviews' => Review::latest()->get()
            ]);
    }

    public function toggleApprovedStatus(Review $review, $status): RedirectResponse
    {
        $review->update([
            'approved' => $status
        ]);

        return redirect()->route('admin.reviews.index')
            ->with([
                'success' => "Review status {$status} successfully changed!"
            ]);
    }

    public function destroy(Review $review): RedirectResponse{
        $review->delete();
        return redirect()->route('admin.reviews.index')
            ->with([
                'success' => "Review successfully deleted!"
            ]);
    }

}
