<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Invillia - Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <style></style>
</head>
<body>
<div class="container-login">
    <div id="login-page">
        <form action="{{route('auth')}}" method="POST" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-12">
                    <label for="email">Username</label>
                    <input type="text" name="email" id="email" class="form-control" required>

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12">
                    <div class="errors">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
