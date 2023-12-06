FAQs <br>
@foreach ($faqs as $f)
    Q: {{$f->faq_question}} <br>
    A: {{$f->faq_answer}} <br>
@endforeach
<br>
