<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    protected $table = 'medical_records';
    protected $primaryKey = 'id';
    protected $fillable = [
        'animal_id',
        'date',
        'description',
        'treatment',
        'veterinarian'
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
    use HasFactory;
}
