<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    use HasFactory;
    protected $table = 'settlements';

    protected $primaryKey = 's_id';

    public $timestamps = false;

    protected $fillable = [
        'iso_id',
    ];

    protected $casts = [
        's_id' => 'integer',
        'iso_id' => 'string',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'iso_id', 'iso_id');
    }
}
