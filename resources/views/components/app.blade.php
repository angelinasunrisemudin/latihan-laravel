<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Angelina Sunrise Mudin</title>

    <!-- KOREKSI: Mengganti kode integrity dengan yang resmi dan valid untuk Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/3.1.5/css/dataTables.bootstrap5.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">UNITAMA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{ route('student.index') }}">Student</a>
                    <a class="nav-link" href="{{ route('department.index') }}">Department</a>
                    <a class="nav-link" href="{{ route('lecturer.index') }}">Lecture</a>
                </div>
            </div>
        </div>
    </nav>

    {{--  page title --}}
    <div class="bg-primary py-5 text-center text-white">
        <h1 class="fw-bold">{{ $title }}</h1>
    </div>

    {{-- main app --}}
    <div class="container my-5">
        {{ $slot }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YywJrWvCXK/BmnVDxM+D2scQBiTXI" crossorigin="anonymous">
    </script>

    <script src="https://cdn.datatables.net/3.1.5/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/3.1.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        new DataTable('#example');

        $('#upload').on('change', function(event) {
            $('#preview').attr('src', URL.createObjectURL(event.target.files[0]))
        })
    </script>
</body>

</html>
