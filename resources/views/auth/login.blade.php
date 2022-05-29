@extends('layouts.app')

@section('content')

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <div class="row">
                                    <div class="col-4 mx-auto text-center">
                                        <a href="index.html"> <img src="{{asset('img/logo1.png')}}"
                                                                   class="img-responsive thumbnail"></a>
                                    </div>
                                </div>

                                {{--                                login-input--}}
                                <form method="POST" class="mt-5 mb-5" action="{{route('login')}}">
                                    @csrf

                                    <div class="form-group">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               placeholder="Email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password"
                                               placeholder="Password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <button type="submit" class=" btn login-form__btn submit w-100">
                                        {{ __('Login') }}
                                    </button>

                                    <div class="text-center">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>

                                        @endif
                                    </div>
                                </form>

{{--                                <form method="get" class="mt-5 mb-5" action="{{ route('register.hotel') }}">--}}
{{--                                    <button type="submit" class=" btn login-form__btn submit w-200"> Hotel Register--}}
{{--                                    </button>--}}
{{--                                </form>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
