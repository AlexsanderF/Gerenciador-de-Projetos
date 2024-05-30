<?php

namespace App\Models;

use App\Helpers\DataHelpers;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 *
 */
class Project extends Model
{
    use HasFactory;

    /**
     * Atributos que podem ser preenchido em massa por get/set
     *
     * @var string[]
     */
    protected $fillable = ['nome', 'orcamento', 'data_inicio', 'data_final', 'client_id'];

    /**
     * Função para retornar a data_inicio do projeto no padrão PT/BR
     *
     * @return Attribute
     */
    protected function dataInicio(): Attribute
    {
        return DataHelpers::convertDate();
    }

    /**
     * Função para retornar a data_final do projeto no padrão PT/BR
     *
     * @return Attribute
     */
    protected function dataFinal(): Attribute
    {
        return DataHelpers::convertDate();
    }

    public function orcamento(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => number_format($value, 2, ',', '.')
        );
    }

    /**
     * Um projetos pertence a um cliente
     *
     * @return BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    /**
     * Um projetos pertence a muitos funcionários
     *
     * @return BelongsToMany
     */
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_project', 'project_id', 'employee_id');
    }
}
