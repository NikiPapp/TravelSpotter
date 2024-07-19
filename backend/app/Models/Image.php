<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $primaryKey = 'image_id';

    protected $fillable = [
        's_id',
        'attraction_id',
        'image_path',
    ];

    public function settlement()
    {
        return $this->belongsTo(Settlement::class, 's_id', 's_id');
    }

    public function attraction()
    {
        return $this->belongsTo(Attraction::class, 'attraction_id', 'attraction_id');
    }
}
