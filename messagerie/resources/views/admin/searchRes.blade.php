@extends('layouts.adminLayout')

@section('title', 'لائحة الرسائل الصادرة ')

@section('content')
    <br>
    <h2> لائحة الرسائل الصادرة </h2>

    <br>

    <div class="d-flex flex-column justify-content-center p-2 m-2">
        <form action={{ url('/admin/search') }} method="POST">
            @csrf
            <input type="text" name='NumEnv' class="form-control w-25" required placeholder="أدخل رقم الإرسال"
                style="display:inline;">
            <button type="submit" class="btn text-white" style="display:inline;background-color:orange"> بحث </button>
        </form>
        <br />
        <table class="table text-center table-hover">
            <thead class=" table-secondary">
                <tr>
                    <th scope="col"> عنوان الوثيقة </th>
                    <th scope="col"> عدد النسخ </th>
                    <th scope="col"> عدد الصفحات </th>
                    <th scope="col"> اسم المصلحة </th>
                    <th scope="col"> تاريخ الإرسال </th>
                    <th scope="col"> رقم الإرسال </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $item)
                    <tr>
                        <th>{{ $item->Lib_Doc }}</th>
                        <td>{{ $item->Copies }}</td>
                        <td>{{ $item->Pages }}</td>
                        <td>{{ $item->Lib_Serv }}</td>
                        <td>{{ $item->dateEnv }}</td>
                        <td>{{ $item->NumEnv }}</td>
                    </tr>
                @empty
                    <p class="alert alert-danger mt-1"> لا توجد بيانات </p>
                @endforelse

            </tbody>
        </table>
    </div>

@endsection
