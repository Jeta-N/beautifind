Services <br>
@foreach ($services as $s)
    {{$s->service_id}}//{{$s->service_name}}//
    @if ($s->rating != null)
        {{$s->rating}}
    @else
        N/A
    @endif
    @foreach ($s->serviceServiceType as $sst)
        //{{$sst->serviceType->st_name}}
    @endforeach
    @foreach ($s->servicePriceRange as $spr)
        //{{$spr->priceRange->pr_name}}
    @endforeach
    <br>
@endforeach
