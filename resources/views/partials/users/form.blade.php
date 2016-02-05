{{-- Name Form Input --}}
<div class="form-group @if($errors->has('name')) has-error @endif">
    {!! Form::label('name' , trans('validation.attributes.name').':', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('name' , null, ['class'=>'form-control']) !!}
    </div>
</div>

{{-- Email Form Input --}}
<div class="form-group @if($errors->has('email')) has-error @endif">
    {!! Form::label('email' , trans('validation.attributes.email').':', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::email('email' , null, ['class'=>'form-control']) !!}
    </div>
</div>

{{-- Password Form Input --}}
<div class="form-group @if($errors->has('password')) has-error @endif">
    {!! Form::label('password' , trans('validation.attributes.password').':', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::password('password' , ['class'=>'form-control']) !!}
    </div>
</div>

{{-- Password_confirmation Form Input --}}
<div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
    {!! Form::label('password_confirmation' , trans('validation.attributes.confirmation').':', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::password('password_confirmation' , ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit($btnText, ['class'=> 'btn btn-primary btn-block', 'data-confirm' => '¿Está seguro de guardar esta información?']) !!}
    </div>
</div>