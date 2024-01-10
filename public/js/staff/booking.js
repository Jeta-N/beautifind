document.addEventListener('DOMContentLoaded', function () {
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
        var statusCheckboxes = document.querySelectorAll('input[name="status[]"]:checked');
        var selectedStatus = Array.from(statusCheckboxes)
            .map(checkbox => checkbox.value);

        // Update or append status
        if (selectedStatus.length > 0) {
            urlParams.set('status', selectedStatus.join(','));
        } else {
            urlParams.delete('status');
        }

        window.location.href = '/staff-booking' + (urlParams.toString() ? '?' + urlParams.toString() : '');
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

        window.location.href = '/staff-booking' + (urlParams.toString() ? '?' + urlParams.toString() : '');
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
        var statusArray = statusParams.split(',');
        statusArray.forEach(function (status) {
            console.log('statusCheckbox' + status.charAt(0).toUpperCase() + status.slice(1));
            var checkbox = document.getElementById('statusCheckbox' + status.charAt(0).toUpperCase() + status.slice(1));
            if (checkbox) {
                checkbox.checked = true;
            }
        });
    }
});
