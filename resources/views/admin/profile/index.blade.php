@extends('admin.layouts.main')
@section('content')
    <div class="col-8 offset-3 mt-5">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <legend class="text-center">User Profile</legend>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            @if (Session::has('update_success'))
                                <div class="alert alert-warning alert-dismissible fade show" style="height: 56px"
                                    role="alert">
                                    <p class=""> {{ Session::get('update_success') }}</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @elseif (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" style="height: 56px"
                                    role="alert">
                                    <p class=""> {{ Session::get('success') }}</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form class="form-horizontal" method="post" action="{{ route('admin#profileUpdate') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Name"
                                            name="name" value="{{ $data->name }}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email"
                                            value="{{ $data->email }}" name="email">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="inputEmail" placeholder="Phone"
                                            value="{{ $data->phone }}" name="phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <textarea name="address" class="form-control" id="" cols="30" rows="10" placeholder="Address">{{ $data->address }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-sm-10">
                                        <select name="gender" id="" class="form-control">
                                            @if ($data->gender == 'male')
                                                <option value="">Gender</option>
                                                <option value="male" selected>Male</option>
                                                <option value="female">Female</option>
                                            @elseif ($data->gender == 'female')
                                                <option value="">Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female" selected>Female</option>
                                            @else
                                                <option value="" selected>Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <a href="{{ route('admin#passwordChangePage') }}">Change Password</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn bg-dark text-white">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
