
function deletePayroll(id) {
    document.getElementById("deletepId").innerHTML = id;
    document.getElementById("deletepIdText").value = id;
    var modal = document.getElementById("deletePayrollModal");
    modal.style.display = "block";
}

function updatePayroll(id) {
    document.getElementById("updatepId").innerHTML = id;
    document.getElementById("updatepIdText").value = id;
    var modal = document.getElementById("updatePayrollModal");
    modal.style.display = "block";
}

function closeUpdateModal() {
    var modal = document.getElementById("updatePayrollModal");
    modal.style.display = "none";
}

function closeDeleteModal() {
    var modal = document.getElementById("deletePayrollModal");
    modal.style.display = "none";
}

