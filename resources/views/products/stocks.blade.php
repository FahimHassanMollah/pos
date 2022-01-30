@extends('layouts.main-layout')

@section('main_content')
<h2>Products</h2>

    <!-- DataTbales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Product list</h6>
            <a href="{{ route('products.create') }}" class="btn btn-warning font-weight-bold" style="color:black;"><i class="fas fa-plus"></i>&nbsp; Add New</a>
        </div>
        <div class="card-body">
            @if(session('message'))
            <div class="col-12">
                <div class="alert alert-info"  role="alert">
                {{ session('message') }}
                </div>
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-basic" id="dataTable">
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
                            <th class="text-center">Title</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Purchase</th>
                            <th class="text-center">Sale</th>
                            <th class="text-center">Stock</th>

                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($products as $product)
                       <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td class="text-center">{{ $product->title }}</td>
                        <td class="text-center">{{ $product->category->title }}</td>
                        <td class="text-center">{{ $product->description }}</td>
                        <td class="text-center">{{ ($product->purchaseItems->sum('quantity')) }}</td>
                        <td class="text-center">{{ ($product->saleItems->sum('quantity')) }}</td>
                        <td class="text-center">{{ ($product->purchaseItems->sum('quantity')) - ($product->saleItems->sum('quantity')) }}</td>

                    </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
    </script>
@endsection
