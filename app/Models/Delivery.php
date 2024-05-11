<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'curriculum_id',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
    ];

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }
}

