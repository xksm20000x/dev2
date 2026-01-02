<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
    ];

    public $timestamps = false;
    protected $primaryKey = 'idx';
    const CREATED_AT = 'regdate';
    const UPDATED_AT = null;
}
