<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Gestão - @yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    @include('site.layouts._partials.topo')
    @yield('conteudo')
    @include('site.layouts._partials.rodape')
</body>
</html>