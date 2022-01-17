@extends('layouts.user-layout')

@section('user_content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Payments of <strong>{{ $user->name }} </strong></h6>
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
                            <th>User</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Note</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($user->payments as $payment)
                            <tr>
                                <td> {{ $user->name }} </td>
                                <td> {{ $payment->date }} </td>
                                <td> {{ $payment->amount }} </td>
                                <td> {{ $payment->note }} </td>
                                <td class="text-right">
                                    <form method="POST" action=" {{ route('users.payments.destroy', ['user' => $user->id,'payment'=>$payment->id]) }} ">
                                        {{-- <a class="btn btn-primary btn-sm"
                                            href="{{ route('users.show', ['user' => $user->id]) }}">
                                            <i class="fa fa-eye"></i>
                                        </a> --}}
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" type="submit"
                                            class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal -->
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


@endsection
