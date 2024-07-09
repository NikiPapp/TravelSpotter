<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryTransition extends Model
{
    use HasFactory;
    protected $table = 'country_transitions';

    protected $primaryKey = 'CT_id';

    public $timestamps = false;

    protected $fillable = [
        'iso_id',
        'lang_id',
        'c_name',
    ];

    protected $casts = [
        'CT_id' => 'integer',
        'iso_id' => 'string',
        'lang_id' => 'integer',
        'c_name' => 'string',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class, 'lang_id', 'lang_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'iso_id', 'iso_id');
    }
}
