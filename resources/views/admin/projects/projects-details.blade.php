@extends('layouts.admin_app')

@section('title', __('site.details'))

@section('css')
@stop

@section('js')
@stop


@section('title-page', __('site.details'))

@section('content')

<!-- Main content -->

<div class="main-stage projects">

	<div class="col-md-11 m-auto">
		@include('partial.alerts')

		<div class="row">
			<div class="col-md-12 single-row">
				<div class="card">
					<div class="card-body">
						<div class="row">

							<div class="col-6 col-md-2">
									<p class="key">{{__('site.code')}}</p>
									<p class="value">{{$project->id}}</p>
								</div>
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.name_ar')}}</p>
									<p class="value">{{$project->name_ar}}</p>
								</div>
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.name_en')}}</p>
									<p class="value">{{$project->name_en}}</p>
								</div>

								<div class="col-6 col-md-2">
									<p class="key">{{__('site.image')}}</p>
									<img src="{{asset('images/'.$project->photo)}}">
								</div>

							<div class="col-6 col-md-2">
								<p class="key">{{__('site.actions')}}</p>
								<div class="actions-dropdown">
									<button type="button" class="btn btn-style btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-h"></i>
									</button>

									<div class="dropdown-menu">
										@can('edit_projects')
										<a href="{{route('projects.edit',$project->id)}}" class=" dropdown-item"><i class="fa fa-edit"> </i> {{__('site.edit')}}</a>
										@endcan
										@can('delete_projects')
										<form action="{{route('projects.destroy',$project->id)}}" method="POST" class="dropdown-item">
											@csrf
											{{ method_field('delete') }}
											<a href="" class="delete text-danger"> <i class="fa fa-trash-alt"> </i>   {{__('site.delete')}} </a>
										</form>
										@endcan
									</div>
								</div>
							</div>


						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						@can('add_projects')
						<div style="margin-bottom:15px">
							<span style="font-size:20px">{{__('site.gallery')}}</span>
							<button class="btn btn-info" id="add_image">
								<i class="fa fa-plus"></i> إضافة صور
							</button>

							<form class="form-horizontal" action="{{route('projectGallery.store',$project->id)}}" method="post" enctype="multipart/form-data" id="add_image_form" style="display: none;margin-top: 15px;">
								@csrf
								<div class="form-group row">
									<div class="col-sm-4">
										<input type="file" class="form-control" name="photo[]" multiple required>
									</div>
									<div class="col-sm-4">
										<button type="submit" class="btn btn-style"><i class="fa fa-plus"></i> {{__('site.add')}}</button>
									</div>
								</div>
							</form>
						</div>
						@endcan

						<div class="row">

							<?php $counter = 1 ; ?>
							@if($galleries->count() > 0)
							@foreach($galleries as $proGallery)

							<div class="col-6 col-md-6" style="margin-bottom:15px">
								<?php echo $counter++ ; ?> &nbsp;&nbsp;
								<img src="{{asset('images/'.$proGallery->photo)}}" style="width:100px;height:100px;">
							</div>

							@can('edit_projects')
							<div class="col-6 col-md-2">
								<p class="key">{{__('site.edit')}}</p>
								<a href="{{route('projectGallery.edit',$proGallery->id)}}" class="btn btn-info btn-sm">
									<i class="fa fa-edit"></i></a>
								</div>
								@endcan

								@can('delete_projects')
								<div class="col-6 col-md-2">
									<p class="key">{{__('site.delete')}}</p>
									<form action="{{route('projectGallery.destroy',$proGallery->id)}}" method="post">
										@csrf
										{{ method_field('delete') }}
										<button type="submit" class="btn btn-danger delete  btn-sm"><i class="fa fa-trash-alt"></i>
										</button>
									</form>
								</div>
								@endcan
								@endforeach
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	@stop

