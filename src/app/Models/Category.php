<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// お問い合わせ種類
class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'content'
    ];
}
