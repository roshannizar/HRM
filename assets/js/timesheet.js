
function deleteTimesheet(id) {
    document.getElementById("deletetiId").innerHTML = id;
    document.getElementById("deletetiIdText").value = id;
    var modal = document.getElementById("deleteTimesheetModal");
    modal.style.display = "block";
}

function updateTimesheet(id) {
    document.getElementById("updatetiId").innerHTML = id;
    document.getElementById("updatetiIdText").value = id;
    var modal = document.getElementById("updateTimesheetModal");
    modal.style.display = "block";
}

function closeUpdateModal() {
    var modal = document.getElementById("updateTimesheetModal");
    modal.style.display = "none";
}

function closeDeleteModal() {
    var modal = document.getElementById("deleteTimesheetModal");
    modal.style.display = "none";
}

