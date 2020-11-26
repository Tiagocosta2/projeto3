<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class autor extends Model
{
    use HasFactory;
    protected $primaryKey="id_autor";
    protected $table = "autores";

    protected $fillable = [
        'nome',
        'nacionalidade',
        'data_nascimento',
        'fotografia',
    ];
    //public function livros() {
    	//return $this->hasMany('App\Models\Livro', 'id_autor');
    //}
    public function livros () {
    	return $this->belongsToMany(
            'App\Models\Livro',
            'autores_livros', // nome da tabela pivot
            'id_autor', // fk de autores livros que relaciona com Livro
            'id_livro' // fk de autores livros que relaciona com Autor
        )->withTimestamps();
    }
}
