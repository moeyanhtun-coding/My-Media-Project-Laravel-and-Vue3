@extends('admin.layouts.main')
@section('content')
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Post Create
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('post#create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <label for="" class="">Post Title</label>
                        <input value="{{ old('postTitle') }}" type="text" name="postTitle" class="form-control">
                    </div>
                    @error('postTitle')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="mt-3">
                        <label class="" for="">Description</label>
                        <textarea name="postDescription" class="form-control" id="" cols="30" rows="10">{{ old('postDescription') }}</textarea>
                    </div>
                    @error('postDescription')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="mt-3">
                        <label class="" for="">Image</label>
                        <input value="" type="file" class="form-control" name="postImage">
                    </div>
                    <div class="">
                        <label for="" class="">Category</label>
                        <select name="postCategory" id="" class="form-control">
                            <option value="">Choose Category....
                            </option>
                            @foreach ($category as $c)
                                <option value="{{ $c->id }}">{{ $c->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('postCategory')
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
                    Post List
                </h3>

                <div class="card-tools">
                    <form action="" method="post">
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
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Post Title</th>
                            <th>Category</th>
                            <th>Post Image</th>
                            <th>Created At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($postList as $pl)
                            <tr>
                                <td>{{ $pl->post_id }}</td>
                                <td>{{ $pl->title }}</td>
                                <td>{{ $pl->categoryName }}</td>
                                <td>
                                    @if ($pl->image == 'null')
                                        <img src="{{ asset('default/default-ui-image-placeholder-wireframes-600nw-1037719192.jpg.webp') }}"
                                            class="img img-thumbnail" style=" width:150px" alt="Default img">
                                    @else
                                        <img src="{{ asset('PostImage/' . $pl->image) }}" alt="{{ $pl->image }}"
                                            class="img img-thumbnail" style=" width:150px">
                                    @endif
                                </td>
                                <td>{{ $pl->created_at }}</td>
                                <td>
                                    <a class="text-decoration-none" href="">
                                        <button class="  btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                                    </a>
                                    <a class="text-decoration-none" href="{{ route('post#delete', $pl->post_id) }}"><button
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
