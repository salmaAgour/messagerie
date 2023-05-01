@extends('layouts.app')

@section('title', 'المراسلات الادارية لإقليم تزنيت')

@section('content')
    @if (Route::has('login'))
        <div>
            <h3>
                منظومة معلوماتية متكاملة تمكن من إرساء طرق عمل جديدة لتدبير المراسلات الادارية على صعيد المؤسسات
                التعليمية
            </h3>
            <div class="nav">
                @auth
                    @if (auth()->user()->role == 'admin')
                        <a href="{{ url('/admin/dashboard') }}" class="btn btn-primary"> الرئيسية </a>
                    @else
                    <a href="{{ url('/employee/dashboard') }}" class="btn btn-primary"> الرئيسية </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary my-3"> تسجيل الدخول </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"class="btn btn-primary"> إنشاء حساب </a>
                    @endif
                @endauth
            </div>
        </div>
    @endif
    </div>
@endsection
