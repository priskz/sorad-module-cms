@extends(Config::get('sorad.cms.view.prefix') . 'common.layout.1-col-option-1')

@section('view-styles')

	Fancy Page Content Styles

@stop

@section('header')

	Fancy Page Content Header

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

	Fancy Page Content Footer

@stop

@section('view-scripts')

	Fancy Page Content Scripts

@stop