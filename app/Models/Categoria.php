<?php

namespace App\Models;

use App\Models\Post;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "categoria";

    protected $primaryKey = "id";

    protected $fillable = [
        'name',
    ];

    public function post(){
        return $this->hasMany(Post::class);
    }

}
