<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    //indicar qual a chave primaria da tabela Livros
    protected $primaryKey="id_livro";

    //esta propriedade não é necessaria
    //mas vai ajudar-nos em situações futuras
    protected $table = "livros";

    public function genero() {
    	//com o belong 1 livro tem um genero
    	return $this->belongsTo('App\Models\Genero', 'id_genero');
    }
    public function autor() {
        return $this->belongsTo('App\Models\Autor', 'id_autor');  
    }
    public function autores () {
        return $this->belongsToMany(
            'App\Models\Autor',
            'autores_livros', // nome da tabela pivot
            'id_livro', // fk de autores livros que relaciona com Livro
            'id_autor' // fk de autores livros que relaciona com Autor
        )->withTimestamps();
    }
    public function editoras () {
        return $this->belongsToMany(
            'App\Models\Editora',
            'edicoes',
            'id_livro',
            'id_editora'
        )->withTimestamps();
    }

}
