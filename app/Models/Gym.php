<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;
    protected $fillable=[

'name',
'address',
    ];
    public function equipments()
    {
        return $this->belongsToMany(Equipment::class);
    }

}
