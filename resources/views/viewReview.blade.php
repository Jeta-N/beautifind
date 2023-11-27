Reviews <br>
Rating: {{$rating}} <br>
@foreach ($reviews as $r)
    Review {{$r->review_id}}: {{$r->review_content}} <br>
@endforeach
<br>
