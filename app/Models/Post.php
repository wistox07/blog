<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Post extends Model
{
    use HasFactory;

    /* Se recomiendo poner la relacion en singular
    2 clave foranea
    3 primary key del modelo padre
    */

    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }

}
