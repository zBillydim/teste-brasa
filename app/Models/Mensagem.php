<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    use HasFactory;

    protected $table = 'mensagens';

    protected $fillable = [
        'professor_id', 'nome_aluno', 'data_envio', 'status', 'mensagem',
    ];

    protected $dates = ['data_envio'];

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
