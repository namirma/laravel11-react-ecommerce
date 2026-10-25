<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 * @method static create(array $data)
 * @method static where(string $string, string $string1, string $string2)
 * @property mixed $thumbnail
 * @property mixed $first_image
 * @property mixed $second_image
 * @property mixed $third_image
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug',
        'qty','price', 'description', 'thumbnail', 'first_image' ,
        'second_image', 'third_image', 'status'];

    public function colors(): BelongsToMany
    {
        return $this->BelongsToMany(Color::class);
    }
    public function sizes(): BelongsToMany
    {
        return $this->BelongsToMany(Size::class);
    }
    public function orders(): BelongsToMany
    {
        return $this->BelongsToMany(Order::class);
    }
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class)
            ->with('user')
            ->where('approved', 1)
            ->latest();
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
