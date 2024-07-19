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
        'TT_id',
    ];

    protected $casts = [
        'at_id' => 'integer',
        'attraction_id' => 'integer',
        'TT_id' => 'integer',
    ];

    public function attraction()
    {
        return $this->belongsTo(Attractions::class, 'attraction_id', 'attraction_id');
    }

    public function tag()
    {
        return $this->belongsTo(TagsTransitions::class, 'TT_id', 'TT_id');
    }
}
