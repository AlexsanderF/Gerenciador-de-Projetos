<?php

namespace App\Models;

use App\Helpers\DataHelpers;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

/**
 * Model $Project
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

    /**
     * Retorna o orçamento no padrão PT/BR
     * @return Attribute
     */
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

    /**
     * Cria um novo projeto com os funcionários alocados.
     * @param array $projeto
     * @param array $funcionariosAlocados
     * @return bool
     */
    static public function criarComFuncionarios(array $projeto, array $funcionariosAlocados): bool
    {
        try {
            DB::beginTransaction();

            $projeto = self::create($projeto);
            $projeto->employees()->sync($funcionariosAlocados);

            DB::commit();
        } catch (\Throwable $exception) {
            DB::rollBack();

            return false;
        }
        return true;
    }

    public function atualizarComFuncionarios(array $projeto, array $funcionariosAlocados): bool
    {
        try {
            DB::beginTransaction();

            $this->update($projeto);
            $this->employees()->sync($funcionariosAlocados);

            DB::commit();
        } catch (\Throwable $exception) {
            DB::rollBack();
            return false;
        }
        return true;
    }
}
