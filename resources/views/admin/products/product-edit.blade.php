@extends('layouts.admin_app')

@section('title', __('site.products'))

@section('css')
@stop

@section('js')
@stop

@section('title-page',__('site.products'))

@section('content')

<!-- Main content -->
<div class="main-stage products">
	<div class="row">
		<div class="col-md-10 m-auto">
			@include('partial.alerts')
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">{{__('site.edit')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('products.update',$product->id)}}" 
					method="post">
					@csrf
					{{method_field('put')}}
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-6">
								<label>{{__('site.category_ar')}}</label>
								<select class="form-control" name="category_id" required>
									@if(isset($categories)) 
									@foreach($categories as $category)
									<option value="{{ $category->id }}" @if($product->category_id == $category->id) selected @endif>
										{{ $category->name_ar }}</option>
										@endforeach
										@endif
									</select>
								</div>

								<div class="form-group col-md-6">
								<label>{{__('site.category_en')}}</label>
								<select class="form-control" name="category_id" required>
									@if(isset($categories)) 
									@foreach($categories as $category)
									<option value="{{ $category->id }}" @if($product->category_id == $category->id) selected @endif>
										{{ $category->name_en }}</option>
										@endforeach
										@endif
									</select>
								</div>

								<div class="form-group col-md-6">
									<label>{{__('site.name_ar')}}</label>
									<input type="text" class="form-control" name="name" 
									value="{{$product->name_ar}}" required>
								</div>

								<div class="form-group col-md-6">
									<label>{{__('site.name_en')}}</label>
									<input type="text" class="form-control" name="name" 
									value="{{$product->name_en}}" required>
								</div>

								<div class="form-group col-md-6">
									<label>{{__('site.unit_ar')}}</label>
									<select class="form-control" name="unit_ar" required>
										<option value="{{$product->unit_ar}}" selected>{{$product->unit}}</option>
										<option value="قطعة">قطعة</option>
										<option value="حبة">حبة</option>
										<option value="علبة">علبة</option>
										<option value="كرتون">كرتون</option>
										<option value="انبوب">انبوب</option>
										<option value="كيس">كيس</option>
										<option value="رول">رول</option>
										<option value="شريط">شريط</option>
									</select>
								</div>

								<div class="form-group col-md-6">
									<label>{{__('site.unit_en')}}</label>
									<select class="form-control" name="unit_en" required>
										<option value="{{$product->unit_en}}" selected>{{$product->unit}}</option>
										<option value="قطعة">قطعة</option>
										<option value="حبة">حبة</option>
										<option value="علبة">علبة</option>
										<option value="كرتون">كرتون</option>
										<option value="انبوب">انبوب</option>
										<option value="كيس">كيس</option>
										<option value="رول">رول</option>
										<option value="شريط">شريط</option>
									</select>
								</div>


								<div class="form-group col-md-6">
									<label>{{__('site.pre_price')}}</label>
									<input type="text" class="form-control" name="pre_price" value="{{$product->pre_price}}" required>
								</div>

								<div class="form-group col-md-6">
									<label>{{__('site.price')}}</label>
									<input type="text" class="form-control" name="price" value="{{$product->price}}" required>
								</div>

								<div class="form-group col-md-6">
									<label>{{__('site.purchase_price')}}</label>
									<input type="text" class="form-control" name="purchase_price" value="{{$product->purchase_price}}" required>
								</div>

								<div class="form-group col-md-6">
									<label>{{__('site.discount')}}</label>
									<input type="text" class="form-control" name="discount" value="{{$product->discount}}" required>
								</div>

								<div class="form-group col-md-6">
									<label>{{__('site.quantity')}}</label>
									<input type="text" class="form-control" name="quantity" value="{{$product->quantity}}" required>
								</div>

								<div class="form-group col-md-6">
									<label>{{__('site.notify')}}</label>
									<input type="text" class="form-control" name="notify" value="{{$product->notify}}" required>
								</div>

								<div class="form-group col-md-6">
									<label>{{__('site.details_ar')}}</label>
									<textarea class="form-control" name="details_ar" value="{{$product->details_ar}}" required>{{$product->details_ar}}</textarea>
								</div>

								<div class="form-group col-md-6">
									<label>{{__('site.details_en')}}</label>
									<textarea class="form-control" name="details_ar" value="{{$product->details_en}}" required>{{$product->details_en}}</textarea>
								</div>

								<div class="form-group col-md-6">
									<label>{{__('site.description_ar')}}</label>
									<textarea class="form-control" name="description_ar" 
									value="{{$product->description_ar}}" required>
									{{$product->description_ar}}</textarea>
								</div>

								<div class="form-group col-md-6">
									<label>{{__('site.description_en')}}</label>
									<textarea class="form-control" name="description_en" 
									value="{{$product->description_en}}" required>
									{{$product->description_en}}</textarea>
								</div>

							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn btn-style">{{__('site.update')}}</button>
							</div>
							<!-- /.card-footer -->
						</form>
					</div>
				</div>
			</div>
		</div>
		@stop