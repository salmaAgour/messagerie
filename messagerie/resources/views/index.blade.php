@extends('layouts.employeeLayout')

@section('content')
    <br />
    <h1> نتائج البحث </h1>
    <br/>
    <form action={{Route('search')}} method="POST">
        @csrf
        <input type="text" name='NumEnv' placeholder="entre numero d'envoi">
        <button type="submit"> search</button>
    </form>
    <table class="table text-center table-hover">
        <thead class=" table-secondary">
            <tr>
                <th scope="col"> Lib_Doc</th>
                <th scope="col"> Copies </th>
                <th scope="col"> Pages </th>
                <th scope="col"> Lib_Serv </th>
                <th scope="col"> DateEnv </th>  
            </tr>
        </thead>
        <tbody>
            @forelse ($i as $item)
                <tr>
                <th>{{ $item->Lib_Doc }}</th>
                <td>{{ $item->Copies }}</td>
                <td>{{ $item->Pages }}</td>
                <td>{{ $item->Lib_Serv }}</td>
                <td>{{ $item->dateEnv }}</td>
            </tr>  
            @empty
                <h1>No data</h1>
            @endforelse  
            
        </tbody>
    </table>
    <a class="btn" style="background-color:orange;color:white" href={{Route("home")}}> العودة الى الرئيسة </a>
@endsection