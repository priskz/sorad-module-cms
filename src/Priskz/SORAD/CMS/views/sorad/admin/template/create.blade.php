@extends(Config::get('sorad.cms.view.prefix') . 'admin.template.layout.no-col-bootstrap')

@section('view-styles')
<!-- View Styles -->
@stop

@section('main-inner')
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-block">
				<h3 class="card-title">Create New Template</h3>
				@foreach($schema->getDefinitionValue('properties') as $key => $value)
				{!! $key !!}<br>
				@endforeach
			</div>
		</div>
	</div>
</div>
@stop

@section('view-scripts')
<!-- View Scripts -->
@stop