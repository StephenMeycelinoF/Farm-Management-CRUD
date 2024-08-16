<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animals';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'species', 'age', 'description'];
    use HasFactory;

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

}
