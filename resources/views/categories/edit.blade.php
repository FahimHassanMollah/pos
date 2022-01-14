@extends('layouts.main-layout')

@section('main_content')
<h3>Update Category</h3>

    <!-- DataTbales Example -->
    <div class="card shadow mb-4 p-5 w-75">
        <form action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label style="color: black;" for="title">Category Title:<span class="text-danger">*</span></label>
                <input type="text" id="title" name="title" class="form-control" value="{{  $category->title  }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-between pt-3">
                <a href="{{ route('categories.index') }}" class="btn btn-secondary px-5">Go Back</a>
                <button type="submit" class="btn btn-success px-5">Update</button>
            </div>
        </form>
    </div>
@endsection
