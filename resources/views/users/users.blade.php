@extends('layouts.main-layout')

@section('main_content')
    <h2>User contents</h2>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">User group list</h6>
            <a href="{{ route('users.create') }}" class="btn btn-warning font-weight-bold" style="color:black;"><i
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
                            <th>Sl No.</th>
                            <th>Group.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th class="text-right pr-5">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>

                                <td>{{ $user->id }}</td>
                                <td>{{ $user->group->title }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td class="text-right pr-4">
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-primary">
                                        View

                                    </a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info">
                                        Update

                                    </a>
                                    <form class="d-inline-block" action="{{ route('users.destroy',$user->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
