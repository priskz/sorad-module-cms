@extends(Config::get('sorad.cms.view.prefix') . 'admin.schema.layout.no-col-bootstrap')

@section('view-styles')
<!-- View Styles -->
@stop

@section('main-inner')
<div class="row">
	<div class="col">
		<table class="table table-bordered table-hover table-sm">
			<thead>
				<tr>
					<th>ID</th>
					<th>Schema</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($schemas as $schema)
				<tr>
					<th scope="row">{!! $schema->getKey() !!}</th>
					<td>{!! $schema->getDefinition() !!}</td>
					<td>
						<form id="actionButton" class="btn-group">
							<a class="btn btn-primary" href="{!! URL::route('schema.edit', ['api_context' => $apiContext, 'schema_id' => $schema->getKey()]) !!}">Edit</a>
							<button class="btn btn-primary" type="submit" formaction="{!! URL::route('schema.delete', ['api_context' => $apiContext, 'schema_id' => $schema->getKey()]) !!}" formmethod="POST" form="actionButton">X</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop

@section('view-scripts')
<!-- View Scripts -->
@stop