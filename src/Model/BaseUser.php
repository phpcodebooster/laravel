<?php

namespace PCB\Laravel\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BaseUser extends Authenticatable
{
    use Notifiable;

    protected $hidden = [ 'password', 'remember_token' ];
    protected $fillable = ['id', 'username', 'password', 'email', 'name', 'role'];

    public static $roles = [
        'user' => 'User',
        'admin' => 'Admin',
        'super_admin' => 'Super Admin'
    ];

    public function isUser()
    {
        return $this->role === 'user';
    }
    public function isAdmin()
    {
        return $this->role == 'admin';
    }
    public function isSuperAdmin()
    {
        return $this->role === 'super_admin';
    }
    public function hasAdminAccess()
    {
        return ($this->role === 'admin' || $this->role === 'super_admin');
    }
}
