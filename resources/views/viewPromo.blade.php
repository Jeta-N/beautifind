Promos<br>
@foreach ($promos as $p)
    {{$p->promo_title}} <br>
    {{$p->promo_description}} <br>
@endforeach
