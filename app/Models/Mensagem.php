<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    use HasFactory;

    protected $table = 'mensagens';

    protected $fillable = [
        'professor_id',
        'nome_aluno',
        'nascimento',
        'whatsapp',
        'cidade',
        'estado',
        'mensagem',
    ];

    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';
    protected $guarded = [];
    protected $casts = [
        'CREATED_AT' => 'datetime:Y-m-d H:i:s',
        'UPDATED_AT' => 'datetime:Y-m-d H:i:s',
    ];

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
