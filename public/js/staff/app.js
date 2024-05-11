document.addEventListener('DOMContentLoaded', function () {
    generateDateOptions();
});

//Clear Filter
function clearFilter() {
    var currentURL = window.location.href;
    var url = currentURL.split('?')[0];
    window.location.href = url;
}


function sortTable(n, id) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById(id);
    switching = true;
    // Set the sorting direction to ascending:
    dir = "asc";
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
        // Start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /* Loop through all table rows (except the
        first, which contains table headers): */
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            if (n === 0) {
                if (dir == "asc") {
                    if (Number(x.innerHTML) > Number(y.innerHTML)) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (Number(x.innerHTML) < Number(y.innerHTML)) {
                        shouldSwitch = true;
                        break;
                    }
                }
            } else {
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount++;
        } else {
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}

const swiperStaffPortofolio = new Swiper('.swiper-staff-portfolio', {
    direction: 'horizontal',
    loop: true,

    slidesPerView: 4.5,
    spaceBetween: 20,

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        450: {
            slidesPerView: 2,
            spaceBetween: 15
        },
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 20,
        }
    }
})

const swiperStaffPromotion = new Swiper('.swiper-staff-promotion', {
    direction: 'horizontal',
    loop: true,

    slidesPerView: 4.5,
    spaceBetween: 20,

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        450: {
            slidesPerView: 2,
            spaceBetween: 15
        },
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 20,
        }
    }
})

function generateDateOptions() {
    const dateSelect = document.getElementById("dateProfile");
    if (dateSelect) {
        var defaultDate, defaultDay;
        if (dateSelect && dateSelect.dataset.defaultDate) {
            defaultDate = dateSelect.dataset.defaultDate;
            defaultDay = defaultDate.split("-")[2];
        }
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
    }

    const yearSelect = document.getElementById("yearProfile");
    if (yearSelect) {
        var defaultYear;
        if (defaultDate) {
            defaultYear = defaultDate.split("-")[0];
        }
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
}


