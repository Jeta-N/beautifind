<div class="modal fade" id="addBookingSlotModal" tabindex="-1" aria-labelledby="addBookingSlotModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="addBookingSlotModalHeader">Add Booking Slot</h2>
                    <form method="POST" id="addBookingSlotForm" action="/create-booking-slot">
                        @csrf
                        <div class="mb-3">
                            <label for="emp_name" class="form-label">Employee Name</label>
                            <select class="form-select form-login @error('employee') is-invalid @else  @enderror"
                                aria-label="employee" name="employee" required>
                                <option value="">Select Employee</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->emp_id }}"
                                        @if (old('employee') == $employee->emp_id) selected @endif>
                                        {{ $employee->emp_name }}</option>
                                @endforeach
                            </select>
                            @error('employee')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" name="date" id="date"
                                class="form-control form-login @error('date') is-invalid @else @enderror"
                                placeholder="Input Date" value="{{ old('date') }}" required>
                            @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="time_start" class="form-label">Time Start</label>
                                    <input type="time" name="time_start" id="time_start"
                                        class="form-control form-login @error('time_start') is-invalid  @enderror @error('datetime_start') is-invalid  @enderror"
                                        placeholder="Input Time Start" value="{{ old('time_start') }}" required>
                                    @error('time_start')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="time_end" class="form-label">Time End</label>
                                    <input type="time" name="time_end" id="time_end"
                                        class="form-control form-login @error('time_end') is-invalid  @enderror"
                                        placeholder="Input Time End" value="{{ old('time_end') }}" required>
                                    @error('time_end')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            @error('datetime_start')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="time_end" class="form-label d-flex align-items-center">Repeat for
                                <input type="number" name="repeat" id="repeat"
                                    class="form-control mx-2 w-25 @error('repeat') is-invalid  @enderror"
                                    placeholder="0" value="1" min="1">
                                Weeks
                            </label>
                            @error('repeat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="form-control btn-sign-in py-2">Add
                            Slot</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
