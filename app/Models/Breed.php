<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $table = 'breeds';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
    use HasFactory;
}
