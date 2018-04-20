@extends(Config::get('sorad.cms.view.prefix') . 'admin.schema.layout.no-col-bootstrap')

@section('view-styles')
<!-- View Styles -->
@stop

@section('main-inner')
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-block">
				<h3 class="card-title">Create New Schema</h3>
				<form action="{!! URL::route('schema.store', ['api_context' => $apiContext]) !!}" method="POST">
					<div class="form-group row">
						<label for="definition_field" class="col-sm-2 col-form-label">Definition</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="definition_field" name="definition" placeholder="Definition" value="">
						</div>
					</div>
					<div class="form-group row">
						<div class="offset-sm-2 col-sm-10">
							<button type="submit" class="btn btn-primary">Create</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop

@section('view-scripts')
<!-- View Scripts -->
@stop