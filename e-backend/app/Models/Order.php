<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static whereDay(string $string, \Carbon\Carbon $today)
 * @method static whereMonth(string $string, int $month)
 * @method static whereYear(string $string, int $year)
 * @method static create(array $array)
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = ['qty', 'total',
        'delivered_at','user_id', 'coupon_id'];

    public function products(): BelongsToMany
    {
        return $this->BelongsToMany(Product::class);
    }
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
    public function coupon(): BelongsTo
    {
        return $this->BelongsTo(Coupon::class);
    }
    public function getCreatedAtAttribute($date): string
    {
        return Carbon::parse($date)->diffForHumans();
    }
}
