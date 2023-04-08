var timeDisplay = document.getElementById("time");

function refreshTime() {
    var options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "numeric",
        minute: 'numeric',
        second: 'numeric'
    };
    var dateString = new Date().toLocaleDateString("en", options);
    var formattedString = dateString.replace(", ", " - ");
    timeDisplay.innerHTML = formattedString;
}

setInterval(refreshTime, 1000);
