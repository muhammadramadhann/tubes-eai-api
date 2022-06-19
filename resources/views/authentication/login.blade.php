<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

        <title>Login - EasyGo EAI</title>

    </head>
    <body class="d-flex flex-column min-vh-100 bg-auth">
        <div class="container my-8 py-md-5">
            <div class="card auth mx-auto my-auto p-3 shadow-sm">
                <div class="card-body">
               <img src=" {{asset('assets/img/logo.png')}}" alt="" width="140" height="50" class="d-inline-block align-text-top" style="margin-left:-20px; margin-bottom:20px">
                    <h4 class="fw-bold" style="color: #AE431E;">Login</h4>
                    <p class="mb-4" style="color: #DEA057;">Untuk dapat mengakses projek silahkan masuk menggunakan akun yang sudah terdaftar.</p>
                    <form action="{{ Route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label" style="color: #AE431E; ">Email</label>
                            <input type="email" class="form-control" style="background-color: #FCFFE7; border: 1px solid #DEA057;" id="email" name="email" placeholder="Masukkan email" autofocus value="{{ old('email') }}">
                            @if (session('auth-failed'))
                                <div class="text-danger mt-2">
                                    {{ session('auth-failed') }}
                                </div>
                            @endif
                            @error('email')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label" style="color:#AE431E;">Password</label>
                            <input type="password" class="form-control" style="background-color: #FCFFE7; border: 1px solid #DEA057;"  id="password" name="password" placeholder="Masukkan password" value="{{ old('password') }}">
                            <i class="fa-solid fa-eye-slash" id="togglePassword" onclick="togglePassword()"></i>
                            @if (session('auth-failed'))
                                <div class="text-danger mt-2">
                                    {{ session('auth-failed') }}
                                </div>
                            @endif
                            @error('password')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="float-start">
                            <div class="form-check mb-4">
                                <input class="form-check-input" style="background-color: #AE431E; border: 1px solid #DEA057; " type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember" style="color: #DEA057;">Remember Me</label>
                            </div>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-warning w-100 py-2 fw-bold rounded" style="background-color:#AE431E; color: #FCFFE7">Login</button>
                        </div>
                        <p class="text-center mb-0">Need access to this project?
                            <a href="" class="text-decoration-none hover-none" style="color:#AE431E">Contact us</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/TogglePassword.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>