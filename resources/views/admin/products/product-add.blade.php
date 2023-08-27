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
					<h3 class="card-title">{{__('site.add_data')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('products.store')}}" method="post" enctype="multipart/form-data" >
					@csrf
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-12">
								<label>{{__('site.category')}}</label>
								<select class="form-control" name="category_id" required>
									<option>{{__('site.select')}}</option>
									@if(isset($categories))
									@foreach($categories as $category)
									<option value="<?php echo $category->id; ?>">  <?php echo $category->name_ar; ?> 
								</option>
								@endforeach
								@endif
							</select>
						</div>

						<div class="form-group  col-md-6">
							<label>{{__('site.product_ar')}}</label>
							<input type="text" class="form-control" name="name_ar" id="name_ar"
							value="{{old('name_ar')}}" required>
						</div>

						<div class="form-group  col-md-6">
							<label>{{__('site.product_en')}}</label>
							<input type="text" class="form-control" name="name_en" id="name_en"
							value="{{old('name_en')}}" required>
						</div>

						<div class="form-group  col-md-6">
							<label>{{__('site.unit_ar')}}</label>
								<select class="form-control"  name="unit_ar" required>
									<option value="">{{__('site.select')}}</option>
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

							<div class="form-group  col-md-6">
							<label>{{__('site.unit_en')}}</label>
								<select class="form-control"  name="unit_en" required>
									<option value="">{{__('site.select')}}</option>
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

							<div class="form-group  col-md-6">
								<label>{{__('site.price')}}</label>
								<input type="text" class="form-control" name="price"
								value="{{old('price')}}" required>
							</div>

							<div class="form-group  col-md-6">
								<label>{{__('site.pre_price')}}</label>
								<input type="text" class="form-control" name="pre_price"
								value="{{old('pre_price')}}" required>
							</div>

							<div class="form-group  col-md-6">
								<label>{{__('site.purchase_price')}}</label>
								<input type="text" class="form-control" name="purchase_price"
								value="{{old('purchase_price')}}" required>
							</div>

							<div class="form-group  col-md-6">
								<label>{{__('site.discount')}}</label>
								<input type="text" class="form-control" name="discount"
								value="{{old('discount')}}" required>
							</div>

							<div class="form-group  col-md-6">
								<label>{{__('site.quantity')}}</label>
								<input type="text" class="form-control" name="quantity"
								value="{{old('quantity')}}" required>
							</div>

							<div class="form-group  col-md-6">
								<label>{{__('site.notify')}}</label>
								<input type="text" class="form-control" name="notify"
								value="{{old('notify')}}" required>
							</div>

							<div class="form-group  col-md-6">
								<label>{{__('site.details_ar')}}</label>
								<textarea class="form-control" name="details_ar" value="{{old('details_ar')}}" required></textarea>
							</div>
							<div class="form-group  col-md-6">
								<label>{{__('site.details_en')}}</label>
								<textarea class="form-control" name="details_en" value="{{old('details_en')}}" required></textarea>
							</div>

							<div class="form-group  col-md-6">
								<label>{{__('site.description_ar')}}</label>
								<textarea class="form-control" name="description_ar" id="description_ar" value="{{old('description_ar')}}" required></textarea>
							</div>

							<div class="form-group  col-md-6">
								<label>{{__('site.description_en')}}</label>
								<textarea class="form-control" name="description_en" id="description_en" value="{{old('description_en')}}" required></textarea>
							</div>

							<div class="form-group  col-md-6">
								<label>{{__('site.add_image')}}</label>
								<input type="file" class="form-control" name="photo">
							</div>

							<div class="form-group  col-md-6">
								<label>{{__('site.add_SmallImage')}}</label>
								<input type="file" class="form-control" name="smallPhoto">
							</div>

							<div class="form-group  col-md-6">
								<label>{{__('site.add_gallery')}}</label>
								<input type="file" class="form-control" name="gallery[]" multiple>
							</div>

						</div>


					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<button type="submit" class="btn btn-style">
							<i class="fa fa-plus"></i> 
							{{__('site.add')}}
						</button>
					</div>
					<!-- /.card-footer -->
				</form>
			</div>
		</div>
	</div>
</div>
@stop
