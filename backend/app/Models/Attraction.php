<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    use HasFactory;
    protected $table = 'attractions';

    protected $primaryKey = 'attraction_id';

    public $timestamps = false;

    protected $fillable = [
        's_id',
    ];

    protected $casts = [
        'attraction_id' => 'integer',
        's_id' => 'integer',
    ];

    public function settlement()
    {
        return $this->belongsTo(Settlement::class, 's_id', 's_id');
    }
}
