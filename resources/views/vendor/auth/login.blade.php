<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Raido | Vendor login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Preview page of Metronic Admin Theme #4 for " name="description"/>
    <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css"/>
    <link href="../assets/pages/css/login-5.min.css" rel="stylesheet" type="text/css"/>
<body class=" login">
<div class="user-login-5">
    <div class="row bs-reset">
        <div class="col-md-6 login-container bs-reset">
            <img class="login-logo login-6" src="{{ asset('assets/pages/img/logos/logo-111x33.png') }}"/>
            <div class="login-content">
                <h1>Raido Vendor Login</h1>
                <p> Lorem ipsum dolor sit amet, coectetuer adipiscing elit sed diam nonummy et nibh euismod aliquam erat volutpat. Lorem ipsum dolor sit amet, coectetuer adipiscing. </p>
                <form method="POST" class="login-form" action="{{ route('vendor.login') }}">
                    @csrf
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button>
                        <span>Enter any username and password. </span>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <input class="form-control form-control-solid placeholder-no-fix form-group" type="email" autocomplete="off" placeholder="Email" name="email"></div>
                        <div class="col-xs-6">
                            <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8 text-right">
                            {{--                            <div class="forgot-password">--}}
                            {{--                                <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>--}}
                            {{--                            </div>--}}
                            <button class="btn blue" type="submit">Sign In</button>
                        </div>
                    </div>
                </form>
                <!-- BEGIN FORGOT PASSWORD FORM -->
            {{--                <form class="forget-form" action="javascript:;" method="post">--}}
            {{--                    <h3>Forgot Password ?</h3>--}}
            {{--                    <p> Enter your e-mail address below to reset your password. </p>--}}
            {{--                    <div class="form-group">--}}
            {{--                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>--}}
            {{--                    <div class="form-actions">--}}
            {{--                        <button type="button" id="back-btn" class="btn blue btn-outline">Back</button>--}}
            {{--                        <button type="submit" class="btn blue uppercase pull-right">Submit</button>--}}
            {{--                    </div>--}}
            {{--                </form>--}}
            <!-- END FORGOT PASSWORD FORM -->
            </div>
        </div>
        <div class="col-md-6 bs-reset">
            <div class="login-bg">
                {{--                <img class="login-logo login-6" src="{{ asset('assets/pages/img/login/bg3.jpg') }}" />--}}
            </div>
        </div>
    </div>
</div>
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script src="../assets/pages/scripts/login-5.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('#clickmewow').click(function () {
            $('#radio1003').attr('checked', 'checked');
        });
    })
</script>
</body>

</html>
