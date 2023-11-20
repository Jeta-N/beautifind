Booking Slot Service <br>
@foreach ($booking_slots as $bs)
    {{$bs->bs_id}}//{{$bs->employee->emp_name}}//{{$bs->date}}<br>
@endforeach
