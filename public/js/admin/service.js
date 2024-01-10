document.addEventListener('DOMContentLoaded', function () {
    var serviceFilter = document.getElementById('filterServiceForm');
    serviceFilter.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        const serviceId = document.getElementById('serviceList').value;

        var urlParams = new URLSearchParams(window.location.search);

        if (serviceId) {
            urlParams.set('service', serviceId);
        } else {
            urlParams.delete('service');
        }

        var selectedStatus = document.querySelector('input[name="status"]:checked');

        if (selectedStatus) {
            urlParams.set('status', selectedStatus.value);
        } else {
            urlParams.delete('status');
        }

        window.location.href = '/admin-services' + (urlParams.toString() ? '?' + urlParams.toString() : '');
    });

    var searchName = document.getElementById('searchUsersForm');
    searchName.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        const searchUsers = document.getElementById('searchUsers');
        var urlParams = new URLSearchParams(window.location.search);

        if (searchUsers.value) {
            urlParams.set('name', searchUsers.value);
        } else {
            urlParams.delete('name');
        }

        window.location.href = '/admin-services' + (urlParams.toString() ? '?' + urlParams.toString() : '');
    });

    var urlParams = new URLSearchParams(window.location.search);
    var name = urlParams.get('name');

    if (name) {
        document.getElementById('searchUsers').value = name;
    }

    var selectedService = urlParams.get('service');
    if (selectedService) {
        var serviceList = document.getElementById('serviceList');

        for (var i = 0; i < serviceList.options.length; i++) {
            if (serviceList.options[i].value == selectedService) {
                serviceList.options[i].selected = true;
                break;
            }
        }
    }

    var statusParams = urlParams.get('status');
    if (statusParams) {
        var radioToCheck = document.getElementById('statusRadio' + statusParams);
        if (radioToCheck) {
            radioToCheck.checked = true;
        }
    }
});
