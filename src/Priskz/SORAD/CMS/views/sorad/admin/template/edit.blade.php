@extends(Config::get('sorad.cms.view.prefix') . 'admin.template.layout.no-col-bootstrap')

@section('view-styles')
<!-- View Styles -->
@stop

@section('main-inner')
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-block">
				<h3 class="card-title">Edit {!! $template->getTitle() !!} Template</h3>
				@include(Config::get('sorad.cms.view.prefix') . 'admin.template.partial.edit-form', ['template' => $template])
			</div>
		</div>
	</div>
</div>
@stop

@section('view-scripts')
<!-- View Scripts -->
@stop