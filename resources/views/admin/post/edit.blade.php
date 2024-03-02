@extends('admin.layouts.main')
@section('content')
    <div class="col-4">
        <div class="card">
            <div class="card-header ">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title ">
                        Post Create
                    </h3>
                    <a class="text-decoration-none" href="{{ route('admin#post') }}">back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('post#update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <label for="" class="">Post Title</label>
                        <input value="{{ old('postTitle', $posts->title) }}" type="text" name="postTitle"
                            class="form-control">
                        <input type="hidden" name="postId" value="{{ $posts->post_id }}">
                    </div>
                    @error('postTitle')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="mt-3">
                        <label class="" for="">Description</label>
                        <textarea name="postDescription" class="form-control" id="" cols="30" rows="8">{{ old('postDescription', $posts->description) }}</textarea>
                    </div>
                    @error('postDescription')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class=" mt-3 w-100">
                        @if ($posts->image == 'null')
                            <img src="{{ asset('default/default-ui-image-placeholder-wireframes-600nw-1037719192.jpg.webp') }}"
                                class =" w-100 shadow-sm img img-thumbnail" style=" width:150px" alt="Default img">
                        @else
                            <img src="{{ asset('PostImage/' . $posts->image) }}" alt="{{ $posts->image }}"
                                class =" w-100 shadow-sm img img-thumbnail" style=" width:150px">
                        @endif
                    </div>
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
                                <option value="{{ $c->id }}" @if ($c->id == $posts->category_id) selected @endif>
                                    {{ $c->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('postCategory')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="mt-3">
                        <button class="btn btn-success w-25" type="submit">Update</button>
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
            @elseif (Session::has('updated'))
                <div class="col-5 offset-7">
                    <div class="alert alert-success alert-dismissible fade show" style="height: 56px" role="alert">
                        <p class="">{{ Session::get('updated') }}</p>
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
                            <th>Post Description</th>
                            <th>Post Image</th>
                            <th>Created At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $post)
                            <tr>
                                <td>{{ $post->post_id }}</td>
                                <td>{{ Str::limit($post->title, 20, '...') }}</td>
                                <td>{{ Str::limit($post->description, 20, ' ...') }}</td>
                                <td>
                                    @if ($post->image == 'null')
                                        <img src="{{ asset('default/default-ui-image-placeholder-wireframes-600nw-1037719192.jpg.webp') }}"
                                            class ="shadow-sm img img-thumbnail" style=" width:150px" alt="Default img">
                                    @else
                                        <img src="{{ asset('PostImage/' . $post->image) }}" alt="{{ $post->image }}"
                                            class ="shadow-sm img img-thumbnail" style=" width:150px">
                                    @endif
                                </td>
                                <td>{{ Str::limit($post->created_at, 10, '') }}</td>
                                <td>
                                    @if ($posts->post_id === $post->post_id)
                                        <a href="{{ route('post#delete', $post->post_id) }}"><button
                                                class="btn btn-sm bg-danger text-white"><i
                                                    class="fas fa-trash-alt"></i></button></a>
                                    @else
                                        <a class="text-decoration-none" href="{{ route('post#edit', $post->post_id) }}">
                                            <button class="  btn btn-sm bg-dark text-white"><i
                                                    class="fas fa-edit"></i></button>
                                        </a>
                                        <a href="{{ route('post#delete', $posts->post_id) }}"><button
                                                class="btn btn-sm bg-danger text-white"><i
                                                    class="fas fa-trash-alt"></i></button></a>
                                    @endif
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
