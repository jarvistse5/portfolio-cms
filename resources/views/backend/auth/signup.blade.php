@extends('backend.auth.base')

@section('content')
    <div class="login-page">
        <div class="wrapper">
            <h2>Sign up</h2>
            <form action="{{route('cms.auth.signup.index')}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="form-field">
                        <label for="name">User Name: </label>
                        <input type="text"
                            placeholder="User Name"
                            name="name"
                            id="name"
                            class="@error('name') is-invalid @enderror">
                    </div>
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

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
                        type="submit">Sign up</button>
                </div>
            </form>
            <div class="divider"></div>
            <div>Already a member?</div>
            <div>
                <a href="{{route('cms.auth.login.index')}}"
                    class="href-text">
                    Login here
                </a>
            </div>
        </div>
    </div>
@endsection