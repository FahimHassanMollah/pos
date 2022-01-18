@extends('layouts.main-layout')

@section('main_content')

    <div class="row clearfix page_header">
        <div class="col-md-4">
            <a class="btn btn-info" href="{{ route('users.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Back </a>
        </div>
        <div class="col-md-8 text-right">
            <a class="btn btn-info" href="{{ url('users/create') }}"> <i class="fa fa-plus"></i> New Sale </a>
            <a class="btn btn-info" href="{{ url('users/create') }}"> <i class="fa fa-plus"></i> New Purchase </a>
            <a class="btn btn-info" data-toggle="modal" data-target="#newPayment"> <i class="fa fa-plus"></i> New
                Payment </a>
            <a class="btn btn-info" data-toggle="modal" data-target="#newReceipts"> <i class="fa fa-plus"></i> New
                Receipt </a>
        </div>
    </div>

    <div class="row clearfix mt-5">

        <div class="col-md-2">
            <div class="nav flex-column nav-pills">
                <a class="nav-link  @if ($tab_menu == 'user_info') active @endif " href=" {{ route('users.show', $user->id) }} ">User Info</a>
                <a class="nav-link  @if ($tab_menu == 'sales') active @endif " href=" {{ route('users.sale', $user->id) }} ">Sales</a>
                <a class="nav-link  @if ($tab_menu == 'purchases') active @endif"
                    href=" {{ route('users.purchases', $user->id) }} ">Purchases</a>
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

        <div class="col-md-10">

            @yield('user_content')

            <!-- Modal  Receipts-->
            <div class="modal fade" id="newReceipts" tabindex="-1" role="dialog" aria-labelledby="newReceipts"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Receipt</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('users.receipts.store', $user->id) }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control" id="date">
                                </div>
                                <div class="form-group">
                                    <label for="ammount">Ammount</label>
                                    <input type="text" class="form-control" name="amount" id="ammount">
                                </div>
                                <div class="form-group">
                                    <label for="ammount">Note</label>
                                    <textarea name="note" id="" rows="5" name="note" class="form-control"></textarea>
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Modal payment-->
            <div class="modal fade" id="newPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New payment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('users.payments', $user->id) }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control" id="date">
                                </div>
                                <div class="form-group">
                                    <label for="ammount">Ammount</label>
                                    <input type="text" class="form-control" name="amount" id="ammount">
                                </div>
                                <div class="form-group">
                                    <label for="ammount">Note</label>
                                    <textarea name="note" id="" rows="5" name="note" class="form-control"></textarea>
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        </div>
    </div>

@stop
