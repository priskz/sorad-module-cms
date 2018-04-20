<form id="{!! $content->getUuid().'-edit' !!}" action="{!! URL::route('content.update', ['api_context' => $apiContext]) !!}" method="POST">
	<div>
		@foreach($content->getTemplate()->getDefinition(true)['field'] as $field)
		<div>
			<label for="uuid[{!! $content->getUuid() !!}][data][{!! $field['name'] !!}]">{!!  $field['label'] !!}</label>
			<input form="{!! $content->getUuid() !!}-edit"
				   name="uuid[{!! $content->getUuid() !!}][data][{!! $field['name'] !!}]"
				   id="uuid[{!! $content->getUuid() !!}][data][{!! $field['name'] !!}]"
				   type="text"
				   value="{!! $content->getData(true)[$field['name']] !!}"
				   {!! (array_key_exists('required', $field['rule']) && $field['rule']['required'] ? 'required' : '') !!}
				   {!! (array_key_exists('placeholder', $field) ? 'placeholder="'. $field['placeholder'] .'"' : '') !!}
			>
		</div>
		@endforeach
	</div>
	<div>
		<input form="{!! $content->getUuid().'-edit' !!}"  type="submit" value="Submit" class="btn"/>
	</div>
</form>