<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainData extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_name',
        'website_description',
        'website_phone',
        'website_mail',
        'website_youtube',
        'website_twitter',
        'website_tiktok',
        'website_facebook',
    ];
}
