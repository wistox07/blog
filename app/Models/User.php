<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;
use App\Models\Profile;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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

    public function posts(){
        /* 1er argumento clase del modelo relacionado
           2do argumento clave foranea de la tabla post
           3er argumento clave primaria de la tabla user*/
        return $this->hasMany(Post::class,"user_id","id");
    }

    
    public function profile(){
        return $this->belongsTo(Profile::class,"profile_id","id");
    }

    /* Nombre de la relación en plural*/
    public function roles(){
        /*1 clase del modelo relaiconado
          2  tabla pivote
          3 llave foranea de la tabla principal
          4 llave foranea de la otra tabla
        */
        return $this->belongsToMany(Role::class,"role_user","user_id","role_id");
    }


    


}
