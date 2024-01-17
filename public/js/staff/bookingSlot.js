document.addEventListener('DOMContentLoaded', function () {

    var today = new Date().toISOString().split('T')[0];
    const datePicker = document.getElementById('date');
    datePicker.setAttribute('min', today);

    var dateFilter = document.getElementById('filterBookingForm');
    dateFilter.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        // Get existing URL parameters
        var urlParams = new URLSearchParams(window.location.search);

        // Update or append startDate and endDate
        if (startDate) {
            urlParams.set('startDate', startDate);
        } else {
            urlParams.delete('startDate');
        }

        if (endDate) {
            urlParams.set('endDate', endDate);
        } else {
            urlParams.delete('endDate');
        }

        // Get the selected status checkboxes
        var selectedStatus = document.querySelector('input[name="status"]:checked');

        // Update or append status
        if (selectedStatus) {
            urlParams.set('status', selectedStatus.value);
        } else {
            urlParams.delete('status');
        }

        window.location.href = '/staff-booking-slot' + (urlParams.toString() ? '?' + urlParams.toString() : '');
    });

    var searchName = document.getElementById('searchNameForm');
    searchName.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        const nameBooking = document.getElementById('searchNameBooking');
        var urlParams = new URLSearchParams(window.location.search);

        if (nameBooking.value) {
            urlParams.set('name', nameBooking.value);
        } else {
            urlParams.delete('name');
        }

        window.location.href = '/staff-booking-slot' + (urlParams.toString() ? '?' + urlParams.toString() : '');
    });

    var urlParams = new URLSearchParams(window.location.search);
    var startDate = urlParams.get('startDate');
    var endDate = urlParams.get('endDate');
    var name = urlParams.get('name');

    if (startDate) {
        document.getElementById('startDate').value = startDate;
    }

    if (endDate) {
        document.getElementById('endDate').value = endDate;
    }

    if (name) {
        document.getElementById('searchNameBooking').value = name;
    }

    var statusParams = urlParams.get('status');
    if (statusParams) {
        var radioToCheck = document.getElementById('statusRadio' + statusParams);
        if (radioToCheck) {
            radioToCheck.checked = true;
        }
    }
});

function validateForm() {
    var timeStartInput = document.getElementById('time_start');
    var timeEndInput = document.getElementById('time_end');
    var timeStartError = document.getElementById('timeStartError');

    // Get the current date and time
    var now = new Date();
    now.setHours(now.getHours() + 7);
    var currentDateTime = now.toISOString().slice(0, 16);

    // Combine the current date with the selected time
    var selecteDate = document.getElementById('date').value;
    var selectedDateTime = selecteDate + 'T' + timeStartInput.value;
    var selectedDateTimeEnd = selecteDate + 'T' + timeEndInput.value;

    // Check if the selected date and time are not earlier than the current date and time
    if (selectedDateTime < currentDateTime) {
        timeStartError.innerHTML = 'Time must not be earlier than now.';
    } else if (selectedDateTime > selectedDateTimeEnd) {
        timeStartError.innerHTML = 'End time must not be earlier than start time.';
    }
    else {
        // Clear the error message and submit the form
        timeStartError.innerHTML = '';
        document.getElementById('addBookingSlotForm').submit();
    }
}
