@extends('layouts.user-layout')

@section('user_content')

	<!-- DataTales Example -->
  	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary"> Sales of <strong>{{ $user->name }} </strong></h6>
	    </div>

	    <div class="card-body">
	    	<div class="table-responsive">
		        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		          <thead>
		            <tr>
		              <th>Challen No</th>
		              <th>Customer</th>
		              <th>Date</th>
		              <th>Total</th>
		              <th class="text-right">Actions</th>
		            </tr>
		          </thead>
		          
		          <tbody>
		          	@foreach ($user->sales as $sale)
			            <tr>
			              <td> {{ $sale->challan_no }} </td>
			              <td> {{ $user->name }} </td>
			              <td> {{ $sale->date }} </td>
			              <td> 100 </td>
			              <td class="text-right">
			              	<form >
			              		<button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm">
			              			<i class="fa fa-trash"></i>
			              		</button>
			              	</form>
			              </td>
			            </tr>
		            @endforeach
		          </tbody>
		        </table>
		      </div>
	    </div>

  	</div>


@endsection
