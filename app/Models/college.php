<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class college extends Model
{
    use HasFactory;

    protected $table = 'college';

    // Specify the attributes that are mass assignable
    protected $fillable = ['collegeCode', 'collegeName'];
}
