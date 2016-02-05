{!! Form::open(['route' => 'login_path', 'method' => 'POST', 'class' => 'navbar-form navbar-right']) !!}
    <div class="form-group">
        {!! Form::text('email' , null, ['class'=>'form-control', 'placeholder' => 'Email']) !!}
    </div>
    <div class="form-group">
        {!! Form::password('password' , ['class'=>'form-control', 'placeholder' => 'Password']) !!}
    </div>
    <div class="form-group">
        <label>
            {!! Form::checkbox('remember') !!} Recordarme
        </label>
    </div>
    {!! Form::submit('Ingresar', ['class'=> 'btn btn-success']) !!}
{!! Form::close() !!}