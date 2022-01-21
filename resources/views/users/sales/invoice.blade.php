@extends('layouts.user-layout')

@section('user_content')

    <div class="card shadow mb-4">
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
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> {{ $user->name }} </h6>
        </div>

        <div class="card-body">
            <div class="row clearfix justify-content-md-center">
                <div class="col-md-6">
                    <div class="no_padding no_margin"> <strong>Customer:</strong> {{ $user->name }}</div>
                    <div class="no_padding no_margin"><strong>Email:</strong> {{ $user->email }}</div>
                    <div class="no_padding no_margin"><strong>Phone:</strong> {{ $user->phone }}</div>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <div class="no_padding no_margin"><strong>Date:</strong> {{ $invoice->date }} </div>
                    <div class="no_padding no_margin"><strong>Challen No:</strong> {{ $invoice->challan_no }} </div>
                </div>
            </div>
            <div class="invoice_items">
                <table class="table">
                    <thead>
                        <th>SL</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>

                        <th class="text-right">-</th>
                    </thead>
                    <tbody>
                        @foreach ($invoice->items as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->product->title }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->total }}</td>
                                <td>
                                    <form action="{{ route('users.sale.invoice.delete.item',$item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th></th>
                        <th>
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#newProduct">
                                <i class="fa fa-plus "></i> Add Product
                            </button>
                        </th>
                        <th colspan="2" class="text-right"> Total: </th>
                        <td class="text-primary font-weight-bold">{{ $invoice->items->sum('total') }}</td>
                    </tfoot>

                </table>
            </div>
        </div>

        {{-- add product modal --}}
        <div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form
                        action="{{ route('users.sale.invoice.add.item', ['user' => $user->id, 'invoice' => $invoice->id]) }}"
                        method="post">
                        @csrf

                        <div class="modal-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="ammount">Product</label>
                                <select name="product" id="" class="form-control">
                                    <option value="">Select product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="unitPrice">Unit Price</label>
                                <input type="text" class="form-control" name="unitPrice" id="unitPrice">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="text" class="form-control" name="quantity" id="quantity">
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="text" class="form-control" name="total" id="total">
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

@endsection
