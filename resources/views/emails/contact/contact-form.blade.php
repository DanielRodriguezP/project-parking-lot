@component('mail::message')
<h1>Gracias por su mensaje!</h1>
<hr>
<strong>Numero de ticket: </strong> {{ $data["contactId"] }} <br><hr>
<strong>Nombre: </strong> {{ $data["contactName"] }} <br><hr>
<strong>Apellido: </strong> {{ $data["contactLastName"] }} <br><hr>
<strong>Email: </strong> {{ $data["contactEmail"] }} <br><hr>
<strong>Descripción: </strong> {{ $data["contactDescription"] }}

@endcomponent
