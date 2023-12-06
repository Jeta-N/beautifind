Portfolio <br>
@foreach ($ports as $po)
    {{$po->portfolio_title}} <br>
    {{$po->image_path}} <br>
@endforeach
