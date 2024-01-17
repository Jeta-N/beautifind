document.addEventListener('DOMContentLoaded', function () {
    function getQueryParam(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }
    // Get the 'activeTab' parameter from the URL
    const activeTab = getQueryParam('activeTab');

    if (activeTab === 'myOrder') {
        toggleActiveTab('myOrder');
        myOrder.classList.add('bg-secondary-subtle');
    } else if (activeTab === 'editPreferences') {
        toggleActiveTab('editPreferences');
        editPreferences.classList.add('bg-secondary-subtle');
    } else {
        // Default to making the "Personal Data" tab active
        toggleActiveTab('personalData');
        personalData.classList.add('bg-secondary-subtle');
    }

    generateDateOptions();
    getOrderData('All');

    const cancelModal = document.getElementById('cancelBookModal');
    cancelModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const bookingId = button.dataset.bookingId;

        // Update any relevant elements in the modal using bookingId
        const form = document.getElementById('cancelForm');
        form.action = '/cancel-book/' + bookingId;
        // ... other updates
    });
});

function generateDateOptions() {
    const dateSelect = document.getElementById("dateProfile");
    const defaultDate = dateSelect.dataset.defaultDate;
    const defaultDay = defaultDate.split("-")[2];

    dateSelect.innerHTML = `<option value="">Date</option>`; // Clear existing options
    for (let i = 1; i <= 31; i++) {
        const option = document.createElement("option");
        option.value = i;
        option.text = i;
        if (i == defaultDay) {
            option.selected = true;
        }
        dateSelect.add(option);
    }

    const yearSelect = document.getElementById("yearProfile");
    const defaultYear = defaultDate.split("-")[0];
    yearSelect.innerHTML = `<option value="">Year</option>`; // Clear existing options
    for (let i = 2021; i > 1921; i--) {
        const option = document.createElement("option");
        option.value = i;
        option.text = i;
        if (i == defaultYear) {
            option.selected = true;
        }
        yearSelect.add(option);
    }
}


var personalData = document.getElementById('personalData');
personalData.addEventListener('click', function () {
    toggleActiveTab('personalData');
    personalData.classList.add('bg-secondary-subtle');
});

var myOrder = document.getElementById('myOrder');
myOrder.addEventListener('click', function () {
    toggleActiveTab('myOrder');
    myOrder.classList.add('bg-secondary-subtle');
});

var editPreferences = document.getElementById('editPreferences');
editPreferences.addEventListener('click', function () {
    toggleActiveTab('editPreferences');
    editPreferences.classList.add('bg-secondary-subtle');
});

function toggleActiveTab(tabName) {
    var tabs = document.querySelectorAll('.profile-tab');
    tabs.forEach(function (tab) {
        tab.classList.remove('bg-secondary-subtle');
    });

    var tabs = document.querySelectorAll('.tab-content');
    tabs.forEach(function (tab) {
        tab.style.display = 'none';
    });

    var tabActive = document.getElementById(tabName + 'Active');
    if (tabActive) {
        tabActive.style.display = 'block';
    }

    history.pushState({}, '', '?activeTab=' + tabName);
}


function toggleActiveProfile(tabName) {
    var tabActive = document.getElementById(tabName + 'Active');
    var otherTabName = (tabName === 'accInfo') ? 'passSec' : 'accInfo';
    var otherTabActive = document.getElementById(otherTabName + 'Active');
    var tabText = document.getElementById(tabName + 'Text');
    var otherTabText = document.getElementById(otherTabName + 'Text');
    var tabContent = document.getElementById(tabName + 'Content');
    var otherTabContent = document.getElementById(otherTabName + 'Content');

    tabActive.classList.remove('d-none');
    tabActive.classList.add('d-block');
    tabText.style.color = '#5E5946';
    tabContent.classList.add('d-block');
    tabContent.classList.remove('d-none');

    otherTabActive.classList.remove('d-block');
    otherTabActive.classList.add('d-none');
    otherTabText.style.color = '#000';
    otherTabContent.classList.add('d-none');
    otherTabContent.classList.remove('d-block');
}

var allOrderBtn = document.getElementById('allOrderBtn');
var progressBtn = document.getElementById('progressBtn');
var successBtn = document.getElementById('successBtn');
var canceledBtn = document.getElementById('canceledBtn');

// Add event listeners to each button
allOrderBtn.addEventListener('click', function (e) {
    toggleStatusOrder(e);
    getOrderData('All')
});

progressBtn.addEventListener('click', function (e) {
    toggleStatusOrder(e);
    getOrderData('Upcoming')
});

successBtn.addEventListener('click', function (e) {
    toggleStatusOrder(e);
    getOrderData('Done')
});

canceledBtn.addEventListener('click', function (e) {
    toggleStatusOrder(e);
    getOrderData('Cancelled')
});

function toggleStatusOrder(event) {
    // Remove "active" class from all buttons
    var buttons = document.querySelectorAll('.status-btn');
    buttons.forEach(function (button) {
        button.classList.remove('active');
    });

    // Add "active" class to the clicked button
    event.target.classList.add('active');
}

function getOrderData(status) {
    axios.get(`/user-booking?status=${status}`)
        .then(function (response) {
            console.log(response.data)
            const orderContent = document.getElementById(`orderContent`);

            orderContent.innerHTML = '';

            if (response.data.length > 0) {
                response.data.forEach(order => {
                    orderContent.innerHTML += `
                    <div class="card-body position-relative d-flex flex-column border rounded p-4 mt-3">
                    <div class="d-flex flex-row">
                     <div class="logo-container-my-order me-3">
                            <img src="../storage/asset/images/dummy-salon-logo-my-order.png" alt=""
                                class="rounded-circle logo-my-order">
                      </div>
                       <div class="d-flex flex-column justify-content-center me-3">
                          <h5 class="card-title"> <strong>${order.service.service_name}</strong> </h5>
                          <div class="card-text">
                              <p class="mb-0 text-secondary">${order.service.city.city_name}</p>
                          </div>
                      </div>
                      <div class="d-flex align-items-center">
                          <span class="px-2 rounded-pill my-order-status-pill ${order.booking_status == 'Done' ? 'success' : order.booking_status == 'Upcoming' ? 'on-progress' : 'cancelled'} ">${order.booking_status == 'Done' ? 'Success' : order.booking_status == 'Upcoming' ? 'On Progress' : 'Cancelled'}</span>
                      </div>
                 </div>
                 <div class="row mt-3">
                        <div class="col border-end">
                          <div class="card-text">
                             <p class="mb-1">${order.service_type.st_name} By ${order.booking_slot.employee.emp_name}</p>
                             <p class="mb-0">${new Date(order.booking_slot.date).toLocaleDateString("en-GB", {
                        day: "numeric",
                        month: "long",
                        year: "numeric"
                    })}</p>
                               <p class="mb-0">${order.booking_slot.time_start.substring(0, 5)} WIB - ${order.booking_slot.time_end.substring(0, 5)} WIB</p>
                            </div>
                        </div>
                        <div class="col d-flex align-items-center">
                            <div class="card-text">
                               <p class="mb-1">Total Harga</p>
                                <span><strong>Rp.${order.price.toLocaleString()}</strong></span>
                          </div>
                       </div>
                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                    ${order.booking_status === 'Done' && order.isReviewed == false ? `
                    <a href="/review/${order.booking_id}" class="review-href me-3">Write a Review</a>
                    ` : ''}
                    ${order.booking_status === 'Upcoming' ? `<button class="profile-save-btn me-1 filter-btn bg-white border border-danger text-danger" data-bs-toggle="modal" data-bs-target="#cancelBookModal" data-booking-id="${order.booking_id}">Cancel</button>
                    ` : ''}
                    <a class="profile-save-btn filter-btn text-decoration-none cursor-pointer" href="/service/${order.service_id}">Book Again</a>
                 </div>
                </div>
                `
                })
            } else {
                orderContent.innerHTML = `<p class='text-secondary lead'>You don't have any ${status == 'Done' ? 'success' : status == "Upcoming" ? 'upcoming' : status == 'Cancelled' ? 'cancelled' : 'any'} booking.</p>`
            }
        })
}

