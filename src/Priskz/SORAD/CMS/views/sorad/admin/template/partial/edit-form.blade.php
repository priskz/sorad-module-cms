<form action="{!! URL::route('template.update', ['api_context' => $apiContext, 'template_id' => $template->getKey()]) !!}" method="POST">
	@foreach($template->getInstance(true) as $property => $value)
		@unless(in_array($property, $template->getSchema()->getDefinition(true)['passive']))
			@if($property !== 'field')
			<div class="form-group row">
				<label for="{!! $property !!}" class="col-sm-2 col-form-label">{!! $property !!}</label>
				<div class="col-sm-10">
					<input name="{!! $property !!}" type="{!! $property !!}" value="{!! $value !!}">
				</div>
			</div>
			@else
				@foreach($value as $i => $field)
				<div class="form-group row">
					@foreach($field as $attribute => $attributeValue)
					<label for="field[{!! $i !!}][{!! $attribute !!}]" class="col-sm-2 col-form-label">{!! $attribute !!}</label>
					<div class="col-sm-10">
						<input name="field[{!! $i !!}][{!! $attribute !!}]" type="text" value="{!! $attributeValue !!}">
					</div>
					@endforeach
				</div>
				@endforeach
			@endif
		@endunless
	@endforeach
	<div class="form-group row">
		<div class="offset-sm-2 col-sm-10">
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
	</div>
</form>