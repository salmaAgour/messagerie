@extends('layouts.employeeLayout')

@section('content')
    <br />
    <h1>  لائحة الرسائل الواردة </h1>
    <br />
    <form action={{ Route('search') }} method="POST">
        @csrf
        <input type="text" name='NumEnv' class="form-control w-25" placeholder="أدخل رقم الإرسال" style="display:inline;">
        <input type="text" name='name' class="form-control w-25" placeholder=" أدخل اسم المؤسسة"
                style="display:inline;">
        <button type="submit"> search</button>
    </form>
    <table class="table text-center table-hover">
        <thead class=" table-secondary">
            <tr>
                <th scope="col"> عنوان الوثيقة </th>
                <th scope="col"> عدد النسخ </th>
                <th scope="col"> عدد الصفحات </th>
                <th scope="col"> اسم المصلحة </th>
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
                    <td>{{ $item->NumEnv }}</td>
                    <td>
                        <form action="{{ route('update',$item->id) }}" method="post">
                            @method('put')
                            @csrf
                            <input type="date" name='date' value={{$item->dateRecu}}>
                            <button type="submit" class="btn btn-primary">تم</button>
                        </form>
                    </td>
                </tr>
            @empty
                <h1>No data</h1>
            @endforelse

        </tbody>
    </table>
    <div class="row" style="margin-right:150px">{{ $messages->links() }}</div>
@endsection
