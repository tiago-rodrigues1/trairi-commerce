<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="/styles/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/globals.css">
    
    @yield('extraLinks')
</head>

<body>
    <script src="/scripts/jquery/jquery.min.js"></script>
    @if (session('status'))
        <x-toast type="{{ session('status')['type'] }}">
            <ul class="p-0 m-0">
                {{ session('status')['msg'] }}
            </ul>
        </x-toast>
    @endif

    @if ($errors->any())
        <x-toast type="error">
            <ul class="p-0 m-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-toast>
    @endif

    <x-nav-menu isAuthenticated="{{ session()->has('usuario') ? 1 : 0 }}" />

    @yield('content')

    <script src="/scripts/bootstrap.bundle.min.js"></script>
    <script src="/scripts/jquery/plugins/jquery.mask.min.js"></script>
    @if ($errors->any() || session('status'))
        <script>
            toast = new bootstrap.Toast(document.getElementById('mytoast'));
            toast.show()
        </script>
    @endif
</body>

</html>
