@extends('layouts.admin_app')

@section('title', __('site.editImage'))

@section('css')
@stop

@section('js')
@stop

@section('title-page', __('site.editImage'))

@section('content')

<!-- Main content -->

<div class="main-stage products">
	<div class="col-md-11 m-auto">
		@include('partial.alerts')
		@if($products->count() > 0)
		<div class="row">
			<div class="col-md-12 single-row">
				<div style="background: honeydew;border-radius: 3px;padding: 5px;margin-bottom: 5px;">
				{{ __('site.name_ar') }} : {{ $product->name_ar; }} | 
				{{ __('site.name_en') }} : {{ $product->name_en; }}

				</div>
				<div class="card">
					<div class="card-body">
						<form action="{{route('product.updateMainImage',$product->id)}}" 
						method="post" enctype="multipart/form-data">
						@csrf
						{{method_field('put')}}
							<div class="row">

								<div class="col-6 col-md-5">
									<strong>{{__('site.image')}}</strong>
									<img src="{{asset('gallery/'.$product->photo)}}" style="width:100px;height:100px;">
									<input type="file" class="form-control" name="photo">
								</div>

								<div class="col-6 col-md-5">
									<strong>{{__('site.SmallImage')}}</strong>
									<img src="{{asset('gallery/'.$product->small_photo)}}" style="width:100px;height:100px;">
									<input type="file" class="form-control" name="smallPhoto">
								</div>
								<div class="col-6 col-md-2">
									<button type="submit" class="btn btn-style">{{__('site.update')}}</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	@endif
	</div>
</div>
@stop

