<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div id="app">
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
{{--                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#themeModal">Create New Theme</button>--}}
{{--                    <create-theme-component></create-theme-component>--}}
                </div>
            </div>
        </div>
        <br/>
        <div class="content">
{{--            <example-component></example-component>--}}
{{--            <test-component></test-component>--}}
{{--            <button @click="()=>{const test = $refs['blog-component']; debugger; }">TEST</button>--}}
            <div class="title m-b-md">
{{--                @foreach($themes as $theme)--}}
{{--                    <div class="theme_{{$theme->id}}">--}}
{{--                        <blog-component loggedin="true" id="{{$theme->id}}" name="{{$theme->name}}" body="{{$theme->body}}"></blog-component>--}}
{{--                        <br>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
                <root-component :themes="{{$themes}}"></root-component>
{{--                    <blog-component loggedin="true" id="1" title="werqwerqwerqwer" body="qwerqwerqwer"></blog-component>--}}
                <div class="container">
{{--                    <div class="row justify-content-center">--}}
{{--                        <div class="col-md-12">--}}
{{--                            {{$themes->links()}}--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    {{--            </div>--}}

    <!-- New Theme Modal -->
        <div class="modal fade" id="themeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create New Theme</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="themeForm" method="POST" action="{{route('home.themeadd')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name"/>
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="body">Description</label>
                                <textarea class="form-control h-25" rows="10"  placeholder="Theme Description" name="body"></textarea>
                                @error('body')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="invalid-feedback">
                                    Please enter a message in the textarea.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Ok</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
</body>
</html>

{{--<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>--}}



