<?php
namespace App\Models;
use CodeIgniter\Model;

// Model = representa a tabela no banco
class UsuariosModel extends Model
{
    protected $table = 'USUARIOS'; // nome da tabela
    protected $primaryKey = 'USU_ID'; // chave primária

    // Campos permitidos para INSERT/UPDATE
    protected $allowedFields = [
        // colunas na tabela USUARIO do banco
        'USU_NOME',
        'USU_EMAIL',
        'USU_SENHA'
    ];
}