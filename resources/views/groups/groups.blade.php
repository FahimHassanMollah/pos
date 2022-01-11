@extends('layouts.main-layout')

@section('main_content')
    <h2>User Groups </h2>

    <!-- DataTbales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">User group list</h6>
            <a href="{{ route('group.create') }}" class="btn btn-warning font-weight-bold" style="color:black;"><i
                    class="fas fa-pencil-alt"></i> Create New</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Title</th>
                            <th class="text-right pr-5">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                            <tr>
                                <td>{{ $group->id }}</td>
                                <td>{{ $group->title }}</td>
                                <td class="text-right pr-4">
                                    <a href="" class="btn btn-sm btn-info">
                                        Update

                                    </a>
                                    <a href="" class="btn btn-sm btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
