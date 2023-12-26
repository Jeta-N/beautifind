@extends('layouts.default')

@section('content')
    <div class="container d-flex justify-content-center align-content-center py-3">
        <form action="/create-review/{{ $booking->booking_id }}" class="d-flex flex-column align-items-start w-50"
            method="POST">
            @csrf
            <h3 class="text-center">Leave a Review</h3>
            <p>Service: {{ $booking->service->service_name }}</p>
            <p>Service Type: {{ $booking->serviceType->st_name }}</p>
            <p>Talent: {{ $booking->bookingSlot->employee->emp_name }}</p>
            <p>Date: {{ \Carbon\Carbon::parse($booking->updated_at)->format('j F Y') }}</p>
            <p>Time: {{ substr($booking->bookingSlot->time_start, 0, 5) }} WIB -
                {{ substr($booking->bookingSlot->time_end, 0, 5) }} WIB</p>
            <p>Total Price: Rp.{{ number_format($booking->price, 0, ',') }}</p>
            <div class="mb-3 row w-50">
                <label for="rating" class="col-sm-2 col-form-label">Rating</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="rating" name="rating" step="0.1" max="5"
                        placeholder="0.0 - 5.0" min="0">
                </div>
            </div>
            <div class="mb-3 w-50">
                <label for="review" class="form-label">Review</label>
                <textarea class="form-control" id="review" rows="3" name="review"></textarea>
            </div>
            <div class="w-100 text-end">
                <button class="profile-save-btn filter-btn" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
