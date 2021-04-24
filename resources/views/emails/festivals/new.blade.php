@component('mail::message')
    # Saudos!

    ## Hay un nuevo festival.

    {{$festival->text}}

    ![Imagen del Festival]({{asset('storage/app/public/festivals/' . $festival->image)}} "Imagen")

    @component('mail::button', ['url' => URL::to('/'), 'color'=>'success'])
        Ver festival
    @endcomponent

    @component('mail::panel')
        This is the panel content.
    @endcomponent

    @component('mail::table')
        | Laravel       | Table         | Example  |
        | ------------- |:-------------:| --------:|
        | Col 2 is      | Centered      | $10      |
        | Col 3 is      | Right-Aligned | $20      |
    @endcomponent

    @component('mail::subcopy')
        This is the subcopy content.
    @endcomponent

    Gracias Totales,<br>
    {{ config('app.name') }}
@endcomponent
