<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttractionTag extends Model
{
    use HasFactory;
   
    protected $table = 'attraction_tags';

    protected $primaryKey = 'at_id';

    public $timestamps = false;

    protected $fillable = [
        'attraction_id',
        'tag_id',
    ];

    protected $casts = [
        'at_id' => 'integer',
        'attraction_id' => 'integer',
        'tag_id' => 'integer',
    ];

    public function attraction()
    {
        return $this->belongsTo(Attractions::class, 'attraction_id', 'attraction_id');
    }

    public function tag()
    {
        return $this->belongsTo(Tags::class, 'tag_id', 'tag_id');
    }
}
