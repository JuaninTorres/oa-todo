<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * Usuario creador del proyecto
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Tareas que perteneces a este proyecto
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class)->with('responsible');
    }

    /**
     * Descripción maquillada con Markdown
     *
     * @return mixed
     */
    public function getDescription()
    {
        return transformMarkdowntoHtml($this->description);
    }

    /**
     * Porcentaje de progreso del proyecto, segun la cantidad de tareas finalizadas
     * @return integer
     */
    public function getProgressAttribute()
    {
        $totalTasks = $this->tasks()->count();
        if($totalTasks == 0)
        {
            return 0;
        }

        $finishedTasks = $this->tasks()->finished()->count();

        return round($finishedTasks * 100 / $totalTasks);
    }
}
