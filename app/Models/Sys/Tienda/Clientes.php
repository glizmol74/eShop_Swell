<?php

namespace App\Models\Sys\Tienda;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $fillable = [
        'cli_cod',
        'cli_razon',
        'cli_cuit',
        'cli_direccion',
        'cli_telefono',
        'cli_whatsapp',
        'cli_saldo',
        'cli_tipo',
        'cli_cod_postal',
        'cli_pais',
        'cli_provincia',
        'cli_estado',
        'cli_user',
    ];
}
