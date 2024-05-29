<?php

namespace App\Models;

use App\Helpers\DataHelpers;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'orcamento', 'data_inicio', 'data_final', 'client_id'];

    protected function dataInicio(): Attribute
    {
        return DataHelpers::convertDate();
    }

    protected function dataFinal(): Attribute
    {
        return DataHelpers::convertDate();
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
