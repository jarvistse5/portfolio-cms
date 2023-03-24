@extends('backend.auth.base')

@section('content')
    <div class="login-page">
        <div class="wrapper">
            <h2>Login</h2>
            <form action="{{route('cms.auth.login.index')}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="form-field">
                        <label for="email">Email: </label>
                        <input type="text"
                            placeholder="Email"
                            name="email"
                            id="email"
                            class="@error('email') is-invalid @enderror">
                    </div>
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <div class="form-field">
                        <label for="password">Password: </label>
                        <input type="password"
                            placeholder="Password"
                            name="password"
                            id="password"
                            class="@error('password') is-invalid @enderror">
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-primary"
                        type="submit">Login</button>
                </div>
            </form>
            <div class="divider"></div>
            <div>Not a member?</div>
            <div>
                <a href="{{route('cms.auth.signup.index')}}"
                    class="href-text">
                    Sign up here
                </a>
            </div>
        </div>
    </div>
@endsection