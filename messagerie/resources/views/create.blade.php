@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center p-2 m-2">
    <div class="card p-2 w-50">
        <div class="d-flex justify-content-between">
            <div class="">
                <h3>Envoyer un message </h3>
            </div>
        </div>
        <hr class="my-1">
        <form action={{ Route('store') }} method="post">
            @csrf
            <div class="row">
                <div class="col">
                  <label for="">Lib_Doc</label>
                  <input type="text" name="Lib_Doc" class="form-control" >
                </div>
            </div>
            <div class="row">
                <div class="col">
                  <label for="">Pages</label>
                  <input type="text" name="Pages" class="form-control" >
                </div>
            </div>
            <div class="row">
                <div class="col">
                  <label for="">Copies </label>
                  <input type="text" name="Copies" class="form-control" >
                </div>
            </div>
            <div class="my-2">
                <button type="submit" class="btn btn-success w-100">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection 