@extends(Config::get('sorad.cms.view.prefix') . 'common.layout.1-col-option-1')

@section('view-styles')

	alt-1-1 Page Content Styles

@stop

@section('header')

	alt-1-1 Page Content Header

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

	alt-1-1 Page Content Footer

@stop

@section('view-scripts')

	alt-1-1 Page Content Scripts

@stop