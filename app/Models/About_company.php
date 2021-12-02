<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About_company extends Model
{
    use HasFactory;

    protected $table = 'about_companies';
    protected $fillable = [
        'comp_name',
        'comp_phone',
        'comp_email',
        'comp_address',
        'comp_about',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [];
}
