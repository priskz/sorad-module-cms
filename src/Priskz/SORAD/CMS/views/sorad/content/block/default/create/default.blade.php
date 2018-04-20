<div>
	@foreach($template->getSchema(true)['detail'] as $key => $value)
	<div>
		<label for="detail[{!! $value !!}]">{!! $value !!}</label>
		<input name="detail[{!! $value !!}]" id="detail[{!! $value !!}]" type="text" value="">
	</div>
	@endforeach
</div>

@yield('block-default-children')