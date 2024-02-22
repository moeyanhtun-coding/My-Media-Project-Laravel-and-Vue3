<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3 mt-5m">
                {{-- side bar  --}}
                <a href="{{ route('dashboard') }}"><button
                        class=" offset-2 my-2 btn btn-dark w-50 ">Profile</button></a>
                <a href="{{ route('admin#list') }}">
                    <button class=" offset-2 my-2 btn btn-dark w-50 ">Admin List</button></a>
                <a href="{{ route('admin#category') }}"><button
                        class=" offset-2 my-2 btn btn-dark w-50 ">Category</button></a>
                <a href="{{ route('admin#post') }}"><button class=" offset-2 my-2 btn btn-dark w-50 ">Post</button></a>
                <a href="{{ route('admin#trendPost') }}"><button
                        class=" offset-2 my-2 btn btn-dark w-50 ">TrendPost</button></a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class=" offset-2 my-2 btn btn-dark w-50 ">Logout</button>
                </form>
            </div>
            <div class="col">@yield('content')</div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
