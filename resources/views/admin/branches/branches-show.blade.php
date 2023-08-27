@extends('layouts.admin_app')

@section('title', __('site.branches'))

@section('css')
@stop

@section('js')
@stop


@section('title-page', __('site.branches'))

@section('content')
<div class="main-stage branches">
	<div class="row">
		<div class="col-md-11 m-auto">
			@include('partial.alerts')

			@if($branches->count() > 0)
			<div class="row">
				@foreach($branches as $branch)
				<div class="col-md-12 single-row">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.code')}}</p>
									<p class="value">{{$branch->id}}</p>
								</div>
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.name_ar')}}</p>
									<p class="value">{{$branch->name_ar}}</p>
								</div>
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.name_en')}}</p>
									<p class="value">{{$branch->name_en}}</p>
								</div>
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.address_ar')}}</p>
									<p class="value">{{$branch->address_ar}}</p>
								</div>
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.address_en')}}</p>
									<p class="value">{{$branch->address_en}}</p>
								</div>		
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.map')}}</p>
									<p class="value">{{$branch->map}}</p>
								</div>
								<div class="col-6 col-md-3">
									<p class="key">{{__('site.image')}}</p>
									<img src="{{asset('gallery/'.$branch->photo)}}"style="width:75px;height:75px;">
								</div>
								<div class="col-6 col-md-2">
									<p class="key">{{__('site.actions')}}</p>
									<div class="actions-dropdown">
										<button type="button" class="btn btn-style btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-h"></i>
										</button>

										<div class="dropdown-menu">
											@can('details_branches')
											<a href="{{route('branch.details',$branch->id)}}" class="dropdown-item">
												<i class="fa fa-info-circle"></i>{{__('site.details')}}</a>
												@endcan()
												@can('edit_branches')
												<a href="{{route('branches.edit',$branch->id)}}" class=" dropdown-item"><i class="fa fa-edit"> </i> {{__('site.edit')}}</a>
												@endcan
												@can('delete_branches')
												<form action="{{route('branches.destroy', $branch->id)}}" method="POST" class="dropdown-item">
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
			{{ $branches->links() }}
			@endisset
		</div>
	</div>
	@stop
