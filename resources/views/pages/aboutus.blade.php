@extends('layouts.default')

@section('content')
    <div class="container text-center d-flex flex-column align-items-center">
        <h3 class="pt-3">About</h3>
        <p class="fs-1">BeautiFind</p>
        <img src="{{ asset('storage/asset/images/about-1.png') }}" alt="" class="w-50 mb-3">
        <p class="w-50">Your Beauty Revolution Starts Here! Say goodbye to website hopping – our one-stop
            platform
            simplifies beauty
            bookings. Explore salons and clinics effortlessly in our user-friendly app. Elevate your beauty experience with
            BeautiFind!</p>
        <img src="{{ asset('storage/asset/images/about-2.png') }}" alt="" class="w-50 mb-3">
        <h4 class="py-2">Why Choose BeautiFind?</h4>
        <p class="w-50 mb-5">
            Experience hassle-free beauty bookings with BeautiFind's streamlined platform. Our intuitive web application
            lets you effortlessly browse, compare, and book appointments with a diverse array of beauty professionals,
            salons, and clinics, covering everything from hair styling to rejuvenating spa treatments. Say goodbye to the
            inconvenience of navigating multiple websites – BeautiFind centralizes information, offering a comprehensive
            overview of services, prices, and verified customer reviews, empowering you to make informed choices. Our
            user-friendly interface ensures a seamless experience, whether you're booking from your computer or on the go
            with your mobile device. With verified reviews and secure transactions, BeautiFind prioritizes your confidence
            and peace of mind in every beauty booking adventure.
        </p>
    </div>
@endsection
