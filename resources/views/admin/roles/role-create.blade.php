@extends('layouts.admin_app')

@section('title', __('site.roles'))

@section('css')
@stop

@section('js')
@stop

@section('title-page',__('site.roles'))

@section('content')

<!-- Main content -->
<div class="main-stage roles">
	<div class="row">
		<div class="col-md-10 m-auto">
			@include('partial.alerts')
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">{{__('site.add_data')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('roles.store')}}" method="post">
					@csrf
					{{ method_field('post') }}
					<div class="card-body">
						<div class="form-group">
							<label>{{__('site.name')}}</label>
							<input type="text" class="form-control" name="name"value="{{old('name')}}" required>
						</div>
						<div class="form-group">
							<label for="permission">{{__('site.roles')}}</label>
								<div class="row">
									@foreach($permission as $value)
									<label class="col-md-3">
										<input type="checkbox" name="permission[]" value="{{$value->id}}">
										{{ $value->name }} 
									</label>
									@foreach($rest as $res)
									@if($value->id === $res->foreign_keyyy)
									<label class="col-md-3">
										<input type="checkbox" name="permission[]" value="{{$res->id}}">
										{{ $res->name }}
									</label>
									@endif
									@endforeach
									<br/>
									@endforeach
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