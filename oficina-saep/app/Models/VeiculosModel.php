<?php
namespace App\Models;
use CodeIgniter\Model;

// Model = representa a tabela no banco
class VeiculosModel extends Model
{
    protected $table = 'VEICULOS'; // nome da tabela
    protected $primaryKey = 'VEI_ID'; // chave primária

    // Campos permitidos para INSERT/UPDATE
    protected $allowedFields = [
        // colunas na tabela VEICULOS do banco
        'VEI_PLACA',
        'VEI_MARCA',
        'VEI_MODELO',
        'VEI_ANO',
        'FK_CLI_ID'
    ];
}