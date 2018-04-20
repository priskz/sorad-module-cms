<form action="{!! URL::route('template.update', ['api_context' => $apiContext, 'template_id' => $template->getKey()]) !!}" method="POST">
	<div class="form-group row">
		<label for="parent_id_field" class="col-sm-2 col-form-label">Parent ID</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="parent_id_field" name="parent_id" placeholder="Parent ID" value="{!! $template->getParentKey() !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="view_field" class="col-sm-2 col-form-label">View</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="view_field" name="view" placeholder="View" value="{!! $template->getView() !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="slug_field" class="col-sm-2 col-form-label">Slug</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="slug_field" name="slug" placeholder="Slug" value="{!! $template->getSlug() !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="type_field" class="col-sm-2 col-form-label">Type</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="type_field" name="type" placeholder="Type" value="{!! $template->getModelType() !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="type_context_field" class="col-sm-2 col-form-label">Type Context</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="type_context_field" name="type_context" placeholder="Type Context" value="{!! $template->getTypeContext() !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="status_field" class="col-sm-2 col-form-label">Status</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="status_field" name="statuss" placeholder="Status" value="{!! $template->getStatus() !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="title_field" class="col-sm-2 col-form-label">Title</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="title_field" name="title" placeholder="Title" value="{!! $template->getTitle() !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="definition_field" class="col-sm-2 col-form-label">Definition</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="definition_field" name="defintion" placeholder="Defintion" value="{{ $template->getDefinition() }}">
		</div>
	</div>
	<div class="form-group row">
		<div class="offset-sm-2 col-sm-10">
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
	</div>
</form>