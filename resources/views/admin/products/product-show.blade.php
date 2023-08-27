@extends('layouts.admin_app')

@section('title', __('site.products'))

@section('css')
@stop

@section('js')
@stop


@section('title-page', __('site.products'))

@section('content')

<!-- Main content -->
<div class="main-stage products">
	<div class="col-md-11 m-auto">
		@include('partial.alerts')
		@if($products->count() > 0)
		<div class="row">
			@foreach($products as $product)
			<div class="col-md-12 single-row">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-md-2">
								<p class="key">{{__('site.code')}}</p>
								<p class="value">{{$product->id}}</p>
							</div>
							<div class="col-12 col-md-2">
								<p class="key">{{__('site.name_ar')}}</p>
								<p class="value">{{$product->name_ar}}</p>
							</div>

							<div class="col-12 col-md-2">
								<p class="key">{{__('site.name_en')}}</p>
								<p class="value">{{$product->name_en}}</p>
							</div>

							<div class="col-12 col-md-2">
								<p class="key">{{__('site.category_ar')}}</p>
								<p class="value">{{$product->category->name_ar}}</p>
							</div>
							<div class="col-12 col-md-2">
								<p class="key">{{__('site.category_en')}}</p>
								<p class="value">{{$product->category->name_en}}</p>
							</div>
							<div class="col-12 col-md-2">
								<p class="key">{{__('site.pre_price')}}</p>
								<p class="value">{{$product->pre_price}}</p>
							</div>
							<div class="col-12 col-md-2">
								<p class="key">{{__('site.price')}}</p>
								<p class="value">{{$product->price}}</p>
							</div>
							<div class="col-12 col-md-2">
								<p class="key">{{__('site.purchase_price')}}</p>
								<p class="value">{{$product->purchase_price}}</p>
							</div>
							<div class="col-12 col-md-2">
								<p class="key">{{__('site.discount')}}</p>
								<p class="value">{{$product->discount}}</p>
							</div>
							<div class="col-12 col-md-2">
								<p class="key">{{__('site.quantity')}}</p>
								<p class="value">{{$product->quantity}}</p>
							</div>
							<div class="col-12 col-md-2">
								<p class="key">{{__('site.notify')}}</p>
								<p class="value">{{$product->notify}}</p>
							</div>

							<div class="col-12 col-md-2">
								<p class="key">{{__('site.image')}}</p>
								<p><img src="{{asset('gallery/'.$product->photo)}}" style="width:75px;height: 75px;"></p>
							</div>

							<div class="col-12 col-md-2">
								<p class="key">{{__('site.SmallImage')}}</p>
								<p><img src="{{asset('gallery/'.$product->small_photo)}}"style="width:75px;height:75px;">
								</p>
							</div>


							<div class="col-6 col-md-2">
								<p class="key">{{__('site.actions')}}</p>
								<div class="actions-dropdown">
									<button type="button" class="btn btn-style btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-h"></i>
									</button>

									<div class="dropdown-menu">
										@can('product_details')
										<a href="{{route('product.details',$product->id)}}" class="dropdown-item">
											<i class="fa fa-info-circle"></i>{{__('site.details')}}</a>
											@endcan
											@can('edit_products')
											<a href="{{route('products.edit',$product->id)}}" class=" dropdown-item"><i class="fa fa-edit"> </i> {{__('site.edit')}}</a>
											@endcan
											@can('delete_products')
											<form action="{{route('products.destroy',$product->id)}}" method="POST" class="dropdown-item">
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
			@endif
			{{ $products->links() }}
		</div>
	</div>
	@stop

