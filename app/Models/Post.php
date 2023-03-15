<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Categoria;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "post";

    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'contenido',
        'id_categoria',
        'id_autor',
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function autor(){
        return $this->belongsTo(Admin::class);
    }

}
