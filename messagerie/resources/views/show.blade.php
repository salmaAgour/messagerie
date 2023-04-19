@extends('layouts.app')

@section('content')
    <br />
    <h1> نتائج البحث </h1>
    <br/>
    <table class="table text-center table-hover">
        <thead class=" table-secondary">
            <tr>
                <th scope="col"> Lib_Doc</th>
                <th scope="col"> Copies </th>
                <th scope="col"> Pages </th>
                <th scope="col"> DateEnv </th>  
            </tr>
        </thead>
        <tbody>  
            <tr>
                <th>{{ $item->Lib_Doc }}</th>
                <td>{{ $item->Copies }}</td>
                <td>{{ $item->Pages }}</td>
                <td>{{ $item->dateEnv }}</td>
            </tr>  
        </tbody>
    </table>
    <a class="btn" style="background-color:orange;color:white" href={{Route("home")}}> العودة الى الرئيسة </a>
@endsection
