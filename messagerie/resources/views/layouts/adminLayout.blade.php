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

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <title> @yield('title') </title>
    @vite('resources/css/users.css')
</head>

<body dir="rtl">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">الرئيسية</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav d-flex">
            <li class="nav-item active">
              <a class="nav-link" href="#"> لائحة الرسائل الصادرة </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('createA') }}">كتابة رسالة</a>
            </li>
            <li class="nav-item justify-content-sm-end">
              <a class="nav-link" href="{{ route('logout') }}">خروج</a>
            </li>
          </ul>
        </div>
      </nav>

    <div class="container">
        @yield('content')
    </div>


</body>

</html>
