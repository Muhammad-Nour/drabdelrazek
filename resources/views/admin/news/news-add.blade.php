@extends('layouts.admin_app')

@section('title', __('site.news'))

@section('css')
@stop

@section('js')
@stop


@section('title-page',__('site.news'))

@section('content')

<!-- Main content -->
<div class="main-stage news">
	<div class="row">
		<div class="col-md-11 m-auto">
			@include('partial.alerts')
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">{{__('site.add_data')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('news.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						<div class="form-group">
							<label>{{__('site.title_ar')}}</label>
							<input type="text" class="form-control" name="name_ar" required
							value="{{old('name_ar')}}">
						</div>
						<div class="form-group">
							<label>{{__('site.title_en')}}</label>
							<input type="text" class="form-control" name="name_en" required
							value="{{old('name_en')}}">
						</div>
						<div class="form-group">
								<label>{{__('site.description_ar')}}</label>
								<textarea class="ckeditor" name="description_ar" id="description_ar"  required>{{old('description_ar')}}</textarea>
							</div>

							<div class="form-group">
								<label>{{__('site.description_en')}}</label>
								<textarea class="ckeditor" name="description_en" id="description_en"  required>{{old('description_en')}}</textarea>
							</div>
                            <div class="form-group">
								<label>{{__('site.date')}}</label>
								<input type="date" class="form-control" name="date" required value="{{ \Carbon\Carbon::now()->format('Y-m-d')}}">
							</div>
							<div class="form-grou">
								<label>{{__('site.image')}}</label>
								<input type="file" class="form-control" name="photo" required>
							</div>


					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<button type="submit" class="btn btn-style"><i class="fa fa-plus"></i> {{__('site.add')}}</button>
				</div>
				<!-- /.card-footer -->
			</form>
		</div>
	</div>
</div>
</div>
@stop
