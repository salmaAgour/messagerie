@extends('layouts.employeeLayout')

@section('title', 'لائحة الرسائل الغير مستلمة ')

@section('content')
    <br />
    <h1> لائحة الرسائل الواردة </h1>
    <br />
    <br>
    <table class="table text-center table-hover">
        <thead class=" table-secondary">
            <tr>
                <th scope="col"> عنوان الوثيقة </th>
                <th scope="col"> عدد النسخ </th>
                <th scope="col"> عدد الصفحات </th>
                <th scope="col"> اسم المصلحة </th>
                <th scope="col"> اسم المؤسسة </th>
                <th scope="col"> رقم الإرسال </th>
                <th scope="col"> تاريخ الاستلام</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($messages as $item)
                <tr>
                    <th>{{ $item->Lib_Doc }}</th>
                    <td>{{ $item->Copies }}</td>
                    <td>{{ $item->Pages }}</td>
                    <td>{{ $item->Lib_Serv }}</td>
                    <td>{{ $item->NomEtab }}</td>
                    <td>{{ $item->NumEnv }}</td>
                    <td>
                        @if ($item->estRecu===1)
                            <span id="mySpan">
                            {{ $item->dateRecu }}
                        </span>
                        @else
                            <form action="{{ route('update', $item->id) }}" method="post">
                            @method('put')
                            @csrf
                            <input type="date" name='date' value={{ now() }}>
                            <button type="submit" class="btn btn-primary">تم</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @empty
                <p> لا توجد رسائل </p>
            @endforelse

        </tbody>
    </table>
    <div class="row">{{ $messages->links() }}</div>

@endsection
