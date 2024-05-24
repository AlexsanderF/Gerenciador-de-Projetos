<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
class Address extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'cep'];

    /**
     * Mapeia o relacionamento com funcionário
     * Um endereço pertence a um funcionário
     *
     * @return BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Retorna o endereço do funcionário completo usando o método assessor
     * @return Attribute
     */
    protected function enderecoCompleto(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, Employee|array $employee) {
                return vsprintf('%s, %s - %s, %s - %s, %s. (%s)', [
                    $employee['logradouro'],
                    $employee['numero'],
                    $employee['bairro'],
                    $employee['cidade'],
                    $employee['estado'],
                    $employee['cep'],
                    $employee['complemento']
                ]);
            }
        );
    }
}
