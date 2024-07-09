<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';

    protected $primaryKey = 'iso_id';

    public $timestamps = false;

    protected $fillable = [
        'def_name',
    ];

    protected $casts = [
        'iso_id' => 'string',
        'def_name' => 'string',
    ];
}
