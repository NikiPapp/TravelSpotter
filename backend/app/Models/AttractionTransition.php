<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttractionTransition extends Model
{
    use HasFactory;

    protected $table = 'attraction_translations';

    protected $primaryKey = 'atrans_id';

    public $timestamps = false;

    protected $fillable = [
        'attraction_id',
        'lang_id',
        'attraction_name',
        'attraction_descr',
    ];

    protected $casts = [
        'atrans_id' => 'integer',
        'attraction_id' => 'integer',
        'lang_id' => 'integer',
        'attraction_name' => 'string',
        'attraction_descr' => 'string',
    ];

    public function attraction()
    {
        return $this->belongsTo(Attractions::class, 'attraction_id', 'attraction_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'lang_id', 'lang_id');
    }
}
