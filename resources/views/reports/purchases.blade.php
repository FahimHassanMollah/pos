@extends('layouts.main-layout')

@section('main_content')


    <!-- DataTbales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Purchase list</h6>
            <div>
                <form action="{{ route('purchase.report') }}" method="GET">
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
                        <col style="width: 5%;">
                        <col style="width: 15%;">
                        <col style="width: 15%;">
                        <col style="width: 20%;">
                        <col style="width: 15%;">
                        <col style="width: 15%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th class="text-center">Products</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchases as $purchase)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td class="text-center">{{ $purchase->product->title }}</td>
                                <td class="text-center">{{ $purchase->price }}</td>
                                <td class="text-center">{{ $purchase->quantity }}</td>
                                <td class="text-center">${{ $purchase->total }}</td>
                                <td class="text-center">{{ $purchase->invoice->date }}</td>


                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>

                            <td class="text-center" colspan="3">Total</td>
                            <td  class="text-center">{{ $quantitySum }}</td>
                            <td colspan=""  class="text-center">{{ $totalSum }}</td>
                            <td colspan=""  class=""></td>
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
