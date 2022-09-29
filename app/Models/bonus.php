<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bonus extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bonusId',
        'sponsor',
        'sponsorId',
        'username',
        'email',
        'amount',
        'package',
        'status',
        'dayCounter',
    ];

}
