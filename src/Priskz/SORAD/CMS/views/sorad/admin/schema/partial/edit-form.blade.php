<form action="{!! URL::route('schema.update', ['api_context' => $apiContext, 'schema_id' => $schema->getKey()]) !!}" method="POST">
	<div class="form-group row">
		<label for="definition_field" class="col-sm-2 col-form-label">Definition</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="definition_field" name="definition" placeholder="Definition" value="{{ $schema->getDefinition() }}">
		</div>
	</div>
	<div class="form-group row">
		<div class="offset-sm-2 col-sm-10">
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</div>
</form>