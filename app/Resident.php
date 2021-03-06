<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $fillable = [
        'tenant_number', 
        'resident_name', 
        'is_delinquented', 
        'tel', 
        'content'
    ];
    
     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
