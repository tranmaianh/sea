@extends('templates.master')
@section('title')
@lang('category/backend.header')
@endsection
@section('content')
<form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>@lang('category/backend.category')</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<!-- X-title -->
					<div class="x_title">
						<h2>@lang('category/backend.add')</h2>
						<div class="clearfix"></div>
					</div>
					<!-- X-title -->
					
					<!-- X-content -->
					<div class="x_content">
						<div id="add_category">
							<div class="form-group">
								<label for="category_list" class="control-label col-md-3 col-sm-3 col-xs-12">@lang('category/backend.category') <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="category_list" class="form-control col-md-7 col-xs-12" name="category_list" required>
									<option selected></option>
									<option value="0"><b>@lang('category/backend.root')</b></option>
									<?php foreach ($list as $key => $value): ?>
										<option value="{{ $value->id }}">{{ $value->title }}</option>
									<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">@lang('category/backend.input_category') <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="title" id="title" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3 col-sm-3 col-xs-12"></div>
							<div class="col-md-6 col-sm-6 col-xs-12 text-center">
								<button class="btn btn-default">@lang('category/backend.cancel')</button>
								<button class="btn btn-primary" type="submit">@lang('category/backend.add')</button>
							</div>
						</div>
					</div>
					<!-- X-content -->
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@push('scripts')
<script type="text/javascript">
	$('#category_list').select2({
		placeholder: "{{Lang::get('category/backend.select_category')}}",
	});
</script>
<script type="text/javascript">
	toastr.success("{{ Session::get('message') }}");
  	@if(Session::has('message'))
  	switch(type){
  		case 'info':
  		toastr.info("{{ Session::get('message') }}");
  		break;

  		case 'warning':
  		toastr.warning("{{ Session::get('message') }}");
  		break;

  		case 'success':
  		toastr.success("{{ Session::get('message') }}");
  		break;
  		case 'error':
  		toastr.error("{{ Session::get('message') }}");
  		break;
  	}
  	@endif
</script>
@endpush

