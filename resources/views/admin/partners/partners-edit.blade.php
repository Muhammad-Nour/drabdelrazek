@extends('layouts.admin_app')

@section('title', __('site.partners'))

@section('css')
@stop

@section('js')
@stop


@section('title-page',__('site.partners'))

@section('content')

<!-- Main content -->
<div class="main-stage partners">
	<div class="row">
		<div class="col-md-7 m-auto">
			@include('partial.alerts')
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">{{__('site.edit')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('partners.update',$partner->id)}}" method="POST" enctype='multipart/form-data'>

					@csrf
					{{ method_field('put') }}
					<div class="card-body">
						<div class="form-group">
							<label>{{__('site.name_ar')}}</label>
							<input type="text" class="form-control" name="name_ar" required value="{{old('name_ar',$partner->name_ar)}}">
					</div>
						<div class="form-group">
							<label>{{__('site.name_en')}}</label>
								<input type="text" class="form-control" name="name_en" required value="{{old('name_en',$partner->name_en)}}">
							</div>

							<div class="form-group">
								<label>{{__('site.image')}}</label>
								<input type="file" class="form-control" name="photo">
							</div>
                            <div class="form-group">
                                <img src="{{asset('images/'.$partner->photo)}}">
                            </div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" class="btn btn-style"><i class="fa fa-edit"></i> {{__('site.update')}}</button>
						</div>
						<!-- /.card-footer -->
					</form>
				</div>
			</div>
		</div>
	</div>
	@stop
