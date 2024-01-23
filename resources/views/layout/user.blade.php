<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... other meta tags and title ... -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container">
            <a class="navbar-brand" href="#"><b>MR.LONG</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><b>Home</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><b>About</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><b>Service</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><b>Contact</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4 vh-100">
        @yield('content')
    </div>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Boulong Website 2024</div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
