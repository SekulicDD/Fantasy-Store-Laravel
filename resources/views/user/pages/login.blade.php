@extends('user.layouts.layout')

@section('title') Login @endsection
@section('description') The main page of the shop. @endsection
@section('keywords') shop, online, home, best, sellers @endsection
@section("style")
    <link rel="stylesheet" href="{{asset("assets/css/form.css")}}">
@endsection

@section('content')
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="{{route("register")}}" method="POST">
                    @csrf
                    <h1>Create Account</h1>
                    <input name="name" type="text" placeholder="Name" />
                    <input name="email" type="email" placeholder="Email" />
                    <input name="password" type="password" placeholder="Password" />
                    <button type="submit">Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form id="logForm" action="{{route("login")}}" method="POST">
                    @csrf
                    <h1>Sign in</h1>
                    <input name="email" type="email" placeholder="Email" />
                    <input name="password" type="password" placeholder="Password" />
                    <button type="submit">Sign In</button>
                </form>
                <div id="errorDiv">

                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="error">{{$error}}</p>
                        @endforeach
                    @endif

                    @if(session("message"))
                        <p class="error">{{session("message")}}</p>
                    @endif
                </div>
            </div>

            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Log in your account</h1>
                        <p>You can login here once you have created your account.</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Create new account</h1>
                        <p>Please create new account if you don't have one!</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>

        </div>


@endsection


