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
{{-- Responsible_id Form Input --}}
<div class="form-group @if($errors->has('user_type')) has-error @endif">
    {!! Form::label('responsible_id' , trans('validation.attributes.responsible_id').':', ['class' => 'control-label']) !!}
    {!! Form::select('responsible_id', $users, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($btnText, ['class'=> 'btn btn-primary btn-block']) !!}
</div>