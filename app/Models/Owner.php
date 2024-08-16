<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = 'owners';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'phone', 'address'];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
    use HasFactory;
}
