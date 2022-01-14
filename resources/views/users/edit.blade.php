@extends('layouts.main-layout')

@section('main_content')
    <h3>Update User </h3>

    <!-- DataTbales Example -->

    <div class="card shadow mb-4 p-5 w-75">

        @if (session('message'))
            <div class="col-12">
                <div class="alert alert-info" role="alert">
                    {{ session('message') }}
                </div>
            </div>
        @endif

        <form action="{{ route('users.update',$user->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label style="color: black;" for="name">User Group*:</label>
                <select class="form-control" name="group_id" id="">
                    <option value="" style="display: none">Select </option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}" {{ $user->group_id == $group->id ? 'selected' : '' }}   >{{ $group->title }}</option>
                    @endforeach
                </select>
                @error('group_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label style="color: black;" for="name">Name:<span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" class="form-control" value="{{ ($user->name) }}"
                    placeholder="Enter email address">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label style="color: black;" for="name">Email:<span class="text-danger">*</span></label>
                <input type="text" id="email" name="email" class="form-control" value="{{ ($user->email) }}"
                    placeholder="Enter email address">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label style="color: black;" for="phone">Phone:<span class="text-danger">*</span></label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ ($user->phone) }}"
                    placeholder="Enter phone number">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label style="color: black;" for="name">Address:</label>
                <textarea type="text" id="address" name="address" class="form-control"
                    rows="3" placeholder="Enter address">{{ ($user->address) }}</textarea>
            </div>


            <div class="d-flex justify-content-between pt-3">
                <a href="{{ route('users.index') }}" class="btn btn-secondary px-5">Go Back</a>
                <button type="submit" class="btn btn-success px-5">Update</button>
            </div>
        </form>
    </div>

@endsection
