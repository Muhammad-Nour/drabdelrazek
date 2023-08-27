@extends('layouts.admin_app')

@section('title', __('site.details'))

@section('css')
@stop

@section('js')
@stop


@section('title-page', __('site.details'))

@section('content')

<!-- Main content -->

<div class="main-stage branches">
	<div class="col-md-11 m-auto">
		@include('partial.alerts')
		<div class="row">
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
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			@can('add_branches')
			<div style="margin-bottom:15px">
				<span style="font-size:20px">{{__('site.gallery')}}</span>
				<button class="btn btn-info" id="add_image">
					<i class="fa fa-plus"></i>&nbsp;&nbsp;إضافة صور
				</button>
				<form class="form-horizontal" action="{{route('add.branchImages')}}" method="post" enctype="multipart/form-data" id="add_image_form" style="display: none;margin-top: 15px;">
					@csrf
					<input type="hidden" name="branch_id" value="{{$branch->id}}">
					<div class="form-group row">
						<div class="col-sm-8">
							<input type="file" class="form-control" name="gallery[]" multiple>
						</div>
						<div class="col-sm-4">
							<button type="submit" class="btn btn-warning">{{__('site.add')}}</button>
						</div>
					</div>
				</form>
			</div>
			@endcan
			<div class="row">
				<?php $counter = 1 ; ?>
				@if($galleries->count() > 0)
				@foreach($galleries as $gallery)
				<div class="col-6 col-md-6" style="margin-bottom:15px">
					<?php echo $counter++ ; ?> &nbsp;&nbsp;
					<img src="{{asset('gallery/'.$gallery->photo)}}" style="width:100px;height:100px;">
				</div>
				@can('edit_branches')
				<div class="col-6 col-md-2">
					<p class="key">{{__('site.edit')}}</p>
					<a href="{{route('branchGallery.edit',$gallery->id)}}" class="btn btn-warning">
						<i class="fa fa-edit"></i></a>
					</div>
					@endcan

					@can('delete_branches')
					<div class="col-6 col-md-2">
						<p class="key">{{__('site.delete')}}</p>
						<form action="{{route('branchGallery.destroy',$gallery->id)}}" method="post">
							@csrf
							{{ method_field('delete') }}
							<button type="submit" class="btn btn-danger delete"><i class="fa fa-trash-alt"></i>
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

