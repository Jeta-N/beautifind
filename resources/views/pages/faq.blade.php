@extends('layouts.default')

@section('content')
    <div class="bg-faq">
        <div class="container">
            <h2 class="text-center py-4">Frequently Asked Question</h2>
            <div class="py-2 d-flex flex-column align-items-center">
                <div class="border rounded bg-white d-flex flex-row align-items-center w-50 px-3 py-1 mb-3">
                    <img src="{{ asset('storage/asset/icon/faq-bullet.png') }}" alt="">
                    <p class="mb-0 fs-5">What is BeautiFind?</p>
                </div>
                <p class="w-50 px-4 text-justify">BeautiFind is a revolutionary online platform dedicated to simplifying
                    beauty
                    bookings. It serves as a one-stop destination for users to discover, compare, and book appointments with
                    various beauty professionals, salons,
                    and clinics through a user-friendly web application.</p>
            </div>
            <div class="py-2 d-flex flex-column align-items-center">
                <div class="border rounded bg-white d-flex flex-row align-items-center w-50 px-3 py-1 mb-3">
                    <img src="{{ asset('storage/asset/icon/faq-bullet.png') }}" alt="">
                    <p class="mb-0 fs-5">How does BeautiFind work?</p>
                </div>
                <p class="w-50 px-4 text-justify">Using BeautiFind is easy! Simply visit our web application, browse through
                    a diverse array of beauty service providers, compare offerings, and book appointments seamlessly. The
                    platform streamlines the process, eliminating the need to navigate multiple websites.</p>
            </div>
            <div class="py-2 d-flex flex-column align-items-center">
                <div class="border rounded bg-white d-flex flex-row align-items-center w-50 px-3 py-1 mb-3">
                    <img src="{{ asset('storage/asset/icon/faq-bullet.png') }}" alt="">
                    <p class="mb-0 fs-5">What types of beauty services can I find on BeautiFind?</p>
                </div>
                <p class="w-50 px-4 text-justify">BeautiFind offers a comprehensive range of beauty services, including hair
                    styling, spa treatments, manicures, pedicures, makeup, and more. Our platform caters to a diverse set of
                    beauty needs.</p>
            </div>
            <div class="py-2 d-flex flex-column align-items-center">
                <div class="border rounded bg-white d-flex flex-row align-items-center w-50 px-3 py-1 mb-3">
                    <img src="{{ asset('storage/asset/icon/faq-bullet.png') }}" alt="">
                    <p class="mb-0 fs-5">How can I trust the reviews on BeautiFind?</p>
                </div>
                <p class="w-50 px-4 text-justify">We prioritize authenticity. Our platform verifies customer reviews to
                    ensure that you receive genuine insights into the quality of services offered by our listed beauty
                    professionals.</p>
            </div>
            <div class="py-2 d-flex flex-column align-items-center">
                <div class="border rounded bg-white d-flex flex-row align-items-center w-50 px-3 py-1 mb-3">
                    <img src="{{ asset('storage/asset/icon/faq-bullet.png') }}" alt="">
                    <p class="mb-0 fs-5">Is my personal information safe on BeautiFind?</p>
                </div>
                <p class="w-50 px-4 text-justify">Yes, your security is our priority. BeautiFind employs robust measures to
                    ensure the safety and security of your personal information and online transactions.</p>
            </div>
            <div class="py-2 d-flex flex-column align-items-center">
                <div class="border rounded bg-white d-flex flex-row align-items-center w-50 px-3 py-1 mb-3">
                    <img src="{{ asset('storage/asset/icon/faq-bullet.png') }}" alt="">
                    <p class="mb-0 fs-5">Can I book appointments for multiple services in one session?</p>
                </div>
                <p class="w-50 px-4 text-justify">At the moment, BeautiFind supports booking for one service at a time
                    within a session. To book multiple services, you may need to complete separate transactions. We are
                    continually working to enhance our platform, and your feedback is invaluable as we consider future
                    improvements to offer a more comprehensive booking experience.</p>
            </div>
        </div>
    </div>
@endsection
