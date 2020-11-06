<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class editora extends Model
{
    use HasFactory;
    protected $primaryKey="id_editora";
    protected $table = "editoras";

    public function livros () {
    	return $this->belongsToMany(
            'App\Models\Livro',
            'edicoes', // nome da tabela pivot
            'id_editora', // fk de autores livros que relaciona com Livro
            'id_livro' // fk de autores livros que relaciona com Autor
        )->withTimestamps();
    }
}
