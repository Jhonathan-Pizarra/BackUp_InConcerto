<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inconcerto, notificación!</title>

</head>
<body>

<h2>¡Renueva tu contraseña!</h2>
@component('mail::panel')
    <h1>Asistente de recuperación de contraseña</h1>
@endcomponent

<div class="container">
    @yield('content')

    @component('mail::message')
        <img src='https://res.cloudinary.com/inconcerto/image/upload/v1634599697/logo_brd4dj.png' alt="logotipo">
        <b>Querido usuario:</b> Para recuperar tu contraseña, por favor da clic en el siguiente botón:
        @component('mail::button', ['url' => URL::to("https://inconcerto.vercel.app/restablecer-clave/{$token}"), 'color'=>'success'])
        {{--'mail::button', ['url' => URL::to("http://localhost:3000/restablecer-clave/{$token}"), 'color'=>'success']--}}
            Recuperar
        @endcomponent
    @endcomponent
</div>

<p>O puedes seguir el siguiente enlace:</p>
<a href="https://inconcerto.vercel.app/restablecer-clave/{{$token}}">http://localhost:3000/restablecer-clave/{{$token}}</a>
{{--<a href="http://localhost:3000/restablecer-clave/{{$token}}">http://localhost:3000/restablecer-clave/{{$token}}</a>--}}

</body>
</html>
