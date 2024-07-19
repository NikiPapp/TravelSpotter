<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagTransition extends Model
{
    use HasFactory;
    protected $primaryKey = 'TT_id';

    protected $fillable = [
        'tag_id',
        'lang_id',
        'tag_name',
        
    ];
}
