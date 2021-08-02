<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monthly extends Model
{
    protected $table = 'monthly';
    protected $fillable = [
        'employees_id',
        'overtime',
        'discount',
        'user_id',
        'employees_name'
       ];
    use HasFactory;
    protected $casts = [
        'created_at' => 'datetime:Y-m',
    ];

}
