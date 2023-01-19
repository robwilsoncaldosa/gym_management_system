<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable =[
        "name",
        "weight",
        "muscles_used",
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function gyms()
    {
        return $this->belongsToMany(Gym::class)->withPivot(['total_hours','membership_fee']);
    }
}
