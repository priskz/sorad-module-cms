@extends(Config::get('sorad.cms.view.prefix') . 'admin.template.layout.no-col-bootstrap')

@section('view-styles')
<!-- View Styles -->
@stop

@section('main-inner')
<div class="row">
	<div class="col">
		<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#templateNav" aria-controls="templateNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="{!! URL::route('admin.overview') !!}">&nbsp;</a>
			<div class="collapse navbar-collapse" id="templateNav">
				<div class="navbar-nav">
					<a class="nav-item nav-link" href="{!! URL::route('template.create', ['api_context' => $apiContext]) !!}">New Template</a>
					<a class="nav-item nav-link" href="{!! URL::route('template.edit.overview', ['api_context' => $apiContext]) !!}">Edit Template</a>
				</div>
			</div>
		</nav>
	</div>
</div>
@stop

@section('view-scripts')
<!-- View Scripts -->
@stop