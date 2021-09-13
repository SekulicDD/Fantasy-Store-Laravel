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
                        <h1 class="h2 text-uppercase mb-0">Author</h1>
                    </div>
                    <div class="col-lg-6 text-lg-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                                <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Author</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <div class="container">

            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <div>
                        <img class="img-fluid" src="{{asset("assets/img/autor.jpg")}}" alt="autor"></a>
                    </div>

                    <div >
                        <h1>David Sekulić</h1>
                        <p class="text-muted lead">68/18</p>
                        <p class="text-small mb-4">I am creator of this website.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
