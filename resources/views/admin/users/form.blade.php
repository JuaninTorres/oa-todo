{{-- Name Form Input --}}
<div class="form-group @if($errors->has('name')) has-error @endif">
    {!! Form::label('name' , trans('validation.attributes.name').':', ['class' => 'control-label']) !!}
    {!! Form::text('name' , null, ['class'=>'form-control']) !!}
</div>

{{-- Email Form Input --}}
<div class="form-group @if($errors->has('email')) has-error @endif">
    {!! Form::label('email' , trans('validation.attributes.email').':', ['class' => 'control-label']) !!}
    {!! Form::email('email' , null, ['class'=>'form-control']) !!}
</div>

{{-- Password Form Input --}}
<div class="form-group @if($errors->has('password')) has-error @endif">
    {!! Form::label('password' , trans('validation.attributes.password').':', ['class' => 'control-label']) !!}
    {!! Form::password('password' , ['class'=>'form-control']) !!}
</div>

{{-- Password_confirmation Form Input --}}
<div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
    {!! Form::label('password_confirmation' , trans('validation.attributes.confirmation').':', ['class' => 'control-label']) !!}
    {!! Form::password('password_confirmation' , ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($btnTexto, ['class'=> 'btn btn-primary btn-block', 'data-confirm' => '¿Está seguro de guardar esta información?']) !!}
</div>