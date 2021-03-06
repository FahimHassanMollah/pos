@extends('layouts.main-layout')

@section('main_content')
<h2>Categories List</h2>

<!-- DataTbales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-end align-items-center">

        <a href="{{ route('categories.create') }}" class="btn btn-warning font-weight-bold" style="color:black;"><i class="fas fa-plus"></i>&nbsp; Add New</a>

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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Sl No.</th>
                        <th class="text-center">Title</th>
                        <th class="text-right pr-5">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($categories as $catogry)
                    {{-- {{ dd($catogry) }} --}}
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td class="text-center">{{ $catogry->title }}</td>
                        <td class="text-right pr-4">
                            <a href="{{ route('categories.edit', $catogry->id) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
                            <button data-id="{{ $catogry->id }}" data-toggle="modal" data-target="#deleteCategory" id="deletCategory" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- delete modal --}}
        <div class="modal fade" id="deleteCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <i class="fas fa-exclamation-circle fa-5x mt-3"></i>
                        <h3 class="pt-4 mb-2 text-dark">Are you sure?</h3>
                        <p class="text-secondary">Do you really want to delete this records? This process can't be
                            undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form action="" id="deleteFormActionRoute" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" id="deleteGroupModalHref" class="btn btn-danger">Delete it.</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.getElementById("deletCategory").addEventListener('click', function () {
   let id = document.getElementById("deletCategory").getAttribute("data-id");
    document.getElementById('deleteFormActionRoute').setAttribute('action',`/categories/${id}`)
});

</script>
@endsection

