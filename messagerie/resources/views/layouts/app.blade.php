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
    @vite('resources/css/app.css')
</head>

<body dir="rtl">
    <div>
        <br>
        <div class="logo">
            <img src={{ asset('pictures/ministryLogo.png') }} alt="ministryLogo" class="ministryLogo" />
        </div>
    </div>
    <div>
        <br>
        @yield('content')
    </div>


</body>

</html>
