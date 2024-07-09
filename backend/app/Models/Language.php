<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $table = 'languages';

    protected $primaryKey = 'lang_id';

    public $timestamps = false;

    protected $fillable = [
        'code',
        'lang_name',
    ];

    protected $casts = [
        'lang_id' => 'integer',
        'code' => 'string',
        'lang_name' => 'string',
    ];
}
