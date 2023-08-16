<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>log-in</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin')}}/assets/images/favicon.png">
    <link href="{{asset('admin')}}/css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-5">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <h4 class="text-center text-info">Ecommerce Admin Pannel</h4>

                                <form class="mt-5 mb-5 login-input" method='post' action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" id="email" name="email" value="{{old('email')}}"
                                            class="form-control pl-3 {{$errors->has('name')? 'has-error':''}}"
                                            placeholder="Enter your email address...">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2 has-error" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="password" name="password" class="form-control pl-3 mb-2" placeholder="Enter your password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2 has-error" />
                                        <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100">Sign In</button>
                                </form>
                                <p class="mt-5 login-form__footer">Don't have account? <a href="{{url('/register')}}"
                                        class="text-primary">Sign Up</a> now</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>

</html>
