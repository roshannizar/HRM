
function deletePosition(id) {
    document.getElementById("deletepId").innerHTML = id;
    document.getElementById("deletepIdText").value = id;
    var modal = document.getElementById("deletePositionModal");
    modal.style.display = "block";
}

function updatePosition(id) {
    document.getElementById("updatepId").innerHTML = id;
    document.getElementById("updatepIdText").value = id;
    var modal = document.getElementById("updatePositionModal");
    modal.style.display = "block";
}

function closeUpdateModal() {
    var modal = document.getElementById("updatePositionModal");
    modal.style.display = "none";
}

function closeDeleteModal() {
    var modal = document.getElementById("deletePositionModal");
    modal.style.display = "none";
}

