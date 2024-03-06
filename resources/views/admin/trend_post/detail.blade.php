@extends('admin.layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header justify-content-between align-items-center">
                <h3 class="card-title">
                    Trend Post Detail
                </h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <div class="">
                            <button onclick="history.back()" class="btn btn-dark">Back</button>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card-header -->

            <div class="my-3">
                <h2 class="text-center">{{ $data->title }}</h2>
            </div>
            <div class="col-8 offset-2">
                <div class="">
                    @if ($data->image == 'null')
                        <img src="{{ asset('default/default.webp') }}" class="img img-thumbnail" alt="">
                    @else
                        <img src="{{ asset('PostImage/' . $data->image) }}" alt="{{ $data->image }}"
                            class="img img-thumbnail">
                    @endif
                </div>
                <div class="mt-4">
                    <h3>Description</h3>
                    <p> {{ $data->description }}</p>
                </div>
            </div>


            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
