
function deleteTask(id) {
    document.getElementById("deletetId").innerHTML = id;
    document.getElementById("deletetIdText").value = id;
    var modal = document.getElementById("deleteTaskModal");
    modal.style.display = "block";
}

function updateTask(id) {
    document.getElementById("updatetId").innerHTML = id;
    document.getElementById("updatetIdText").value = id;
    var modal = document.getElementById("updateTaskModal");
    modal.style.display = "block";
}

function closeUpdateModal() {
    var modal = document.getElementById("updateTaskModal");
    modal.style.display = "none";
}

function closeDeleteModal() {
    var modal = document.getElementById("deleteTaskModal");
    modal.style.display = "none";
}

