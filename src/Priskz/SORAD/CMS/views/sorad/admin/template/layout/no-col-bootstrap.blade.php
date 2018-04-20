@extends(Config::get('sorad.cms.view.prefix') . 'admin.layout.no-col-bootstrap')

@section('main-inner')
<div class="row">
	<div class="col">
		<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#adminNav" aria-controls="adminNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="{!! URL::route('admin.overview') !!}">&nbsp;</a>
			<div class="collapse navbar-collapse" id="adminNav">
				<div class="navbar-nav">
					<a class="nav-item nav-link" href="{!! URL::route('template.overview', 'admin') !!}">Template</a>
				</div>
			</div>
		</nav>
	</div>
</div>

@yield('main-inner', '<!-- Main Inner -->')

@stop