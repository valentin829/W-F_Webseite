const events = [
    { date: "2024-04-11", title: "Rettungsschwimmkurs" },
    { date: "2024-04-18", title: "Schnorchelkurs" },
    { date: "2024-04-25", title: "Schwimmtechnik-Workshop" },
    { date: "2024-05-02", title: "Schwimmwettkampf" },
    { date: "2024-05-09", title: "Schwimmkurs für Kinder" },
    { date: "2024-05-16", title: "Wasserballturnier" },
    { date: "2024-05-23", title: "Schwimmen für Fortgeschrittene" },
    { date: "2024-05-30", title: "Schwimmparty" },
    { date: "2024-06-06", title: "Wassergymnastik" },
    { date: "2024-06-13", title: "Wasserpolo-Training" },
    { date: "2024-06-20", title: "Schwimmkurs für Anfänger" },
    { date: "2024-06-27", title: "Schwimmen für Jugendliche" },
    { date: "2024-07-04", title: "Schwimmen mit Flossen" },
    { date: "2024-07-11", title: "Tauchkurs" },
    { date: "2024-07-18", title: "Familienschwimmen" },
    { date: "2024-07-25", title: "Fortgeschrittenen-Schwimmtraining" },
    { date: "2024-08-01", title: "Atemtechnik-Training" },
    { date: "2024-08-08", title: "Wasserballspiel" },
    { date: "2024-08-15", title: "Freiwasserschwimmen" },
    { date: "2024-08-22", title: "Synchronschwimmen-Training" },
    { date: "2024-08-29", title: "Wasserspiele" },
    { date: "2024-09-05", title: "Wasserrettungskurs" },
    { date: "2024-09-12", title: "Aqua-Fitnesskurs" },
    { date: "2024-09-19", title: "Schwimmen für Schwangere" },
    { date: "2024-09-26", title: "Seniorenschwimmen" },
    { date: "2024-10-03", title: "Wasserski-Training" },
    { date: "2024-10-10", title: "Schwimmen für alle" },
    { date: "2024-10-17", title: "Nachtschwimmen" },
];


const currentDate = new Date();
let currentMonth = currentDate.getMonth() + 1;
let currentYear = currentDate.getFullYear();

function generateCalendar(month, year) {
    const daysInMonth = new Date(year, month, 0).getDate();
    const firstDayIndex = new Date(year, month - 1, 1).getDay();
    const monthNames = ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"];
    
    const monthElement = document.getElementById("month");
    const daysElement = document.getElementById("days");
    const eventListElement = document.getElementById("event-list");
    
    monthElement.innerText = monthNames[month - 1] + " " + year;
    
    let days = "";
    
    for (let i = 0; i < firstDayIndex; i++) {
        days += "<li></li>";
    }
    
    for (let day = 1; day <= daysInMonth; day++) {
        let dayClass = "";
        const currentDate = new Date(year, month - 1, day);
        const dateString = currentDate.toISOString().split("T")[0];
        
        const event = events.find(e => e.date === dateString);
        if (event) {
            dayClass = "event";
        }
        
        days += `<li class="${dayClass}" data-date="${dateString}">${day}</li>`;
    }
    
    daysElement.innerHTML = days;
    
    const calendarDays = document.querySelectorAll(".days li");
    calendarDays.forEach((dayElement, index) => {
        if (index >= firstDayIndex) {
            dayElement.addEventListener("click", () => {
                const selectedDate = dayElement.getAttribute("data-date");
                const event = events.find(e => e.date === selectedDate);
                
                if (event) {
                    alert(`Termin am ${selectedDate}: ${event.title}`);
                } else {
                    alert(`Kein Termin am ${selectedDate}`);
                }
            });
        }
    });

    let eventList = "<h2>Terminübersicht</h2><ul>";
    events.forEach(event => {
        const eventDate = new Date(event.date);
        if (eventDate.getMonth() + 1 === month && eventDate.getFullYear() === year) {
            eventList += `<li>${event.date}: ${event.title}</li>`;
        }
    });
    eventList += "</ul>";
    eventListElement.innerHTML = eventList;
}

document.addEventListener("DOMContentLoaded", function () {
    generateCalendar(currentMonth, currentYear);

    
    document.querySelector(".prev").addEventListener("click", () => {
        currentMonth -= 1;
        if (currentMonth < 1) {
            currentMonth = 12;
            currentYear -= 1;
        }
        generateCalendar(currentMonth, currentYear);
    });

    document.querySelector(".next").addEventListener("click", () => {
        currentMonth += 1;
        if (currentMonth > 12) {
            currentMonth = 1;
            currentYear += 1;
        }
        generateCalendar(currentMonth, currentYear);
    });
});
