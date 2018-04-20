@extends(Config::get('sorad.cms.view.prefix') . 'admin.template.layout.no-col-bootstrap')

@section('view-styles')
<!-- View Styles -->
@stop

@section('main-inner')
<div class="row">
    <div class="col">
		@foreach($templates as $template)
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col d-flex align-items-center">
						{!! $template->getTitle() !!}
					</div>
					<div class="col d-flex justify-template-end">
						<form>
							<button class="btn btn-primary" type="submit" formaction="{!! URL::route('template.store', ['api_context' => $apiContext, 'template_id' => $template->getKey()]) !!}" formmethod="POST">Create</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		@endforeach
    </div>
</div>
@stop

@section('view-scripts')
<!-- View Scripts -->
@stop