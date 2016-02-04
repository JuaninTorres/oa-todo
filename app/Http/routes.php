<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/', [
        'uses' => 'PageController@home',
        'as' => 'home_path'
    ]);

    Route::group(['middleware' => 'guest'], function(){
        Route::post('ingresar', [
            'as' => 'login_path',
            'uses' => 'Auth\AuthController@postLogin'
        ]);
    });

    Route::group(['middleware' => 'auth'], function(){


        Route::get('salir', [
            'as' => 'logout_path',
            'uses' => 'Auth\AuthController@getLogout'
        ]);

        Route::group([
            'as' => 'Projects::',
            'prefix' => 'proyecto'
        ], function(){

            Route::get('', [
                'as' => 'list_path',
                'uses' => 'ProjectController@index'
            ]);

            Route::get('crear', [
                'as' => 'create_path',
                'uses' => 'ProjectController@create'
            ]);

            Route::put('crear', [
                'as' => 'create_path',
                'uses' => 'ProjectController@store'
            ]);

            Route::get('{project}', [
                'as' => 'show_path',
                'uses' => 'ProjectController@show'
            ]);

            Route::get('{project}/editar', [
                'as' => 'edit_path',
                'uses' => 'ProjectController@edit'
            ]);

            Route::patch('{project}/editar', [
                'as' => 'edit_path',
                'uses' => 'ProjectController@update'
            ]);

            Route::group([
                'as' => 'Tasks::',
                'prefix' => '{project}/tarea'
            ], function(){
                Route::get('crear', [
                    'as' => 'create_path',
                    'uses' => 'TaskController@create'
                ]);

                Route::put('crear', [
                    'as' => 'create_path',
                    'uses' => 'TaskController@store'
                ]);

                Route::get('{task}', [
                    'as' => 'show_path',
                    'uses' => 'TaskController@show'
                ]);

                Route::get('{task}/editar', [
                    'as' => 'edit_path',
                    'uses' => 'TaskController@edit'
                ]);

                Route::patch('{task}/editar', [
                    'as' => 'edit_path',
                    'uses' => 'TaskController@update'
                ]);

                Route::patch('{task}/finalizar', [
                    'as' => 'finish_path',
                    'uses' => 'TaskController@finish'
                ]);
            });
        });



        Route::group([
            'as' => 'Tasks::',
            'prefix' => 'tareas'
        ], function(){

            Route::get('', [
                'as' => 'list_path',
                'uses' => 'TaskController@index'
            ]);
        });


        Route::group([
            'middleware' => ['user.type:admin'],
            'prefix' => 'admin',
            'as' => 'Admin::',
            'namespace' => 'Admin'
        ], function(){
            Route::get('', [
                'as' => 'index_path',
                'uses' => 'AdminController@index'
            ]);

            Route::group([
                'as' => 'Users::',
                'prefix' => 'usuarios'
            ], function(){

                Route::get('', [
                    'as' => 'list_path',
                    'uses' => 'UsersController@index'
                ]);

                Route::get('crear', [
                    'as' => 'create_path',
                    'uses' => 'UsersController@create'
                ]);

                Route::put('crear', [
                    'as' => 'create_path',
                    'uses' => 'UsersController@store'
                ]);

                Route::get('{user}', [
                    'as' => 'edit_path',
                    'uses' => 'UsersController@edit'
                ]);

                Route::patch('{user}', [
                    'as' => 'edit_path',
                    'uses' => 'UsersController@update'
                ]);
            });
        });

    });

});
