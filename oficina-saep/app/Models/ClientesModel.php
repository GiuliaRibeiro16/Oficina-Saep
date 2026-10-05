<?php
namespace App\Models;
use CodeIgniter\Model;

// Model = representa a tabela no banco
class ClientesModel extends Model
{
    protected $table = 'CLIENTES'; // nome da tabela
    protected $primaryKey = 'CLI_ID'; // chave primária

    // Campos permitidos para INSERT/UPDATE
    protected $allowedFields = [
        // colunas na tabela CLIENTE do banco
        'CLI_NOME',
        'CLI_CPF',
        'CLI_TELEFONE'
    ];
}