@extends('app')


	@section('content')
		{{-- expr --}}
		<div class="row">
			<div class="col-md-12">
			<h1>Laravel simple Ajax CRUD</h1>
			</div>
		</div>

		<div class="form-group add row">
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
				<input type="text" name="title" id="title" class="form-control" value="" placeholder="Your Title Here" required>
				<p class="error text-center alert alert-danger hidden"></p>
			</div>
		
		
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
				<input type="text" name="description" id="description" class="form-control" value="" placeholder="Your Description Here" required>
				<p class="error text-center alert alert-danger hidden"></p>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">				
				<button id="add" type="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon-plus">Add New Data</span>
				</button>
			</div>
		</div>


		<div class="row">
			<div class="table-responsive">
				<table class="table table-borderless" id="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Title</th>
							<th>Description</th>
							<th>Action</th>
						</tr>

					</thead>
					<tbody>
					{{ csrf_field() }}
					<?php $no = 1;?>
					@foreach($blogs as $blog)
						<tr class="item{{ $blog->id }}">
							<td>{{ $no++ }}</td>
							<td>{{ $blog->title }}</td>
							<td>{{ $blog->description }}</td>
							<td>
								<button type="button" class="edit-modal btn btn-primary" data-id="{{ $blog->id }}" data-title="{{ $blog->title }}" data-description="{{ $blog->description }}" >
									<span class="glyphicon glyphicon-edit"></span>
									Edit
								</button>
								<button type="button" class="delete-modal btn btn-danger" data-id="{{ $blog->id }}" data-title="{{ $blog->title }}" data-description="{{ $blog->description }}" >
									<span class="glyphicon glyphicon-trash"></span>
									Delete
								</button>
							</td>
						</tr>
					@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
		<div class="modal fade" role="dialog" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<form action="" method="POST" class="form-horizontal" role="form">		
						
							<div class="form-group">
								<label class="control-label col-sm-2" for="id">ID: </label>
								<div class="col-sm-10">
									<input type="text" id="fid" class="form-control" disabled>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="title">Title: </label>
								<div class="col-sm-10">
									<input type="name" id="t" class="form-control" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="description">Title: </label>
								<div class="col-sm-10">
									<input type="name" id="d" class="form-control" 		>
								</div>
							</div>
						</form>
						<div class="deleteContent">
							Are you sure you want to delete<span class="title"> </span>
							<span class="hidden id"></span>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn actionBtn" data-dismiss="modal">
						<span id="footer_action_button" class="glyphicon"></span>
						</button>
						<button type="button" class="btn btn-warning" data-dismiss="modal">
							<span class="glyphicon glyphicon-remove"></span>Close
						</button>
					</div>
				</div>
			</div>
		</div>
	@stop