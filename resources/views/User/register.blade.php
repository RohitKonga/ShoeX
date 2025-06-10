<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/loginRegister.css') }}">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <div class="form sign-up-form">
                <h2>Join the ShoeX Club</h2>
                <p>Sign up and walk with the best.</p>

                <form action="{{ route('customers.store') }}" method="POST">
                    @csrf
                    <div class="input-box">
                        <input type="text" name="name" placeholder="Name" value="{{old('name')}}" />
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-box">
                        <input type="email" name="email" placeholder="Email" value="{{old('email')}}"/>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-box">
                        <input type="password" name="password" placeholder="Password" />
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-box">
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" />
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn">Sign Up</button>

                    <p class="switch-form">
                        Already have an account? <a href="{{ route('login') }}"><span id="showSignIn">Sign In</span></a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
