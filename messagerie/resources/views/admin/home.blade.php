@extends('layouts.users')

@section('title', 'كتابة رسالة جديدة')

@section('content')

    <h2 style="margin-right:150px"> كتابة رسالة جديدة </h2>

    <br>

    <div class="d-flex justify-content-center p-2 m-2">
        <div class="card p-4 w-50 mssg">
            <form action={{ Route('store') }} method="post">
                @csrf
                <br>
                <div class="row mb-3">
                    <label for="" class="col-md-3 col-form-label text-md-end"> عنوان الوثيقة </label>
                    <div class="col">
                        <input type="text" name="Lib_Doc" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for=""class="col-md-3 col-form-label text-md-end"> عدد الصفحات </label>
                    <div class="col">
                        <input type="text" name="Pages" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for=""class="col-md-3 col-form-label text-md-end"> عدد النسخ </label>
                    <div class="col">
                        <input type="text" name="Copies" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for=""class="col-md-3 col-form-label text-md-end"> المصلحة </label>
                    <div class="col">
                        <input type="text" name="Lib_Serv" class="form-control">
                    </div>
                </div>
            
                <div class="d-flex justify-content-end">
                    <button class='plus btn fw-bold fs-5 text-white' style="border-radius:45%;background-color:orange">+</button>
                </div>
                <div class="my-2 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary w-25"> إرسال </button>
                </div>
            </form>
        </div>
    </div>

@endsection
