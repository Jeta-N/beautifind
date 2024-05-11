@extends('layouts.default')

@section('content')
    <div class="container d-flex justify-content-center align-content-center flex-column py-3">
        <h2 class="text-center pt-0 pb-2">Write a Review</h2>
        <div class="card-body position-relative d-flex flex-column border rounded p-4 w-75 align-self-center">
            <div class="d-flex flex-row">
                <div class="logo-container-my-order me-3">
                    <img src="{{ asset('storage/asset/images/services/logo/' . $booking->service->logo_image_path) }}"
                        alt="" class="rounded-circle logo-my-order">
                </div>
                <div class="d-flex flex-column justify-content-center me-3">
                    <h5 class="card-title"> <strong>{{ $booking->service->service_name }}</strong> </h5>
                    <div class="card-text">
                        <p class="mb-0 text-secondary">{{ $booking->service->city->city_name }}</p>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col border-end">
                    <div class="card-text">
                        <p class="mb-1">{{ $booking->serviceType->st_name }} By
                            {{ $booking->bookingSlot->employee->emp_name }}</p>
                        <p class="mb-0">{{ \Carbon\Carbon::parse($booking->bookingSlot->date)->format('j F Y') }}</p>
                        <p class="mb-0">{{ substr($booking->bookingSlot->time_start, 0, 5) }} WIB -
                            {{ substr($booking->bookingSlot->time_end, 0, 5) }} WIB</p>
                    </div>
                </div>
                <div class="col d-flex align-items-center">
                    <div class="card-text">
                        <p class="mb-1">Total Harga</p>
                        <span><strong>Rp.{{ number_format($booking->price, 0, ',') }}</strong></span>
                    </div>
                </div>
            </div>
            <form action="/create-review/{{ $booking->booking_id }}"
                class="d-flex flex-column align-items-start mt-3 border-top " method="POST">
                @csrf
                <div class="mb-3">
                    <label for="rating" class="col-form-label">Give your rating for this booking</label>
                    <div>
                        <input type="number" class="form-control @error('rating') is-invalid  @enderror" id="rating"
                            name="rating" step="0.1" max="5" placeholder="0.0 - 5.0" min="0">
                    </div>
                    @error('rating')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 w-100">
                    <label for="review" class="form-label">Write a Review</label>
                    <textarea class="form-control @error('review') is-invalid  @enderror" id="review" rows="3" name="review"></textarea>
                    @error('review')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="w-100 text-end">
                    <a href="/profile?activeTab=myOrder" class="profile-save-btn filter-btn text-decoration-none">Cancel</a>
                    <button class="profile-save-btn filter-btn" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
