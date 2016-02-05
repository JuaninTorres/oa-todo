{{-- Name Form Input --}}
<div class="form-group @if($errors->has('name')) has-error @endif">
    {!! Form::label('name' , trans('validation.attributes.name').':', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('name' , null, ['class'=>'form-control']) !!}
    </div>
</div>
{{-- Description Form Input --}}
<div class="form-group @if($errors->has('description')) has-error @endif">
    {!! Form::label('description' , trans('validation.attributes.description').':', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('description' , null, ['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit( $btnText, ['class'=> 'btn btn-primary btn-block']) !!}
    </div>
</div>