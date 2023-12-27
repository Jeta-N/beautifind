<div class="modal fade" id="bookModal{{ $employeeServiceType->est_id }}" tabindex="-1" aria-labelledby="bookModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="bookModalHeader" class="py-3">Let's Book Your Spot</h2>
                    <form action="/book/{{ $serviceType->st_id }}" method="POST"
                        id="bookForm{{ $employeeServiceType->est_id }}" onsubmit="submitBookForm()">
                        @csrf
                        <div class="mb-3">
                            <label for="bookDate" class="form-label">Select Date</label>
                            <input type="date" class="form-control" id="bookDate{{ $employeeServiceType->est_id }}"
                                name="bookDate"
                                onchange="fetchTimeSlots({{ $employeeServiceType->employee->service_id }}, {{ $employeeServiceType->emp_id }}, {{ $employeeServiceType->est_id }})">
                        </div>
                        <hr>

                        <div class="mb-3">
                            <div class="form-label">Time</div>
                            <div id="bookTime{{ $employeeServiceType->est_id }}">

                            </div>
                        </div>

                        <div class="mb-3 bg-secondary-subtle rounded">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col">
                                        <p>{{ $serviceType->st_name }}</p>
                                    </div>
                                    <div class="col text-end">
                                        Rp.{{ number_format($employeeServiceType->price, 0, ',') }} <br>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <span>{{ $employeeServiceType->employee->emp_name }}</span>
                                    </div>
                                    <div class="col text-end">
                                        <span id="dateTimeInfo{{ $employeeServiceType->est_id }}">Pick your date <br>
                                            and time</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <p class="mb-0">Total: Rp.{{ number_format($employeeServiceType->price, 0, ',') }}</p>
                            <p>
                                @foreach ($services->serviceServiceType as $serviceDuration)
                                    @if ($serviceDuration->st_id == $serviceType->st_id)
                                        {{ $serviceDuration->duration }}
                                    @break
                                @endif
                            @endforeach Min
                        </p>
                        <div class="row justify-content-around">
                            <button class="col-5 confirmation-book-btn-cancel" data-bs-dismiss="modal"
                                aria-label="Close" type="button">Cancel</button>
                            <button class="col-5 confirmation-book-btn-book" data-bs-toggle="modal" disabled
                                id="continueBookBtn{{ $employeeServiceType->est_id }}"
                                data-bs-target="#successBookModal" type="submit">Book Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
