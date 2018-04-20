@extends(Config::get('sorad.cms.view.prefix') . 'admin.schema.layout.no-col-bootstrap')

@section('view-styles')
<!-- View Styles -->
@stop

@section('main-inner')
<div class="row">
	<div class="col">
		<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#schemaNav" aria-controls="schemaNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="{!! URL::route('schema.overview') !!}">&nbsp;</a>
			<div class="collapse navbar-collapse" id="schemaNav">
				<div class="navbar-nav">
					<a class="nav-item nav-link" href="{!! URL::route('schema.create', ['api_context' => $apiContext]) !!}">New Schema</a>
					<a class="nav-item nav-link" href="{!! URL::route('schema.edit.overview', ['api_context' => $apiContext]) !!}">Edit Schema</a>
				</div>
			</div>
		</nav>
	</div>
</div>
@stop

@section('view-scripts')
<!-- View Scripts -->
@stop