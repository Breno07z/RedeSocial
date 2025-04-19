<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'birthDate',
        'bloodType',
        'allergies',
        'medicationName',
        'medicationFrequency',
        'conditions',
        'emergencyContact',
        'notes',
        'profile_image',
        'banner_image',
    ];

    public function posts()
    {
    return $this->hasMany(Post::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comentariosRecebidos()
    {
        return $this->hasMany(Comentarios::class, 'id_usuario_destinatario');
    }
    
    public function comentariosFeitos()
    {
        return $this->hasMany(Comentarios::class, 'id_usuario_origem');
    }

}
