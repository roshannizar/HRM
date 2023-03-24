
function deleteProject(id) {
    document.getElementById("deleteprId").innerHTML = id;
    document.getElementById("deleteprIdText").value = id;
    var modal = document.getElementById("deleteProjectModal");
    modal.style.display = "block";
}

function updateProject(id) {
    document.getElementById("updateprId").innerHTML = id;
    document.getElementById("updateprIdText").value = id;
    var modal = document.getElementById("updateProjectModal");
    modal.style.display = "block";
}

function closeUpdateModal() {
    var modal = document.getElementById("updateProjectModal");
    modal.style.display = "none";
}

function closeDeleteModal() {
    var modal = document.getElementById("deleteProjectModal");
    modal.style.display = "none";
}

