@extends('admin.layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Trend Post Lists
                </h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Post Title</th>
                            <th>Image</th>
                            <th>View Count</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $al)
                            <tr>
                                <td>{{ $al->actionLog_id }}</td>
                                <td>{{ $al->title }}</td>
                                <td>
                                    @if ($al->image == 'null')
                                        <img src="{{ asset('default/default.webp') }}" class="img img-thumbnail"
                                            style=" width:150px" alt="">
                                    @else
                                        <img src="{{ asset('PostImage/' . $al->image) }}" alt="{{ $al->image }}"
                                            class="img img-thumbnail" style=" width:150px">
                                    @endif
                                </td>
                                <td>
                                    <i class="fa-solid fa-eye"></i> {{ $al->view_count }}
                                </td>
                                <td><a class="bg-dark btn btn-dark" href="{{ route('post#detail', $al->post_id) }}"><i
                                            class="fa-solid fa-circle-info"></i></a>
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
