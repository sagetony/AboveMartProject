<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buypackage extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'transactionId',
        'userId',
        'username',
        'email',
        'phoneNumber',
        'amount',
        'package',
        'goldenBonus',
        'goldenBonusStatus',
        'status',
        'dayCounter',
    ];
}
