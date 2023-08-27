@extends('layouts.admin_app')

@section('title', __('site.contacts'))

@section('css')
@stop

@section('js')
@stop


@section('title-page',__('site.contacts'))

@section('content')

<!-- Main content -->
<div class="main-stage contacts">
	<div class="row">
		<div class="col-md-7 m-auto">
			@include('partial.alerts')
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">{{__('site.add_data')}}</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{route('contacts.store')}}" method="post">
					@csrf
					<div class="card-body">
						<div class="form-group">
							<label>{{__('site.name')}}</label>
							<input type="text" class="form-control" name="name" required 
							value="{{old('name')}}">
						</div>
						<div class="form-group">
							<label>{{__('site.phone')}}</label>
							<input type="text" class="form-control" name="phone" required 
							value="{{old('phone')}}">
						</div>
						<div class="form-group">
							<label>{{__('site.email')}}</label>
							<input type="text" class="form-control" name="email" required 
							value="{{old('email')}}">
						</div>
						<div class="form-group">
							<label>{{__('site.subject')}}</label>
							<input type="text" class="form-control" name="subject" required 
							value="{{old('subject')}}">
						</div>
						<div class="form-group">
							<label>{{__('site.message')}}</label>
							<input type="text" class="form-control" name="message" required 
							value="{{old('message')}}">
						</div>
						<div class="form-group">
							<label>{{__('site.notes')}}</label>
							<input type="text" class="form-control" name="notes" required 
							value="{{old('notes')}}">
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