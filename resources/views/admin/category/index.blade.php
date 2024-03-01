@extends('admin.layouts.main')
@section('content')
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Category Create
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('category#create') }}" method="post">
                    @csrf
                    <div class="">
                        <label for="" class="">Category Title</label>
                        <input type="text" name="categoryTitle" class="form-control">
                    </div>
                    @error('categoryTitle')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="mt-3">
                        <label class="" for="">Description</label>
                        <textarea name="categoryDescription" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    @error('categoryDescription')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="mt-3">
                        <button class="btn btn-dark w-25" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="row">
            @if (Session::has('success'))
                <div class="col-5 offset-7">
                    <div class="alert alert-danger alert-dismissible fade show" style="height: 56px" role="alert">
                        <p class="">{{ Session::get('success') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Category List
                </h3>

                <div class="card-tools">
                    <form action="{{ route('category#search') }}" method="post">
                        @csrf
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="categorySearch" class="form-control float-right"
                                placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Created At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoryList as $cl)
                            <tr>
                                <td>{{ $cl->id }}</td>
                                <td>{{ $cl->title }}</td>
                                <td>{{ Str::limit($cl->description, 20, ' ...') }}</td>
                                <td>{{ $cl->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a class="text-decoration-none" href="{{ route('category#edit', $cl->id) }}">
                                        <button class="  btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                                    </a>
                                    <a class="text-decoration-none" href="{{ route('category#delete', $cl->id) }}"><button
                                            class="btn btn-sm bg-danger text-white"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
