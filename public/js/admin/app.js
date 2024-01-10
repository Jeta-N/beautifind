document.addEventListener("DOMContentLoaded", function () {
    generateDateOptions();
})


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
            // Start by saying there should be no switching:
            shouldSwitch = false;
            /* Get the two elements you want to compare,
            one from current row and one from the next: */
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            /* Check if the two rows should switch place,
            based on the direction, asc or desc: */
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            /* If a switch has been marked, make the switch
            and mark that a switch has been done: */
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            // Each time a switch is done, increase this count by 1:
            switchcount++;
        } else {
            /* If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again. */
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}

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

//Clear Filter
function clearFilter() {
    var currentURL = window.location.href;
    var url = currentURL.split('?')[0];
    window.location.href = url;
}
