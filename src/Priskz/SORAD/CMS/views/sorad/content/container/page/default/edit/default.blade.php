<form action="{!! URL::route('content.reference', ['api_context' => $apiContext, 'uuid' => $content->getUuid()]) !!}" method="POST">
	<div>
		<select name="reference[template_id]">
			@foreach(Template::get([['field' => 'type_context', 'value' =>  'BLOCK', 'operator' => '=', 'or' => false]])->getData() as $block)
			<option value="{!! $block->getKey() !!}">{!! $block->getTitle() !!}</option>
			@endforeach
		</select>
		<input type="hidden" name="reference[reference_type]" value="CONTENT" />
		<input type="submit" value="Add" class="btn" />
	</div>
</form>
<form action="{!! URL::route('content.reference', ['api_context' => $apiContext, 'uuid' => $content->getUuid()]) !!}" method="POST">
	<div>
		<select name="reference[uuid]">
			@foreach(CMS::get()->getData() as $referenceContent)
			@if($referenceContent->getTemplate()->getTypeContext() == 'BLOCK')
			<option value="{!! $referenceContent->getUuid() !!}">{!! $referenceContent->getTemplate()->getTitle().' '.$referenceContent->getKey() !!}</option>
			@endif
			@endforeach
		</select>
		<input type="submit" value="Reference" class="btn" />
	</div>
</form>
<form id="{!! $content->getUuid().'-edit' !!}" action="{!! URL::route('content.update', ['api_context' => $apiContext]) !!}" method="POST">
	<div>
		@foreach($content->getTemplate()->getDefinition(true)['field'] as $field)
		<div>
			<label for="uuid[{!! $content->getUuid() !!}][data][{!! $field['name'] !!}]">{!! $field['label'] !!}</label>
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
	
	@yield('page-default-children')
	
	@foreach($content->getChildren() as $child)
	<div>
		@include(Config::get('sorad.cms.view.prefix') . $child->getTemplate()->getFullyQualifiedView('EDIT', 'REFERENCE'), ['parent' => $content, 'content' => $child])
	</div>
	@endforeach
	<div>
		<input form="{!! $content->getUuid().'-edit' !!}"  type="submit" value="Submit" class="btn"/>
	</div>
</form>