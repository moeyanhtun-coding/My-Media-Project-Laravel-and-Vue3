@extends('admin.layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Category List
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
                            <th>Category Name</th>
                            <th>Created Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Vegatable</td>
                            <td>11-7-2014</td>
                            <td>
                                <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Seafood</td>
                            <td>11-7-2014</td>
                            <td>
                                <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Thailand</td>
                            <td>11-7-2014</td>
                            <td>
                                <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>USA</td>
                            <td>11-7-2014</td>
                            <td>
                                <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
