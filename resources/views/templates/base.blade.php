<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="/styles/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/globals.css">
</head>

<body>
    <script src="/scripts/jquery/jquery.min.js"></script>
    @if ($errors->any())
        <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
            <div id="error" class="toast bg-tc-red text-tc-white" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="toast-header bg-tc-red text-tc-white">
                    <strong class="me-auto">Erro</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <x-nav-menu isAuthenticated="{{ session()->has('usuario') ? 1 : 0 }}" />

    @yield('content')

    <script src="/scripts/bootstrap.bundle.min.js"></script>
    <script src="/scripts/jquery/plugins/jquery.mask.min.js"></script>
    @if ($errors->any())
        <script>
            toast = new bootstrap.Toast(document.getElementById('error'));
            toast.show()
        </script>
    @endif
</body>

</html>
