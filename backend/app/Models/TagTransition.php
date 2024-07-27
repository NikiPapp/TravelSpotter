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
    public function settlements()
    {
        return $this->belongsToMany(Settlement::class, 'settlement_tags', 'TT_id', 's_id');
    }

    public function attractions()
    {
        return $this->belongsToMany(Attraction::class, 'attraction_tags', 'TT_id', 'attraction_id');
    }
}
