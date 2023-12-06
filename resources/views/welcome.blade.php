Recommendation System <br><br>
@foreach ($rec_services as $rs)
    {{$rs->service_id}} <br>
    {{$rs->service_name}}<br>
    ================================================================<br>
@endforeach

<br>--------------------------------------------------------------------------------------------------------------------------------<br>
According to service type <br><br>
@foreach ($services as $s)
    {{$s->service_id}} <br>
    {{$s->service_name}}<br>
    ================================================================<br>
@endforeach
