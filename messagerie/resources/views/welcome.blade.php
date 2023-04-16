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
    <title> المراسلات الادارية لإقليم تزنيت </title>
    @vite('resources/css/app.css')
</head>

<body dir="rtl">
    <div>
        <br>
        @if (Route::has('login'))
            <div>
                <div class="logo">
                    <img src={{ asset('pictures/ministryLogo.png') }} alt="ministryLogo" class="ministryLogo" />
                </div>
                <h3>
                    منظومة معلوماتية متكاملة تمكن من إرساء طرق عمل جديدة لتدبير المراسلات الادارية على صعيد المؤسسات
                    التعليمية
                </h3>
                <div class="nav">
                @auth
                    <a href="{{ url('/home') }}"> الرئيسية </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary my-3"> تسجيل الدخول </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"class="btn btn-primary"> إنشاء حساب </a>
                    @endif
                @endauth
            </div>
            </div>
        @endif
    </div>


</body>

</html>
