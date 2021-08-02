<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Employees extends Model
{
     use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name',
        'insurance',
        'basic',
        'transportationAllowance',
        'residencyAllowance',
        'original',
        'actual',
        'hours',
        'user_id'
       ];
}
