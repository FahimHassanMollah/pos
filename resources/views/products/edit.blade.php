@extends('layouts.main-layout')

@section('main_content')
<h3>Update product details</h3>
    <!-- DataTbales Example -->
    <div class="card shadow mb-4 p-5 w-75">
        <form action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label style="color: black;" for="title">Product Title:<span class="text-danger">*</span></label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $product->title  }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label style="color: black;" for="category_id">Select Category:</span></label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($product->category_id === $category->id) selected='selected' @endif> {{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label style="color: black;" for="address">Description:</label>
                <textarea id="description" name="description" class="form-control">{{   $product->description  }}</textarea>
            </div>
            <div class="form-group">
                <label style="color: black;" for="cost_price">Cost Price:</label>
                <input type="text" id="cost_price" name="cost_price" class="form-control" value="{{  $product->cost_price  }}">
                @error('cost_price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label style="color: black;" for="price">Price:</label>
                <input type="text" id="price" name="price" class="form-control" value="{{  $product->price  }}">
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="d-flex justify-content-between pt-3">
                <a href="{{ route('products.index') }}" class="btn btn-secondary px-5">Go Back</a>
                <button type="submit" class="btn btn-success px-5">Update</button>
            </div>
        </form>
    </div>
@endsection
