const swiperTimeDate = new Swiper('.swiper-time', {
    direction: 'horizontal',
    loop: false,

    slidesPerView: 3.5,
    spaceBetween: 5,

    navigation: {
        nextEl: ".time-book-next",
        prevEl: ".time-book-prev",
    },
})

function fetchTimeSlots(id, employeeId, estId) {
    const selectedDate = document.getElementById(`bookDate${estId}`).value;
    // Send an AJAX request to your Laravel controller
    axios.post('/get-time-slots', {
        date: selectedDate,
        serviceId: id,
        employeeId: employeeId
    }).then(function (response) {
        console.log(response.data);
        const bookTime = document.getElementById(`bookTime${estId}`);
        if (response.data.length > 4) {
            bookTime.innerHTML = `
            <div class="padding-x-175rem position-relative">
                <div class="swiper swiper-time position-static">
                    <div class="swiper-wrapper">
                    </div>
                    <div class="time-book-prev position-absolute top-0 start-0">
                    <i class="bi bi-arrow-left-circle fs-3"></i>
                    </div>
                    <div class="time-book-next position-absolute top-0 end-0">
                    <i class="bi bi-arrow-right-circle fs-3"></i>
                    </div>
                </div>
            </div>`;

            const swiperWrapper = bookTime.querySelector('.swiper-wrapper');
            response.data.forEach(timeSlot => {
                swiperWrapper.innerHTML += `
                <div class="swiper-slide">
                    <button class="py-1 px-3 btn btn-time-book" type="button" id="timeSlotBtn${timeSlot.bs_id}" value="${timeSlot.bs_id}" onclick="bookTimeInfo('${timeSlot.time_start.substring(0, 5)}', ${employeeId}, ${timeSlot.bs_id})">${timeSlot.time_start.substring(0, 5)} WIB</button>
                </div>
                `;
            });
        } else if (response.data.length > 0) {
            bookTime.innerHTML = ''
            response.data.forEach(timeSlot => {
                bookTime.innerHTML += `
                    <button class="py-1 px-3 btn btn-time-book" type="button" id="timeSlotBtn${timeSlot.bs_id}" value="${timeSlot.bs_id}" onclick="bookTimeInfo('${timeSlot.time_start.substring(0, 5)}', ${estId}, ${timeSlot.bs_id})">${timeSlot.time_start.substring(0, 5)} WIB</button>
                `;
            });
        } else {
            bookTime.innerHTML = '<p class="text-secondary">Currently no time available, Choose another date</p>'
        }
    })
}

function bookTimeInfo(time, estId, timeSlotId) {
    const timeBtns = document.querySelectorAll('.btn-time-book');
    const timeBtn = document.getElementById(`timeSlotBtn${timeSlotId}`);
    timeBtns.forEach(btn => {
        btn.classList.remove('active');
    })
    timeBtn.classList.add('active');

    const selectedDate = document.getElementById(`bookDate${estId}`).value;
    const dateTimeInfo = document.getElementById(`dateTimeInfo${estId}`);

    dateTimeInfo.innerHTML =
        `
    Date: ${new Date(selectedDate).toLocaleDateString("en-GB", {
            day: "numeric",
            month: "long",
            year: "numeric"
        })} <br>
    Time: ${time} WIB
    `

    const continueBookBtn = document.getElementById(`continueBookBtn${estId}`);
    continueBookBtn.removeAttribute('disabled');
}


function submitBookForm() {
    const activeBookTimeButton = document.querySelector(".btn-time-book.active");
    const selectedTimeSlotId = activeBookTimeButton ? activeBookTimeButton.value : null;
    if (selectedTimeSlotId) {
        const hiddenField = document.createElement("input");
        hiddenField.type = "hidden";
        hiddenField.name = "bs_id";
        hiddenField.value = selectedTimeSlotId;
        event.target.appendChild(hiddenField);
        return true;
    } else {
        // Handle the case where no button is active
        alert("Please select a time slot.");
        return false
    }
}
