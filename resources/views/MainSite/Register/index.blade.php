<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('/images/favicon.png') }}" type="image/png">
    <!-- Fav Icon -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Athens Creative </title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    




    <link rel="stylesheet" type="text/css" href="{{ asset('/css/user/theme.css') }}">
    <!-- Custom css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/user/responsive.css') }}">

    <!-- Custom css -->
</head>

<body>
    <section class="Register-page">
        <div class="container top-bottom">
            <div class="col-lg-6 col-md-6  col-sm-6 col-xs-12 float-left">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-12  col-sm-12 col-xs-12 float-left">
                                <a href="#" class="active" id="login-form-link">Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row left-right">
                            <div class="col-lg-6 ">

                                <form action="" name='foo' method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group input">
                                        <label>First name<span class="required">*</span></label>
                                        <input type="text" id="input-field" value="{{ old('first_name') }}"
                                            name="first_name" placeholder="First Name" 
                                            class="form-control register-input">

                                        @if ($errors->has('first_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group input">
                                        <label>Username<span class="required">*</span></label>
                                        <input type="text" name="user_name" value="{{ old('user_name') }}"
                                            minlength="4" placeholder="User Name" class="form-control register-input">

                                        @if ($errors->has('user_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('user_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group input">
                                        <label>Phone<span class="required">*</span></label>
                                        <input type="text" id="phone-field" name="phone"
                                            value="{{ old('phone') }}" maxlength="15" placeholder="Phone number"
                                            class="form-control register-input" >

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group input">
                                        <label>Password<span class="required">*</span></label>
                                        <input type="password" name="password" placeholder="Password"
                                            class="form-control register-input">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group input">
                                    <label>Last name<span class="required">*</span></label>
                                    <input type="text" id="last-field" value="{{ old('last_name') }}"
                                        name="last_name" placeholder="Last Name" 
                                        class="form-control register-input">

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group input">
                                    <label>Email<span class="required">*</span></label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        placeholder="Email address" class="form-control register-input">



                                    <span class="help-block">
                                        <strong id="error_email">{{ $errors->first('email') }}</strong>
                                    </span>

                                </div>
                                <div class="form-group input">
                                    <label>Zip Code<span class="required">*</span></label>
                                    <input type="text" name="zip_code" value="{{ old('zip_code') }}" maxlength="5"
                                        placeholder="Zip Code" class="form-control register-input">

                                    @if ($errors->has('zip_code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('zip_code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group input">
                                    <label>Confirm password<span class="required">*</span></label>
                                    <input type="password" name="password_confirmation" placeholder="Confirm password"
                                        class="form-control register-input error-border">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group input">
                                    <label>Profile Picture<span class="required">*</span></label>
                                    <input type="file" name="image"
                                        class="form-control register-input error-border">
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group input">
                                <div class="row">
                                    <div class="register-button">
                                        <input type="submit" name="register-submit" tabindex="4"
                                            class="form-control btn btn-register" value="Register">
                                    </div>
                                </div>
                            </div>
                            <a href="{{url('/login')}}" style="padding-bottom: 5px">
                                Already have an account?
                            </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6  col-sm-6 col-xs-12 float-left">
                <div class="image-register">
                    <img src="{{ asset('/images/main_logo.png') }}">
                </div>
            </div>
        </div>

        </div>
    </section>



    


</body>

</html>
