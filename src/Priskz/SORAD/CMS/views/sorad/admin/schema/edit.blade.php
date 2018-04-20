@extends(Config::get('sorad.cms.view.prefix') . 'admin.schema.layout.no-col-bootstrap')

@section('view-styles')
<!-- View Styles -->
@stop

@section('main-inner')
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-block">
				<h3 class="card-title">Edit Schema</h3>
				@include('vendor.priskz.sorad.admin.schema.partial.edit-form', ['schema' => $schema])
			</div>
		</div>
	</div>
</div>
@stop

@section('view-scripts')
<!-- View Scripts -->
@stop