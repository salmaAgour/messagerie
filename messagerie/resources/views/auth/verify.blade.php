@extends('layouts.app')

@section('title',' تأكيد البريد الإلكتروني ')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' تأكيد البريد الالكتروني ') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __(' تم إرسال رابط التحقق إلى بريدك الإلكتروني . ') }}
                        </div>
                    @endif

                    {{ __(' قبل المتابعة , المرجو التحقق من بريدك الإلكتروني ') }}
                    {{ __(' إن لم تتوصل بالبريد الإلكتروني ') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __(' إضغط هنا لاقتراح كلمة جديدة ') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
