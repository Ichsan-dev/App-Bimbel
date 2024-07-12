<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register Account</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('halaman_auth/images/icons/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('halaman_auth/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('halaman_auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('halaman_auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('halaman_auth/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('halaman_auth/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('halaman_auth/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('halaman_auth/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('halaman_auth/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('halaman_auth/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('halaman_auth/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form action="{{ route('register-proses') }}" class="login100-form validate-form" method="POST">
                    @csrf
                    {{-- <a href="{{route('register')}}" class="btn btn-sm btn-primary">Register</a> --}}
                    <span class="login100-form-title p-b-43">
                        Register Account
                    </span>

                    @if (Session::get('gagal'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <ul>
                                <li>{{ Session::get('gagal') }}</li>
                            </ul>
                        </div>
                    @endif
                    {{-- @if (Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <ul>
                                <li>{{ Session::get('success') }}</li>
                            </ul>
                        </div>
                    @endif --}}

                    <div class="wrap-input100 validate-input" data-validate="Fullname is required">
                        <input class="input100" type="text" name="fullname" value="{{ old('fullname') }}">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Fullname</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" value="{{ old('email') }}">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="#" class="txt1">
                               
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Submit
                        </button>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
                        <p> Have an Account?
                        <span class="txt2">
                            <a href="{{route('login')}}" class="text-primary">Sign In</a>
                        </span>
                        </p>
                    </div>

                    <div class="login100-form-social flex-c-m">
                    </div>
                </form>

                <div class="login100-more"
                    style="background-image: url('{{ asset('halaman_auth/images/bg-01.png') }}');">
                </div>
            </div>
        </div>
    </div>





    <!--===============================================================================================-->
    <script src="{{ asset('halaman_auth/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('halaman_auth/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('halaman_auth/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('halaman_auth/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('halaman_auth/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('halaman_auth/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('halaman_auth/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('halaman_auth/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('halaman_auth/js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{-- @if ($message = Session::get('gagal'))
            <script>
                Swal.fire({
                    icon: "error",
                    text: "{{ $message }}",
                });
            </script>
        @endif --}}
        @if ($message = Session::get('success'))
            <script>
                Swal.fire({
                    icon: "success",
                    text: "{{ $message }}",
                });
            </script>
        @endif


</body>

</html>
