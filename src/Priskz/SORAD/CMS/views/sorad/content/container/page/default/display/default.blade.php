@extends(Config::get('sorad.cms.view.prefix') . 'common.layout.1-col-option-1')

@section('view-styles')

	Default Page Content Styles

@stop

@section('header')

	Default Page Content Header

@stop

@section('main')

	<div>
		{!! $content->getBody() !!}
	</div>

	@foreach($content->getChildren() as $child)
	<div>
		@include(Config::get('sorad.cms.view.prefix') . $child->getTemplate()->getFullyQualifiedView(), ['content' => $child])
	</div>
	@endforeach

@stop

@section('footer')

	Default Page Content Footer

@stop

@section('view-scripts')

	Default Page Content Scripts

@stop