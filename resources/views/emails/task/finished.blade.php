@extends('emails.layout')

@section('title')
    {{ $subject }}
@endsection

@section('content')
    <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope itemtype="http://schema.org/CommunicateAction" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff">
        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
            <td class="content-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
                <table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                    <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                        <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                            <p>Estimad@ {{ $user->name }},</p>
                            <p>Le comunicamos que <strong>{{ $finisher->name }}</strong>, acaba de finalizar una tarea:</p>
                            <ul>
                                <li><strong>Proyecto: </strong><a href="{{ route('Projects::show_path', [$task->project->id]) }}">{{ $task->project->name }}</a></li>
                                <li><strong>Tarea: </strong><a href="{{ route('Projects::Tasks::show_path', [$task->project->id, $task->id]) }}">{{ $task->name }}</a></li>
                            </ul>
                            <hr />
                            <h3>Descripción:</h3>
                            {!! transformMarkdowntoHtml($task->description) !!}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
@stop