@component('mail::message')

<p>Gracias por registrarse <strong>{{ $data["name"] }}</strong>, ahora ya puedes iniciar sesión en nuestro sitio web</p>
<hr>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure laudantium nostrum molestiae ea dolorem aperiam iste dolor laboriosam minus impedit aut adipisci cum deleniti quibusdam quia, vel neque! Minima, accusantium.</p>
<hr>
<p>Se creo la cuenta en la fecha: {{ $data["created_at"] }}</p>
<hr>
@component('mail::button', ['url' => env('APP_URL'), 'color' => 'success'])
    Ir al sitio web
@endcomponent

@endcomponent
