<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Michelf\Markdown;

class Task extends Model
{

    protected $casts = [
        'finished' => 'boolean'
    ];

    protected $fillable = [
        'name',
        'description',
        'finished',
        'responsible_id',
        'project_id',
    ];

    /**
     * Proyecto al que pertenece esta tarea
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Usuario responsable de realizar la tarea
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function responsible()
    {
        return $this->belongsTo(User::class, 'responsible_id');
    }

    /**
     * Obtención del icono asociado segun el estado
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIconFinishedStatus()
    {
        if($this->finished)
        {
            return view('tasks.partials.finished');
        }

        return view('tasks.partials.unfinished');
    }

    /**
     * Obtención de la descripción con el maquillaje de Markdown
     *
     * @return mixed
     */
    public function getDescription()
    {
        return Markdown::defaultTransform($this->description);
    }

    /**
     * Scope para obtener las finalizadas
     *
     * @param $query
     * @return mixed
     */
    public function scopeFinished($query)
    {
        return $query->where('finished', true);
    }

    public function scopeUnfinished($query)
    {
        return $query->where('finished', false);
    }
}
