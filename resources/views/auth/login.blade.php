<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | Admiria - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset("assets/images/favicon.ico") }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset("assets/css/bootstrap.min.css") }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset("assets/css/icons.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset("assets/css/app-rtl.min.css") }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>

<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<!-- Begin page -->
<div class="accountbg" style="background: url('assets/images/bg.jpg');background-size: cover;background-position: center;"></div>

<div class="account-pages mt-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mt-4">
                        </div>
                        <div class="p-3">
                            <h4 class="font-size-18 mt-2 text-center">أهلا وسهلا</h4>
                            <p class="text-muted text-center mb-4">تسجيل الدخول إلى نظام إدارة الجودة</p>

                            <form class="form-horizontal" action="{{ route("login") }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="name">اسم المستخدم</label>
                                    <input type="text" class="form-control" id="name" placeholder="الرجاء ادخال اسم المستخدم" name="name">
                                </div>

                                <div class="form-group">
                                    <label for="password">كلمة المرور</label>
                                    <input type="password" class="form-control" id="password" placeholder="الرجاء ادخال كلمة المرور" name="password">
                                </div>

                                <div class="form-group row mt-4">
                                    <div class="col-sm-8 text-right">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">تسجيل الدخول</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <p class="text-white">Don't have an account ? <a href="pages-register.html" class="font-weight-bold text-primary"> Signup Now </a> </p>
                    <p class="text-white">2017 - 2020 © Admiria. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="{{ asset("assets/libs/jquery/jquery.min.js") }}"></script>
<script src="{{ asset("assets/libs/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("assets/libs/metismenu/metisMenu.min.js") }}"></script>
<script src="{{ asset("assets/libs/simplebar/simplebar.min.js") }}"></script>
<script src="{{ asset("assets/libs/node-waves/waves.min.js") }}"></script>

<script src="{{ asset("assets/js/app.js") }}"></script>

</body>
</html>
