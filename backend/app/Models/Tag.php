<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';

    protected $primaryKey = 'tag_id';

    public $timestamps = false;

    protected $fillable = [
        'tag_name',
        'applicable_to',
    ];

    protected $casts = [
        'tag_id' => 'integer',
        'tag_name' => 'string',
        'applicable_to' => 'string',
    ];
}
