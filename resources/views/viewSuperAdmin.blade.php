Super Admins <br>
@foreach ($admins as $a)
    {{$a->sa_id}} {{$a->sa_name}} {{$a->service->service_name}}<br>
@endforeach
<br>
