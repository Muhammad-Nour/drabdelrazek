@extends('layouts.admin_app')

@section('title', __('site.projects'))

@section('css')
@stop

@section('js')
@stop


@section('title-page', __('site.projects'))

@section('content')
<div class="main-stage projects">
	<div class="row">
		<div class="col-md-11 m-auto">
			@include('partial.alerts')

			@if($projects->count() > 0)
			<div class="row">
				@foreach($projects as $project)
				<div class="col-md-12 single-row">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-6 col-md-2">
									<p class="key">{{__('site.code')}}</p>
									<p class="value">{{$project->id}}</p>
								</div>
								<div class="col-6 col-md-2">
									<p class="key">{{__('site.name_ar')}}</p>
									<p class="value">{{$project->name_ar}}</p>
								</div>
								<div class="col-6 col-md-3 display-none">
									<p class="key">{{__('site.name_en')}}</p>
									<p class="value">{{$project->name_en}}</p>
								</div>

								<div class="col-6 col-md-3">
									<p class="key">{{__('site.description_ar')}}</p>
									<p class="value">{{$project->description_ar}}</p>
								</div>
								<div class="col-6 col-md-3 display-none">
									<p class="key">{{__('site.description_en')}}</p>
									<p class="value">{{$project->description_en}}</p>
								</div>

								<div class="col-6 col-md-3">
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
											@can('details_projects')
											<a href="{{route('project.details',$project->id)}}" class="dropdown-item display-none">
												<i class="fa fa-info-circle"></i> {{__('site.details')}}</a>
												@endcan()
												@can('edit_projects')
												<a href="{{route('projects.edit',$project->id)}}" class=" dropdown-item"><i class="fa fa-edit"> </i> {{__('site.edit')}}</a>
												@endcan
												@can('delete_projects')
												<form action="{{route('projects.destroy', $project->id)}}" method="POST" class="dropdown-item">
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
					</div>
					@endforeach
				</div>
			</div>
			@endif
			@isset($paginate)
			{{ $projects->links() }}
			@endisset
		</div>
	</div>
	@stop
