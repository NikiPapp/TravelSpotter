<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';

    protected $primaryKey = 'review_id';

    public $timestamps = false;

    protected $fillable = [
        's_id',
        'attraction_id',
        'user_name',
        'review_text',
        'review_date',
    ];

    protected $casts = [
        'review_id' => 'integer',
        's_id' => 'integer',
        'attraction_id' => 'integer',
        'user_name' => 'string',
        'review_text' => 'string',
        'review_date' => 'datetime',
    ];

    public function settlement()
    {
        return $this->belongsTo(Settlement::class, 's_id', 's_id');
    }

    public function attraction()
    {
        return $this->belongsTo(Attractions::class, 'attraction_id', 'attraction_id');
    }
}
