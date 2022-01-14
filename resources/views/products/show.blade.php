@extends('layouts.main-layout')

@section('main_content')
    <div class="mb-4">
        <a href="{{ route('products.index') }}" class="btn border-2 border-secondary font-semibold text-secondary"><i
                class="fas fa-angle-double-left"></i>&nbsp; Back</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <div><span style="font-size: 30px;" class="text-primary mr-2"><i class="fas fa-border-none"></i></span></div>

                <h4 class="m-0 font-weight-bold text-primary text-capitalize">{{ $product->title }}</h4>
            </div>
        </div>
        <div class="card-body py-3">
            <div class="">
                <div class=""></div>
                <div class="">
                    <div style="background-color: #f8f8f8;" class="p-3 rounded ">
                        <div class="w-100">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="border-0" style="width: 15%"></th>
                                        <th class="border-0" style="width: auto"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-dark">Product Title:</th>
                                        <td class="text-capitalize text-dark">{{ $product->title }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-dark">Category:</th>
                                        <td class="text-capitalize text-dark">{{ $product->category->title }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-dark">Description:</th>
                                        <td class="text-dark">{{ $product->description }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-dark">Cost Price:</th>
                                        <td class="text-dark">{{ $product->cost_price }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-dark">price:</th>
                                        <td class="text-dark">{{ $product->price }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-offset-3 col-lg-offset-1 col-md-offset-0"></div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
    </script>
@endsection
