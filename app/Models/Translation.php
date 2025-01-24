<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Translation extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'locale',
        'content',
        'tags',
    ];

    // protected $casts = [
    //     'tags' => 'array', // Automatically casts tags to/from JSON
    // ];
}
