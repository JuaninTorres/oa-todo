<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Configuración</h3>
    </div>
    <div class="panel-body">
        <table class="table">
        	<tbody>
        		<tr>
                    <th>Creación</th>
                    <td>{{ $task->created_at->diffForHumans() }}</td>
                </tr>
                <tr>
                    <th>Última actualización</th>
                    <td>{{ $task->updated_at->diffForHumans() }}</td>
                </tr>
                <tr>
                    <th>Responsable</th>
                    <td>{{ $task->responsible->name }}</td>
                </tr>
                <tr>
                    <th>Finalizada</th>
                    <td>{!! $task->getIconFinishedStatus() !!}</td>
                </tr>
        	</tbody>
        </table>
    </div>
</div>