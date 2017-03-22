@extends('layouts.app')

@section('content')
    <main class="row">
        <div class="constrain column">
            <h2>Login</h2>
            <form class="form" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form__group">
                    <label for="email" class="">E-Mail Address</label>

                    <div class="form__input">
                        <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form__group">
                    <label for="password" class="">Password</label>

                    <div class="form__input">
                        <input id="password" type="password" class="" name="password" required>

                        @if ($errors->has('password'))
                            <span class="">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form__group">
                    <div class="">
                        <div class="form__input">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="form__checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__input">
                        <button type="submit" class="">
                            Login
                        </button>

                        <a class="" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
            </form>

        </main>

        </div>
@endsection
