@extends('layouts.main-layout')

@section('main_content')


    <!-- DataTbales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Receipts list</h6>
            <div>
                <form action="{{ route('receipt.report') }}" method="GET">
                    <div class="row">
                        <div class="col">
                            <input type="date"  name="from" class="form-control" placeholder="From">
                        </div>
                        <div class="col">
                            <input  type="date" name="to"  class="form-control" placeholder="To">
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        {{ session('message') }}
                    </div>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-basic" id="">
                    <colgroup>
                        <col style="width: 25%;">
                        <col style="width: 25%;">
                        <col style="width: 25%;">
                        <col style="width: 25%;">

                    </colgroup>
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">User</th>
                            <th class="text-center">Amount</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($receipts as $receipt)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td class="text-center">{{ $receipt->date }}</td>
                                <td class="text-center">{{ $receipt->user->name }}</td>
                                <td class="text-center">{{ $receipt->amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>

                            <td class="text-center" colspan="3">Total</td>

                            <td colspan=""  class="text-center">{{ $totalSum }}</td>

                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
    </script>
@endsection
