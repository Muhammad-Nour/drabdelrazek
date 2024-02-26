@extends('layouts.admin_app')

@section('title', __('site.states'))

@section('css')
@stop

@section('js')
@stop


@section('title-page',__('site.states'))

@section('content')

<!-- Main content -->
<div class="main-stage states">
	<div class="row">
		<div class="col-md-7 m-auto">
			@include('partial.alerts')
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">{{__('site.edit')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('states.update',$state->id)}}" method="post">
					@csrf
					@method('PUT')
					<div class="card-body">
						<div class="form-group">
							<label >{{__('site.name_ar')}}</label>
							<input type="text" class="form-control" name="name_ar" required value="{{ old('name_ar',$state->name_ar) }}">
						</div>
						<div class="form-group col-md-6">
								<label>{{__('site.country')}}</label>
								<select class="form-control" name="country_id" required>
									@if(isset($countries)) 
									@foreach($countries as $country)
									<option value="{{ $country->id }}"@if($state->country_id == $country->id) selected @endif>
										{{ $country->name_ar }}</option>
										@endforeach
										@endif
									</select>
								</div>
						<div class="form-group display-none">
							<label >{{__('site.name_en')}}</label>
							<input type="text" class="form-control" name="name_en" value="{{ old('name_en',$state->name_en) }}">
						</div>
						<div class="form-group">
							<label >{{__('site.state_code')}}</label>
							<input type="text" class="form-control" name="state_code" required value="{{ old('state_code',$state->state_code) }}">
						</div>
						<div class="form-group">
							<label >{{__('site.code')}}</label>
							<input type="text" class="form-control" name="code" required value="{{ old('code',$state->code) }}">
						</div>
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<button type="submit" class="btn btn-style">
							{{__('site.update')}}
						</button>
					</div>
					<!-- /.card-footer -->
				</form>
			</div>
		</div>
	</div>
</div>
@stop
