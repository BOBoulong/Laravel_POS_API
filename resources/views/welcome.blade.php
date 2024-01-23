<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384ChfQ5TtxEuXohJOz725oSblbnZ6lPioK9CesIW/M9EahDbceNcRdPqcfptvZb9h4c+yD1sKlionClearwYHnSz30IvMPV9gBm6" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-5 col-6 offset-3 shadow p-3 mb-5 bg-white rounded ">
        <h1 class="text-center fs-2 fw-bold lh-1 mb-4">Login</h1>
        @if (session('status'))
        <div class="alert alert-danger text-center" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form action="/login/auth" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="col-form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus >
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                </div>
                    <div class="mb-3">
                        <label for="password" class="col-form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required >
                    </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                        <a href="/register" class="btn btn-secondary float-end w-100 my-3">Register</a>
        </form>
    </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OG/rl6/9jxkRz" crossorigin="anonymous"></script>

</body>
</html>
