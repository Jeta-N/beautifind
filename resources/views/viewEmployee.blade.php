Employees <br>
@foreach ($employees as $e)
    {{$e->emp_id}}//{{$e->emp_name}}//{{$e->service->service_name}}<br>
@endforeach
