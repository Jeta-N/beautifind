{{$title}} <br>
@foreach ($bookings as $b)
    {{$b->booking_id}}//{{$b->user->user_name}}//{{$b->serviceType->st_name}}//{{$b->booking_status}}<br>
@endforeach
