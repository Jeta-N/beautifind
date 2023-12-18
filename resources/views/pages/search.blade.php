@extends('layouts.default')

@section('content')
    <div class="container pt-3">
        <div class="w-100 bg-white rounded shadow-sm">
            <div class="row mx-0">
                <div class="col p-0">
                    <div class="search-header border-end" data-bs-toggle="modal" data-bs-target="#sortSearchModal">
                        <i class="bi bi-list me-2"></i>
                        Sort
                    </div>
                </div>
                <div class="col p-0">
                    <div class="search-header border-end" data-bs-toggle="modal" data-bs-target="#typeSearchModal">
                        <i class="bi bi-funnel me-2"></i>
                        Type
                    </div>
                </div>
                <div class="col p-0">
                    <div class="search-header border-end" data-bs-toggle="modal" data-bs-target="#priceSearchModal">
                        <i class="bi bi-cash me-2"></i>
                        Price
                    </div>
                </div>
                <div class="col p-0">
                    <div class="search-header" data-bs-toggle="modal" data-bs-target="#ratingSearchModal">
                        <i class="bi bi-star me-2"></i>
                        Star
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3 p-3 border-0 shadow-sm">
            <div class="row g-0">
                <div class="col-md-3 d-flex justify-content-center">
                    <img src="{{ asset('storage/asset/images/dummy-salon.png') }}" class="w-100" alt="product-image">
                </div>
                <div class="col-md-9 d-flex align-items-stretch">
                    <div class="card-body position-relative d-flex flex-column">
                        <h5 class="card-title"> <strong>Beauty Salon</strong> </h5>
                        <div class="card-text mt-2">
                            <p>Central Jakarta</p>
                        </div>
                        <div class="card-text mt-3">
                            <span class="p-2 border-light-subtle border card-salon-rating rounded">4.2</span>
                            <span><strong>Very Good</strong></span>
                            <span>54 Reviews</span>
                        </div>
                        <div class="card-text mt-3">
                            <i class="bi bi-clock"></i>
                            <span>09:00 - 20:00 WIB</span>
                        </div>
                        <div class="mt-auto">

                            <div class="card-text mt-3">
                                <span class="px-2 bg-success-subtle rounded-pill text-success">Hair Salon</span>
                            </div>
                            <div class="card-text mt-auto mb-0">
                                <hr>
                                <div class="row m-0">
                                    <span class="p-2 border-light-subtle border card-salon-rating rounded"><i
                                            class="bi bi-heart"></i>
                                    </span>
                                    <button class="bg-btn-book text-white col ms-3">
                                        View Service
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="position-absolute card-salon-price">
                            <p class="mb-0 text-end">starting from</p>
                            <h4 class="card-salon-price-text">Rp. 50,000</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('components.sort-search-modal')
    @include('components.rating-search-modal')
    @include('components.price-search-modal')
    @include('components.type-search-modal')
@endsection
