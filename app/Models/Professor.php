<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Professor extends Authenticatable
{
    use HasFactory;

    protected $table = 'professores';

    protected $fillable = [
        'nome', 'email', 'password',
    ];
    protected $primaryKey = 'id';

    protected $hidden = [
        'password',
    ];
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';
    protected $guarded = [];
    protected $casts = [
        'CREATED_AT' => 'datetime:Y-m-d H:i:s',
        'UPDATED_AT' => 'datetime:Y-m-d H:i:s',
    ];
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
    public function scopeVerifyHasEmail($query, $email)
    {
        return $query->where('email', $email);
    }
    public function mensagens()
    {
        return $this->hasMany(Mensagem::class);
    }
}
