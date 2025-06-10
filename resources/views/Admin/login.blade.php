<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in!!!</title>
    <link rel="stylesheet" href="{{ asset('css/loginRegister.css') }}">
</head>

<body>
    <!-- Sign In / Sign Up Form -->
    <div class="container">
        <div class="form-container">

            <!-- Sign In Form -->
            <div class="form sign-in-form">
                <h2>Welcome Back</h2>

                <form action="{{ route('admin.adminLogin') }}" method="POST">
                    @csrf
                    <div class="input-box">
                        <input type="email" name="email" placeholder="Email" />
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

                    <button type="submit" class="btn">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
