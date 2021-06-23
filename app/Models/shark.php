<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shark extends Model
{
    use HasFactory;
    public $timestamp = true;
    protected $fillable = [
        'name',
        'email',
        'shark_level',
        'published'
    ];
}
