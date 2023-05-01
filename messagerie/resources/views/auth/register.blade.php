@extends('layouts.app')

@section('title', 'إنشاء حساب')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">{{ __('إنشاء حساب') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3 mx-5">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('البريد الإلكتروني') }}</label>

                                <div class="col-md-7">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 mx-5">
                                <label for="role"
                                    class="col-md-4 col-form-label text-md-end">{{ __('الوظيفة') }}</label>

                                <div class="col-md-7">
                                    <select class="form-select @error('role') is-invalid @enderror"
                                        aria-label=".form-select-sm" name="role" id="role" required
                                        value="{{ old('role') }}">
                                        <option selected disabled>--</option>
                                        <option value="admin">مدير مؤسسة تعليمية</option>
                                        <option value="employee">موظف مكتب الضبط</option>
                                    </select>

                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 mx-5" style="visibility:hidden;height:0" id="name">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('اسم المؤسسة') }}</label>

                                <div class="col-md-7">
                                    <input type="text" id='nameInput'
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @if (isset($req))
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3 mx-5">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('كلمة المرور') }}</label>

                                <div class="col-md-7">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 mx-5">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('تأكيد كلمة المرور') }}</label>

                                <div class="col-md-7">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __(' حساب جديد ') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const roleSelect = document.querySelector('#role');
        const etabInput = document.querySelector('#name');
        const nameInput = document.querySelector('#nameInput');

        roleSelect.addEventListener('change', function() {
            if (roleSelect.value === 'admin') {
                etabInput.style.visibility = 'visible';
                etabInput.style.height = 'auto';
                nameInput.setAttribute('required', 'required');
                console.log('req');
            } else {
                etabInput.style.visibility = 'hidden';
                etabInput.style.height = '0';
                nameInput.removeAttribute('required');
                console.log('not req');
            }
        });
    </script>
@endsection
