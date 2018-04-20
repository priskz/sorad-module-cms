@extends(Config::get('sorad.cms.view.prefix') . 'admin.content.layout.no-col-bootstrap')

@section('view-styles')
<!-- View Styles -->
@stop

@section('main-inner')
<div class="row">
	<div class="col">
		<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#contentNav" aria-controls="contentNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="{!! URL::route('content.overview') !!}">&nbsp;</a>
			<div class="collapse navbar-collapse" id="contentNav">
				<div class="navbar-nav">
					<a class="nav-item nav-link" href="{!! URL::route('content.create', ['api_context' => $apiContext]) !!}">New Content</a>
					<a class="nav-item nav-link" href="{!! URL::route('content.edit.overview', ['api_context' => $apiContext]) !!}">Edit Content</a>
				</div>
			</div>
		</nav>
	</div>
</div>
@stop

@section('view-scripts')
<!-- View Scripts -->
@stop