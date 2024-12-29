<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'caminho',
        'aprovado',
        'user_id', // Permite atribuir o user_id na criação da foto
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
