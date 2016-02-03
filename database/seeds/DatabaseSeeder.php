<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Tablas que serán eliminadas cada vez que corra un db:seed
     *
     * @var array
     */
    protected $tables = [
                'users',
                'password_resets',
                'projects',
                'tasks',
    ];

    /**
     * Seeders que correrán en este mismo orden
     *
     * @var array
     */
    protected $seeders = [
                'UserTableSeeder',
                'ProjectTableSeeder',
                'TaskTableSeeder',
    ];

    private static function safe()
    {
        if(config('database.default') == 'mysql')
        {
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }

    private static function unsafe()
    {
        if(config('database.default') == 'mysql')
        {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
        }
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->cleanDatabase();
        foreach ($this->seeders as $seedClass)
        {
            $this->call($seedClass);
        }
        Model::reguard();
    }

    /**
     * Limpieza de las tablas de la base de datos, para poder ejecutar de manera correcta los Seeders
     */
    private function cleanDatabase()
    {
        self::unsafe();
        foreach ($this->tables as $table)
        {
            DB::table($table)->truncate();
        }
        self::safe();
    }
}
