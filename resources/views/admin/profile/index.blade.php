@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="row">
            <div class="col text-center">
                <h1>My Profile</h1>
            </div>
        </div>
        <form action="">
            <div class="container ">
                <div class="row my-2 justify-content-center d-flex">
                    <label class="col-2" for="">Name</label>
                    <div class="col-5">
                        <input class="form-control" type="text">
                    </div>
                </div>
                <div class="row my-2 justify-content-center d-flex">
                    <label class="col-2" for="">Email</label>
                    <div class="col-5">
                        <input class="form-control" type="text">
                    </div>
                </div>
                <div class="row my-2 justify-content-center d-flex">
                    <label class="col-2" for="">Phone</label>
                    <div class="col-5">
                        <input class="form-control" type="text">
                    </div>
                </div>
                <div class="row my-2 justify-content-center d-flex">
                    <label class="col-2" for="">Address</label>
                    <div class="col-5">
                        <textarea class="form-control" name="" id="" cols="40" rows="10"></textarea>
                    </div>
                </div>
                <div class="row my-2 justify-content-center d-flex">
                    <div class="">
                        <a href="" class="offset-6">Forgotten Password</a>
                    </div>
                </div>
                <div class="row my-2 d-felx justify-content-center">
                    <div class="col-12">
                        <button class="offset-5 w-25 btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
