@extends('layouts.staff.default')

@section('content')
    <div class="container pt-4">
        <h1>View Review</h1>
        <div class="row pt-4">
            @foreach ($reviews as $review)
                <div class="col-3 d-flex align-items-stretch flex-column mb-3">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <div>
                                <h5 class="card-title mb-0">{{ $review->user->user_name }}</h5>
                                <span
                                    class="ms-auto">{{ \Carbon\Carbon::parse($review->created_at)->format('j F Y H:i') }}</span>
                            </div>
                            <p>
                                @for ($i = 1; $i <= 5; $i++)
                                    @if (4.5 < $i)
                                        @if (is_float(4.5) && round(4.5) == $i)
                                            <i class="bi bi-star-half"></i>
                                        @else
                                            <i class="bi bi-star"></i>
                                        @endif
                                    @else
                                        <i class="bi bi-star-fill"></i>
                                    @endif
                                @endfor
                                4.5
                            </p>
                            <p class="card-text mb-0"><strong>Employee:</strong>
                                {{ $review->booking->bookingSlot->employee->emp_name }}</p>
                            <p class="card-text"><strong>Service Type:</strong> {{ $review->booking->serviceType->st_name }}
                            </p>
                            <p class="card-text">{{ $review->review_content }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
