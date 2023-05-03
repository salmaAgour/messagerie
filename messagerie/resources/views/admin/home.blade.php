@extends('layouts.adminLayout')

@section('title', 'لائحة الرسائل الصادرة ')

@section('content')

    <h2 style="margin-right:150px"> لائحة الرسائل الصادرة </h2>

    <br>

    <div class="d-flex flex-column justify-content-center p-2 m-2">
        <form action={{ url('/admin/search') }} method="POST" style="margin-right:150px">
            @csrf
            <input type="text" name='NumEnv' class="form-control w-25" placeholder="أدخل رقم الإرسال"
                style="display:inline;">
            <button type="submit" class="btn btn-primary" style="display:inline;"> بحث </button>
        </form>
        <br />
        <table class="table text-center table-hover" style="margin-right:150px">
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
                    <h1>No data</h1>
                @endforelse

            </tbody>
        </table>
        <div class="row" style="margin-right:150px">{{ $messages->links() }}</div>
    </div>

@endsection
