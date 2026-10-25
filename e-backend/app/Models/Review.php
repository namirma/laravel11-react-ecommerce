<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static where(array $array)
 * @method static create(array $array)
 * @method static latest()
 */
class Review extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body',
        'user_id','approved',
        'rating','product_id'];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
    public function product(): BelongsTo
    {
        return $this->BelongsTo(Product::class);
    }

    public function getCreatedAtAttribute($value): string
    {
        return Carbon::parse($value)->diffForHumans();
    }
}
