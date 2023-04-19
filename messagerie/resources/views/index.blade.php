@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        Message envoyer 
        @forelse ($i as $item)
            <a href={{Route("show" , $item->id)}}><button > show </button></a>
        @empty
            <h1>not found</h1>
        @endforelse
        <a href={{Route("create")}}><button > create </button></a>

        <a href="{{ route('logout') }}" class="btn btn-primary my-3">logout</a>

    </div>
</div>
@endsection
