<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettlementTag extends Model
{
    use HasFactory;
    protected $table = 'settlement_tags';

    protected $primaryKey = 'st_id';

    public $timestamps = false;

    protected $fillable = [
        's_id',
        'tag_id',
    ];

    protected $casts = [
        'st_id' => 'integer',
        's_id' => 'integer',
        'tag_id' => 'integer',
    ];

    public function settlement()
    {
        return $this->belongsTo(Settlement::class, 's_id', 's_id');
    }

    public function tag()
    {
        return $this->belongsTo(Tags::class, 'tag_id', 'tag_id');
    }
}
