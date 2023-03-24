
function deleteEmployee(id) {
    document.getElementById("deleteeId").innerHTML = id;
    document.getElementById("deleteeIdText").value = id;
    var modal = document.getElementById("deleteEmployeeModal");
    modal.style.display = "block";
}

function updateEmployee(id) {
    document.getElementById("updateeId").innerHTML = id;
    document.getElementById("updateeIdText").value = id;
    var modal = document.getElementById("updateEmployeeModal");
    modal.style.display = "block";
}

function closeUpdateModal() {
    var modal = document.getElementById("updateEmployeeModal");
    modal.style.display = "none";
}

function closeDeleteModal() {
    var modal = document.getElementById("deleteEmployeeModal");
    modal.style.display = "none";
}

