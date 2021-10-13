<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inconcerto, notificación!</title>

</head>
<body>

    <h2>¡Hay un nuevo festival!</h2>
    @component('mail::panel')
        <h1>{{$festival->name}}</h1>
    @endcomponent

    <div class="container">
        @yield('content')

        @component('mail::message')
            <img src='https://res.cloudinary.com/inconcerto/image/upload/{{$festival->image}}' alt="festival">
            <b>Descripción:</b> {{$festival->description}}
            @component('mail::button', ['url' => URL::to('http://inconcerto.vercel.app/festivales/'.$festival->id), 'color'=>'success'])
                Ver festival
            @endcomponent
        @endcomponent
    </div>

{{--
    <div>
        --}}
{{--<img src="{{ asset('https://res.cloudinary.com/inconcerto/image/upload/v1634065479/lcjtxz0bdbwcvz4ucxzw.png') }}" alt="festival">--}}{{--

        --}}
{{--<img src="{{ URL::to('https://res.cloudinary.com/inconcerto/image/upload/v1634065479/lcjtxz0bdbwcvz4ucxzw.png') }}">--}}{{--

        <img src='https://res.cloudinary.com/inconcerto/image/upload/{{$festival->image}}' alt="festival">
        <div>
            <p>Descripción: {{$festival->description}}</p>
        </div>
    </div>
--}}

        {{--<a href="http://inconcerto.vercel.app/festivales/{{$festival->id}}" class="btn btn-primary">Ver el festival</a>--}}

</body>
</html>
