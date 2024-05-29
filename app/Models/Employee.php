<?php

namespace App\Models;

use App\Helpers\DataHelpers;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

/**
 * Model @Employee
 */
class Employee extends Model
{
    use HasFactory;

    //protected $fillable = ['nome', 'cpf', 'data_contratacao', 'data_demissao'];

    /**
     * @var string[]
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Formata a data de contratação para entrada e saída
     * @return Attribute
     */
    protected function dataContratacao(): Attribute
    {
        return DataHelpers::convertDate();
    }

    /**
     * Mapeia o relacionamento com o endereço
     * Um funcionário tem um endereço
     *
     * @return HasOne
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    /**
     * Um funcionário pertence a muitos projetos
     *
     * @return BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'employee_project', 'employee_id', 'project_id');
    }

    /**
     * Cria um funcionário no banco com endereço.
     * @param array $funcionario
     * @param array $endereco
     * @return bool
     */
    static public function criar(array $funcionario, array $endereco): bool
    {
        try {
            DB::beginTransaction();

            $funcionario = Employee::create($funcionario);
            $funcionario->address()->create($endereco);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
        return true;
    }

    /**
     * Atualiza o funcionário no banco com endereço.
     * @param array $funcionario
     * @param array $endereco
     * @return bool
     */
    public function atualizar(array $funcionario, array $endereco): bool
    {
        try {
            DB::beginTransaction();

            $this->update($funcionario);
            $this->address()->update($endereco);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
        return true;
    }

    /**
     * Apaga o funcionario e seu respectivo endereço do banco de dados.
     * @return bool
     */
    public function deletar(): bool
    {
        try {
            DB::beginTransaction();

            $this->address()->delete();
            $this->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
        return true;
    }
}
