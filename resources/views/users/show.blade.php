@extends('layouts.user-layout')

@section('user_content')
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Sales</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @php
                                     $totalSales = 0 ;
                                   foreach ($user->sales as $sale) {
                                       foreach ($sale->items as $item) {
                                            $totalSales = $totalSales + $item->total;
                                       }
                                   }
                                   echo '$'.$totalSales;
                                @endphp



                                </div>
                        </div>
                        <div class="col-auto">
                             <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Purchases</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                  @php
                                     $totalPurchases = 0 ;
                                   foreach ($user->purchases as $purchase) {
                                       foreach ($purchase->items as $item) {
                                            $totalPurchases = $totalPurchases + $item->total;
                                       }
                                   }
                                   echo '$'.$totalPurchases;
                                @endphp
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Receipts
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $user->receipts->sum('amount') }}</div>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto">
                             <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total payments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->payments->sum('amount') }}</div>
                        </div>
                        <div class="col-auto">
                             <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Balance</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                {{( $user->payments->sum('amount') +  $user->receipts->sum('amount') ) - ($totalSales + $totalPurchases)  }}
                            </div>
                        </div>
                        <div class="col-auto">
                             <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
