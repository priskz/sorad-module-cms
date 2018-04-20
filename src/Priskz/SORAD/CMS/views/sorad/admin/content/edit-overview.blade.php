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
					<th>Template</th>
					<th>UUID</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($contents as $content)
				<tr>
					<th scope="row">{!! $content->getKey() !!}</th>
					<td><a href="{!! URL::route('content.show', ['api_context' => $apiContext, 'uuid' => $content->getUuid()]) !!}">{!! $content->getTemplate()->getTitle() !!}</a></td>
					<td>{!! $content->getUuid() !!}</td>
					<td>
						<form id="actionButton" class="btn-group">
							<a class="btn btn-primary" href="{!! URL::route('content.show', ['api_context' => $apiContext, 'uuid' => $content->getUuid()]) !!}">View</a>
							<a class="btn btn-primary" href="{!! URL::route('content.edit', ['api_context' => $apiContext, 'uuid' => $content->getUuid()]) !!}">Edit</a>
							<button class="btn btn-primary" type="submit" formaction="{!! URL::route('content.purge', ['api_context' => $apiContext, 'uuid' => $content->getUuid()]) !!}" formmethod="POST" form="actionButton">Purge</button>
							<button class="btn btn-primary" type="submit" formaction="{!! URL::route('content.delete', ['api_context' => $apiContext, 'uuid' => $content->getUuid()]) !!}" formmethod="POST" form="actionButton">X</button>
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