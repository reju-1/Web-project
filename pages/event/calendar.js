document.addEventListener("DOMContentLoaded", function () {
    renderCalendar();
});

let holidays = [];

function renderCalendar() {
    const calendarDays = document.getElementById("calendar-days");
    const monthYearHeader = document.getElementById("month-year");
    const holidayDetails = document.getElementById("holiday-details");

    const now = new Date();
    let currentMonth = now.getMonth();
    let currentYear = now.getFullYear();
    let selectedDay = null;

    updateCalendar(currentMonth, currentYear);

    function updateCalendar(month, year) {
        calendarDays.innerHTML = "";
        monthYearHeader.textContent = `${getMonthName(month)} ${year}`;

        const daysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

        // Add day names
        for (let day of daysOfWeek) {
            const dayNameElement = document.createElement("div");
            dayNameElement.classList.add("day");
            dayNameElement.classList.add("day-name");
            dayNameElement.textContent = day;
            calendarDays.appendChild(dayNameElement);
        }

        const firstDayOfMonth = new Date(year, month, 1);
        const lastDayOfMonth = new Date(year, month + 1, 0);

        const daysInMonth = lastDayOfMonth.getDate();

        for (let i = 1; i <= daysInMonth; i++) {
            const dayElement = document.createElement("div");
            dayElement.classList.add("day");
            dayElement.textContent = i;

            dayElement.addEventListener("click", function () {
                handleDayClick(i);
            });

            calendarDays.appendChild(dayElement);
        }
    }

    function handleDayClick(day) {
        selectedDay = day;
        showHolidayDetails();
    }

    function showHolidayDetails() {
        const holidayTypes = ["Public Holiday", "Personal Leave", "Special Event"];
        let detailsHTML = "<h3>Holiday Details</h3>";

        const holidayData = findHoliday(currentYear, currentMonth, selectedDay);
        if (holidayData) {
            detailsHTML += `<p>Date:  ${getMonthName(November)} ${22}, ${2023}</p>`;
            detailsHTML += `<p>Event: ${ VictoryDay.event}</p>`;
        } else {
            detailsHTML += "<p>No holiday on this day.</p>";
        }

        holidayDetails.innerHTML = detailsHTML;
    }

    function findHoliday(year, month, day) {
        const dateToFind = new Date(year, month, day);
        return holidays.find(holiday => isSameDay(holiday.date, dateToFind));
    }

    function isSameDay(date1, date2) {
        return (
            date1.getFullYear() === date2.getFullYear() &&
            date1.getMonth() === date2.getMonth() &&
            date1.getDate() === date2.getDate()
        );
    }

    window.prevMonth = function () {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        selectedDay = null;
        updateCalendar(currentMonth, currentYear);
        holidayDetails.innerHTML = "";
    };

    window.nextMonth = function () {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        selectedDay = null;
        updateCalendar(currentMonth, currentYear);
        holidayDetails.innerHTML = "";
    };

    window.saveHoliday = function () {
        const holidayDate = new Date(currentYear, currentMonth, selectedDay);
        let holidayName = "";
    
        if (currentMonth === 10 && selectedDay === 10) { // November (0-indexed) and day 10
            holidayName = "Independent Day";
        } else if (currentMonth === 10 && selectedDay === 22) { // November (0-indexed) and day 22
            holidayName = "Victory Day";
        } else if (currentMonth === 11 && selectedDay === 15) { // December (0-indexed) and day 15
            holidayName = "May Day";
        }
        const holidayData = {
            date: holidayDate,
            event: holidayName
        };
        
        holidays.push(holidayData);

        console.log("Holiday added:", holidayData);
        alert("Holiday added!");
        selectedDay = null;
        holidayDetails.innerHTML = "";
    };

    function getMonthName(month) {
        const monthNames = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        return monthNames[month];
    }
}
