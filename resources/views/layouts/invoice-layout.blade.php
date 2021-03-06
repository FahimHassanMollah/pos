@extends('layouts.main-layout')

@section('main_content')

    <div class="row clearfix page_header">
        <div class="col-md-4">
            {{-- <a class="btn btn-info" href="{{ route('users.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Back </a> --}}
        </div>

    </div>

    <div class="row clearfix mt-5">

        <div class="col-md-2">
            <div class="nav flex-column nav-pills">
                <a class="nav-link  @if ($tab_menu == 'user_info') active @endif " href=" {{ route('users.show', $user->id) }} ">User Info</a>
                <a class="nav-link  @if ($tab_menu == 'sales') active @endif " href=" {{ route('users.sale', $user->id) }} ">Sales Invoices</a>
                <a class="nav-link  @if ($tab_menu == 'purchases') active @endif"
                    href=" {{ route('users.purchases', $user->id) }} ">Purchases Invoice</a>
                <a class="nav-link  @if ($tab_menu == 'payments') active @endif"
                    href=" {{ route('users.payments', $user->id) }} ">Payments</a>
                <a class="nav-link  @if ($tab_menu == 'receipts') active @endif"
                    href=" {{ route('users.receipts', $user->id) }} ">Receipts</a>
                {{-- <a class="nav-link"   href="{{ route('user.sales', $user->id) }}">Sales</a>
			  <a class="nav-link"  href="{{ route('user.purchases', $user->id) }}">Purchases</a>
			  <a class="nav-link"   href="{{ route('user.payments', $user->id) }}">Payments</a>
			  <a class="nav-link "  href="{{ route('user.receipts', $user->id) }}">Receipts</a> --}}
            </div>
        </div>

         @include('layouts.user-layout-content')
    </div>

@stop
