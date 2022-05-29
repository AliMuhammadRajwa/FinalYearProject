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

                                <form class="mt-5 mb-5" method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}" placeholder="Name" required autocomplete="name"
                                               autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" required
                                               autocomplete="email" placeholder="Email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="new-password"
                                               placeholder="Password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password"
                                               placeholder="Confirm Password">
                                    </div>

                                    <div class="form-group">
                                        <select id="select-status" class="form-control" name="register_status" required >
                                            <option selected>-- Select Status--</option>
                                            <option value="1">Hotel</option>
                                            <option value="2">Rent Car</option>
                                            <option value="3">Transportation</option>
                                            <option value="4">Mechanic</option>
                                        </select>
                                    </div>
                                    <br>

                                    <button type="submit" class="btn login-form__btn submit w-100">
                                        {{ __('Register') }}
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
