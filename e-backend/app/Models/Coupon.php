<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @method static latest()
 * @method static create($validated)
 * @method static whereName(mixed $name)
 * @method static find($coupon_id)
 * @property mixed $valid_until
 */
class Coupon extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'discount', 'valid_until'];

    /*
     * convert the coupon name to uppercase
     * */
    public function setNameAttribute($value): void
    {
        $this->attributes['name'] = Str::upper($value);
    }

    /*
     * check the coupon is valid
     * */

    public function checkIfValid(): bool
    {
        if ($this->valid_until > Carbon::now()) {
            return true;
        } else {
            return false;
        }
    }
}
