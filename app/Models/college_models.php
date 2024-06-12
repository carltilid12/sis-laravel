<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class college_models extends Model
{
    use HasFactory;

    protected $table = 'tblcolleges';
    protected $primaryKey = 'col_id';

    public $timestamps = false;

    // Specify the attributes that are mass assignable
    protected $fillable = ['col_code', 'col_name'];
}
