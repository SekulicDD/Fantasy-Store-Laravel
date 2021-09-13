@extends('user.layouts.layout')

@section('title') Home @endsection
@section('description') The main page of the shop. @endsection
@section('keywords') shop, online, home, best, sellers @endsection

@section('content')
    <div class="page-holder">

        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">Contact</h1>
                    </div>
                    <div class="col-lg-6 text-lg-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                                <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div id="forms">
                    <div class="card-body">
                        <form action="{{route("sendMessage")}}" method="POST" class="w-100">
                            @csrf
                            <fieldset>
                                <legend>Contact Form</legend>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Enter you email">
                                </div>
                                <div class="form-group w-100">
                                    <label for="msg">Message</label><br>
                                    <textarea class="form-control" id="message" name="message" rows="6" placeholder="Enter you message"></textarea>
                                </div>

                                <button id="sendMsg" class="btn btn-primary" type="button">Submit</button>
                            </fieldset>
                        </form>
                        <div style="display: none" class="alert-danger text-danger col-6" id="errors"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
