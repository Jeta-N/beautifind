document.addEventListener('DOMContentLoaded', function () {
    var typeFilter = document.getElementById('typeFilter');

    // Event listener for form submission
    typeFilter.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Get the current URL and existing parameters
        var currentURL = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);

        // Remove existing 'type[]' parameter
        urlParams.delete('type[]');

        // Get checked checkboxes and add them to the URLSearchParams
        var formData = new FormData(typeFilter);
        formData.getAll('type[]').forEach(function (value) {
            urlParams.append('type[]', value);
        });

        // Construct the URL with updated parameters
        var url = currentURL.split('?')[0] + '?' + urlParams.toString();

        // Redirect to the constructed URL
        window.location.href = url;
    });

    var sortService = document.getElementById('sortService');
    sortService.addEventListener('submit', function (event) {
        event.preventDefault();

        // Get the current URL and existing parameters
        var currentURL = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);

        // Remove existing 'type[]' parameter
        urlParams.delete('sort-by');

        // Get checked checkboxes and add them to the URLSearchParams
        var formData = new FormData(sortService);
        formData.getAll('sort-by').forEach(function (value) {
            urlParams.append('sort-by', value);
        });

        // Construct the URL with updated parameters
        var url = currentURL.split('?')[0] + '?' + urlParams.toString();

        // Redirect to the constructed URL
        window.location.href = url;
    });

    var ratingFilter = document.getElementById('ratingFilter');
    ratingFilter.addEventListener('submit', function (event) {
        event.preventDefault();

        // Get the current URL and existing parameters
        var currentURL = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);

        // Remove existing 'type[]' parameter
        urlParams.delete('rating[]');

        // Get checked checkboxes and add them to the URLSearchParams
        var formData = new FormData(ratingFilter);
        formData.getAll('rating[]').forEach(function (value) {
            urlParams.append('rating[]', value);
        });

        // Construct the URL with updated parameters
        var url = currentURL.split('?')[0] + '?' + urlParams.toString();

        // Redirect to the constructed URL
        window.location.href = url;
    });

    // Usage example
    typeFilter.addEventListener('submit', function (event) {
        handleFormSubmission(event, this);
    });
    sortService.addEventListener('submit', function (event) {
        handleFormSubmission(event, this);
    });

    ratingFilter.addEventListener('submit', function (event) {
        handleFormSubmission(event, this);
    });

    var urlParams = new URLSearchParams(window.location.search);
    var typeParams = urlParams.getAll('type[]');

    if (typeParams.length > 0) {
        var checkboxes = document.querySelectorAll('input[name="type[]"]');
        checkboxes.forEach(function (checkbox) {
            if (typeParams.includes(checkbox.value)) {
                checkbox.checked = true;
            }
        });
    }

    var ratingParams = urlParams.getAll('rating[]');
    if (ratingParams.length > 0) {
        var checkboxes = document.querySelectorAll('input[name="rating[]"]');
        checkboxes.forEach(function (checkbox) {
            if (ratingParams.includes(checkbox.value)) {
                checkbox.checked = true;
            }
        });
    }

    var sortParams = urlParams.get('sort-by');
    if (sortParams) {
        var sortSelect = document.querySelectorAll('input[name="sort-by"]');
        sortSelect.forEach(function (radio) {
            if (radio.value == sortParams) {
                radio.checked = true;
            }
        })
    }
});


