@extends('layouts.user-layout')

@section('user_content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> purchases of <strong>{{ $user->name }} </strong></h6>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            @if (session('error'))
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Challen No</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Quantity</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($user->purchases as $purchases)
                            <tr>
                                <td> {{ $purchases->challan_no }} </td>
                                <td> {{ $user->name }} </td>
                                <td> {{ $purchases->date }} </td>
                                <td> {{ $purchases->items->sum('total') }} </td>
                                <td> {{ $purchases->items->sum('quantity') }} </td>
                                <td class="text-right">

                                    <a href="{{ route('users.purchases.invoice.view', ['user' => $user->id, 'invoice' => $purchases->id]) }}"
                                        class="btn btn-primary">view</a>
                                  
                                    @if (count($purchases->items) === 0)
                                        <form method="POST" class="d-inline-block"
                                            action="{{ route('users.purchases.invoice.delete', $purchases->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Are you sure?')" type="submit"
                                                class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif



                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


@endsection
