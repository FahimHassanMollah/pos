{{-- @extends('layouts.main-layout')

@section('main_content')
    <h2>User details</h2>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
            <a href="{{ route('users.create') }}" class="btn btn-warning font-weight-bold" style="color:black;"><i
                    class="fas fa-pencil-alt"></i> Create New User</a>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="border-0" style="width: 15%"></th>
                            <th class="border-0" style="width: auto"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Id</td>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <td>Group Name</td>
                            <td>{{ $user->group->title }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $user->phone }}</td>
                        </tr>
                        <tr>
                            <td>Addres</td>
                            <td>{{ $user->address }}</td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection --}}


@extends('layouts.user-layout')

@section('user_content')

	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary"> {{ $user->name }} </h6>
	    </div>

	    <div class="card-body">
	    	<div class="row clearfix justify-content-md-center">
	    		<div class="col-md-8">
	    			<table class="table table-borderless table-striped">
			      	<tr>
			      		<th class="text-right">Group :</th>
			      		<td> {{ $user->group->title }} </td>
			      	</tr>
			      	<tr>
			      		<th class="text-right">Name : </th>
			      		<td> {{ $user->name }} </td>
			      	</tr>
			      	<tr>
			      		<th class="text-right">Eamil : </th>
			      		<td> {{ $user->email }} </td>
			      	</tr>
			      	<tr>
			      		<th class="text-right">Phone : </th>
			      		<td> {{ $user->phone }} </td>
			      	</tr>
			      	<tr>
			      		<th class="text-right">Address : </th>
			      		<td> {{ $user->address }} </td>
			      	</tr>
				     </table>
	    		</div>
	    	</div>
	    </div>

	</div>

@endsection
