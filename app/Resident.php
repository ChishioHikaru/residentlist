<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $fillable = ['tenant_number, 8', 'name', 'tel, 11', 'content'];
    
     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
