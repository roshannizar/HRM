
function deleteDepartment(id) {
    document.getElementById("deletedId").innerHTML = id;
    document.getElementById("deletedIdText").value = id;
    var modal = document.getElementById("deleteDepartmentModal");
    modal.style.display = "block";
}

function updateDepartment(id) {
    document.getElementById("updatedId").innerHTML = id;
    document.getElementById("updatedIdText").value = id;
    var modal = document.getElementById("updateDepartmentModal");
    modal.style.display = "block";
}

function closeUpdateModal() {
    var modal = document.getElementById("updateDepartmentModal");
    modal.style.display = "none";
}

function closeDeleteModal() {
    var modal = document.getElementById("deleteDepartmentModal");
    modal.style.display = "none";
}

