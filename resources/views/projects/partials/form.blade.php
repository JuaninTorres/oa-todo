{{-- Name Form Input --}}
<div class="form-group @if($errors->has('name')) has-error @endif">
    {!! Form::label('name' , trans('validation.attributes.name').':', ['class' => 'control-label']) !!}
    {!! Form::text('name' , null, ['class'=>'form-control']) !!}
</div>
{{-- Description Form Input --}}
<div class="form-group @if($errors->has('description')) has-error @endif">
    {!! Form::label('description' , trans('validation.attributes.description').':', ['class' => 'control-label']) !!}
    {!! Form::textarea('description' , null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit( $btnText, ['class'=> 'btn btn-primary btn-block']) !!}
</div>