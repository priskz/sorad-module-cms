@extends(Config::get('sorad.cms.view.prefix') . 'admin.content.layout.no-col-bootstrap')

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
				@foreach($templates as $template)
				<tr>
					<th scope="row">{!! $template->getKey() !!}</th>
					<td>{!! $template->getTitle() !!}</td>
					<td>
						<form>
							<button class="btn btn-primary"
									type="submit"
									formaction="{!! URL::route('content.store', ['api_context' => $apiContext, 'template_id' => $template->getKey()]) !!}"
									formmethod="POST">
									Create
							</button>
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