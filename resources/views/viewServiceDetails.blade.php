{{$service->service_name}}<br>
{{$service->service_address}}<br>
{{$service->service_description}}<br>
<br>
FAQs <br>
@foreach ($faqs as $f)
    Q: {{$f->faq_question}} <br>
    A: {{$f->faq_answer}} <br>
@endforeach
<br>
Promos<br>
@foreach ($promos as $p)
    {{$p->promo_title}} <br>
    {{$p->promo_description}} <br>
@endforeach
<br>
Portfolio <br>
@foreach ($ports as $po)
    {{$po->portfolio_title}} <br>
    {{$po->image_path}} <br>
@endforeach
