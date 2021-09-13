<!doctype html>
<html lang="en" class="fullscreen-bg">

@include("admin.fixed.head")
<body>
<!-- WRAPPER -->
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box ">
                <div class="left">
                    <div class="content">
                        <div class="header">
                            <div class="logo text-center"><h2>Fantasy Store Admin Panel</h2></div>
                            <p class="lead">Login to your account</p>
                        </div>

                        <form class="form-auth-small" action="{{route("login")}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="signin-email" class="control-label sr-only">Email</label>
                                <input name="email" type="email" class="form-control" id="signin-email"  placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="signin-password" class="control-label sr-only">Password</label>
                                <input name="password" type="password" class="form-control" id="signin-password"  placeholder="Password">
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>

                        </form>
                    </div>
                </div>
                <div class="right">
                    <div class="overlay"></div>
                    <div class="content text">
                        <h1 class="heading">Fantasy Store Admin Panel</h1>

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- END WRAPPER -->
</body>

</html>
