@extends('admin.layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Admin List
                </h3>


                <div class="card-tools">
                    <form action="{{ route('admin#search') }}" method="POST">
                        @csrf
                        <div class="input-group input-group-sm" style="width: 150px;">

                            <input type="text" name="adminSearch" class="form-control float-right" placeholder="Search">
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
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $admin)
                            <tr>
                                <td>{{ $admin->id }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->address }}</td>
                                <td>{{ $admin->phone }}</td>
                                <td>{{ $admin->gender }}</td>
                                <td>
                                    @if ($admin->id === Auth::user()->id)
                                    @else
                                        <a href="{{ route('admin#delete', $admin->id) }}">
                                            <button class="btn btn-sm bg-danger text-white"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </a>
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
