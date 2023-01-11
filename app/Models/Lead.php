<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'leads';

    protected $fillable = [
        'telefone',
        'nome',
        'email',
        'como_soube_id',
        'cpf',
        'cep',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'viabilidade',
        'observacao',
        'status',
        'responsavel_id',
        'latitude',
        'longitude',
        'plano_de_interesse',
        'faturas',
        'origem_de_informacao'
    ];
}
