<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
'designation',
'profile',
'from',
'to',
'user_id'
    ];
}
