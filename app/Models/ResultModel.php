<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'patientId',
        'addedBy',
        'result',
        'referenceRange',
        'comments',
    ];
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patientId');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'addedBy');
    }
}
