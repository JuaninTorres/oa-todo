<?php

namespace App;

use Webpatser\Uuid\Uuid;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Sobreescribimos lo que sucede al momento de crear un nuevo usuario
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function($model){
            $model->uuid = Uuid::generate(4);
        });
    }

    /**
     * Proyectos pertenecientes al Usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Tareas de las cuales yo soy responsable
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'responsible_id')->with('project');
    }

    public function unfinishedTasks()
    {
        return $this->hasMany(Task::class, 'responsible_id')->with('project')->unfinished();
    }

    /**
     * Nos indica si el usuario es o no admin
     * @return bool
     */
    public function isAdmin()
    {
        return $this->user_type == 'admin';
    }

    /**
     * Sobreescritura del guardado del password para que quede
     * inmediatamente con bcrypt sin importar el origen de
     * esta llamada
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        if ( ! empty($password))
        {
            $this->attributes['password'] = bcrypt($password);
        }
    }
}
