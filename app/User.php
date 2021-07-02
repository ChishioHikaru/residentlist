<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'token', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // 入居者一覧を取得するためのメソッド
    public function residents()
    {
        return $this->hasMany(Resident::class);
    }
    
    // 滞納者一覧を取得するためのメソッド
    public function delinquents()
    {
        return $this->hasMany(Delinquent::class);
    }
    
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('residents');
    }
    
    
    public function delinquent($is_delinquented)
    {
        
    }
    
    
    public function undelinquent($is_delinquented)
    {
       
    }
    
    
}
