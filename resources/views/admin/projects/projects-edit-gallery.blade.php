@extends('layouts.admin_app')

@section('title', __('site.editImage'))

@section('css')
@stop

@section('js')
@stop


@section('title-page', __('site.editImage'))

@section('content')

<!-- Main content -->

<div class="main-stage projects">
	<div class="col-md-7 m-auto">
		@include('partial.alerts')
        <div class="single-row">
            <div class="card">
                <div class="card-body">
                    <h3>{{__('site.project')}} : {{$gallery->project->name_ar;}} </h3>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col-md-12">

				<div class="card">
					<div class="card-body">
						<div>
							<h4>{{__('site.gallery')}}</h4>
						</div>
						<form class="form-horizontal" action="{{route('projectGallery.update',$gallery->id)}}" method="post" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="row">
							<div class="row" style="margin-bottom:15px">

								<div class="form-group col-6 col-md-12">
									<input type="file" class="form-control" name="photo">
								</div>
                                <div class="form-group col-6 col-md-12">
									<img src="{{asset('images/'.$gallery->photo)}}" >
								</div>
								<div class="form-group col-6 col-md-12">
									<button type="submit" class="btn btn-style"> <i class="fa fa-edit"></i> {{__('site.update')}}</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@stop

