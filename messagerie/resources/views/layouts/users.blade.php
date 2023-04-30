<!DOCTYPE html>
<html>

<head lang="ar">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title> @yield('title') </title>
    @vite('resources/css/users.css')
</head>

<body dir="rtl">
    <div>
        <div class="flex-shrink-0 p-3" style="width:250px;height:100%;position:fixed;background-color:orange;">
            <a href="#"
                class="d-flex align-items-center justify-content-center pb-3 mb-3 text-decoration-none border-bottom">
                <span class="fs-5 fw-semibold text-white"> الرئيسية </span>
            </a>
            <ul class="list-unstyled ps-0">
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed text-white"
                        data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                        وحدات التعليم الاولي
                    </button>
                    <div class="collapse show" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-bold pb-1 small">
                            <li><a href="#" class="rounded text-decoration-none">
                                    البحث عن وحدة </a></li>
                            <li><a href="#" class="rounded text-decoration-none">بطاقة فردية</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed text-white"
                        data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                        الجمعيات /الشراكة
                    </button>
                    <div class="collapse" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-bold pb-1 small">
                            <li><a href="#" class="rounded text-decoration-none">الجمعيات</a></li>
                        </ul>
                    </div>
                </li>
                <li class="border-top my-3"></li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded text-white" data-bs-toggle="collapse"
                        data-bs-target="#account-collapse" aria-expanded="true">
                        الحساب
                    </button>
                    <div class="collapse" id="account-collapse" style="">
                        <ul class="btn-toggle-nav list-unstyled fw-bold pb-1 small">
                            <li><a href="#" class="rounded text-decoration-none"> حسابي </a></li>
                            <li><a href="#" class="rounded text-decoration-none"> اعدادات </a></li>
                            <li> <a href="{{ route('logout') }}" class="rounded text-decoration-none a">
                                    خروج </a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <br>
    </div>
    <div class="container">
        @yield('content')
    </div>


</body>

</html>
