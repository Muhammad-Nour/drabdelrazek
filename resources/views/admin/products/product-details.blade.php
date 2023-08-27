@extends('layouts.admin_app')

@section('title', __('site.details'))

@section('css')
@stop

@section('js')
@stop


@section('title-page', __('site.details'))

@section('content')

<!-- Main content -->

<div class="main-stage products">

	<div class="col-md-11 m-auto">
		@include('partial.alerts')
		@if($products->count() > 0)
		<div class="row">
			<div class="col-md-12 single-row">
				<div class="card">
					<div class="card-body">
						<div class="row">
							@foreach($products as $product)
							<div class="form-group col-6 col-md-3">
								<label>{{__('site.code')}} : {{$product->id}}</label>
							</div>

							<div class="form-group col-6 col-md-3">
								<label>{{__('site.category_ar')}} : 
									{{$product->category->name_ar}}</label>
							</div>
							<div class="form-group col-6 col-md-3">
								<label>{{__('site.category_en')}} : 
									{{$product->category->name_en}}</label>
							</div>

							<div class="form-group col-6 col-md-3">
								<label>{{__('site.quantity')}} : {{$product->quantity}}</label>
							</div>

							<div class="form-group col-6 col-md-3">
								<label>{{__('site.name_ar')}} : {{$product->name_ar}}</label>
							</div>
							<div class="form-group col-6 col-md-3">
								<label>{{__('site.name_en')}} : {{$product->name_en}}</label>
							</div>

							<div class="col-12 col-md-3">
								<p class="key">{{__('site.pre_price')}}</p>
								<p class="value">{{$product->pre_price}}</p>
							</div>
							<div class="col-12 col-md-3">
								<p class="key">{{__('site.price')}}</p>
								<p class="value">{{$product->price}}</p>
							</div>
							<div class="col-12 col-md-3">
								<p class="key">{{__('site.purchase_price')}}</p>
								<p class="value">{{$product->purchase_price}}</p>
							</div>
							<div class="col-12 col-md-3">
								<p class="key">{{__('site.discount')}}</p>
								<p class="value">{{$product->discount}}</p>
							</div>

							<div class="form-group col-6 col-md-3">
								<label>{{__('site.notify')}} : {{$product->notify}}</label>
							</div>

							<div class="form-group col-6 col-md-3">
								<label>{{__('site.unit_ar')}} : {{$product->unit_ar}}</label>
							</div>

							<div class="form-group col-6 col-md-3">
								<label>{{__('site.unit_en')}} : {{$product->unit_en}}</label>
							</div>

							<div class="form-group col-6 col-md-3">
								<label>{{__('site.description_ar')}}</label>
								<div>{{$product->description_ar}}</div>
							</div>

							<div class="form-group col-6 col-md-3">
								<label>{{__('site.description_en')}}</label>
								<div>{{$product->description_en}}</div>
							</div>

							<div class="form-group col-6 col-md-3">
								<label>{{__('site.details_ar')}}</label>
								<div>{{$product->details_ar}}</div>
							</div>

							<div class="form-group col-6 col-md-3">
								<label>{{__('site.details_en')}}</label>
								<div>{{$product->details_en}}</div>
							</div>

								<div class="col-6 col-md-2">
                                    <p class="key">{{__('site.actions')}}</p>
                                    <div class="actions-dropdown">
                                        <button type="button" class="btn btn-style btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>

                                        <div class="dropdown-menu">
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
								@endforeach
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="form-group row">
								<div class="col-6 col-md-2">
									<label>{{__('site.image')}}</label>
								</div>
								<div class="col-6 col-md-6">
									<img src="{{asset('gallery/'.$product->photo)}}" style="width:250px;height:150px;">
								</div>
								@can('edit_products')
								<div class="form-group col-md-2">
									<p class="key">{{__('site.edit')}}</p>
									<a href="{{route('product.editMainImages',$product->id)}}" class="btn btn-warning">
										<i class="fa fa-edit"></i></a>
									</div>
									@endcan

									@can('delete_products')
									<div class="form-group col-md-2">
										<p class="key">{{__('site.delete')}}</p>
										<form action="{{route('product.deleteMainImages',$product->id)}}" method="post" enctype="multipart/form-data">
											@csrf
											{{method_field('PUT')}}
											<input type="hidden" name="deleteimage" value="1">
											<button type="submit" class="btn btn-danger delete"><i class="fa fa-trash-alt"></i>
											</button>
										</form>
									</div>
									@endcan

							</div>

							<div class="form-group row">
								<div class="col-6 col-md-2">
									<label>{{__('site.SmallImage')}}</label>
								</div>
								<div class="col-6 col-md-6">
									<img src="{{asset('gallery/'.$product->small_photo)}}" style="width:250px;height:100px;">
								</div>
								@can('edit_products')
								<div class="col-md-2">
									<p class="key">{{__('site.edit')}}</p>
									<a href="{{route('product.editMainImages',$product->id)}}" class="btn btn-warning">
										<i class="fa fa-edit"></i></a>
									</div>
									@endcan

									@can('delete_products')
									<div class="col-md-2">
										<p class="key">{{__('site.delete')}}</p>
										<form action="{{route('product.deleteMainImages',$product->id)}}" method="post" enctype="multipart/form-data">
											@csrf
											{{method_field('PUT')}}
											<input type="hidden" name="deleteimage" value="2">
											<button type="submit" class="btn btn-danger delete"><i class="fa fa-trash-alt"></i>
											</button>
										</form>
									</div>
									@endcan
							</div>


									<div style="margin-bottom:15px">
										<span style="font-size:20px">{{__('site.gallery')}}</span>
										<button class="btn btn-info" id="add_image">
											<i class="fa fa-plus"></i>&nbsp;&nbsp;إضافة صور
										</button>

										<form class="form-horizontal" action="{{route('add.ProductImages')}}" method="post" enctype="multipart/form-data" id="add_image_form" style="display: none;margin-top: 15px;">
											@csrf

											<input type="hidden" name="product_id" value="{{$product->id}}">

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

									<div class="row">

										<?php $counter = 1 ; ?>
										@if($ProductGallery->count() > 0)
										@foreach($ProductGallery as $gallery)

										<div class="col-6 col-md-6" style="margin-bottom:15px">
											<?php echo $counter++ ; ?> &nbsp;&nbsp;
											<img src="{{asset('gallery/'.$gallery->photo)}}" style="width:100px;height:100px;">
										</div>

										@can('edit_products')
										<div class="col-6 col-md-2">
											<p class="key">{{__('site.edit')}}</p>
											<a href="{{route('galleries.edit',$gallery->id)}}" class="btn btn-warning">
												<i class="fa fa-edit"></i></a>
											</div>
											@endcan

											@can('delete_products')
											<div class="col-6 col-md-2">
												<p class="key">{{__('site.delete')}}</p>
												<form action="{{route('galleries.destroy',$gallery->id)}}" method="post">
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
						@endif
					</div>
				</div>
				@stop

