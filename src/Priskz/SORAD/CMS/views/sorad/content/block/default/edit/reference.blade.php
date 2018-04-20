@foreach($content->getTemplate()->getDefinition(true)['field'] as $field)
<label for="uuid[{!! $parent->getUuid() !!}][ref][{!! $content->getUuid() !!}][data][{!! $field['name'] !!}]">{!!  $field['name'] !!}</label>
<input form="{!! $parent->getUuid() !!}-edit"
	   id="uuid[{!! $parent->getUuid() !!}][ref][{!! $content->getUuid() !!}][data][{!! $field['name'] !!}]"
       name="uuid[{!! $parent->getUuid() !!}][ref][{!! $content->getUuid() !!}][data][{!! $field['name'] !!}]"
       type="text"
       value="{!! $content->getData(true)[$field['name']] !!}">
@endforeach

<input formaction="{!! URL::route('content.reference.delete', ['api_context' => $apiContext, 'uuid' => $parent->getUuid(), 'reference' => $content->getUuid()]) !!}" type="submit" value="X" class="btn"/>

