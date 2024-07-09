<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettlementTransition extends Model
{
    use HasFactory;
    protected $table = 'settlement_transitions';

    protected $primaryKey = 'STrans_id';

    public $timestamps = false;

    protected $fillable = [
        's_id',
        'lang_id',
        's_name',
        's_descr',
    ];

    protected $casts = [
        'STrans_id' => 'integer',
        's_id' => 'integer',
        'lang_id' => 'integer',
        's_name' => 'string',
        's_descr' => 'string',
    ];

    public function settlement()
    {
        return $this->belongsTo(Settlement::class, 's_id', 's_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'lang_id', 'lang_id');
    }
}
