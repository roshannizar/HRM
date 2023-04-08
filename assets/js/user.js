function deleteUser(email) {
    document.getElementById("deleteUserId").innerHTML = email?.innerHTML;
    document.getElementById("deleteUserIdText").value = email?.innerHTML;
    var modal = document.getElementById("deleteUserModal");
    modal.style.display = "block";
}

function updateUser(email) {
    document.getElementById("updateUserId").innerHTML = email?.innerHTML;
    document.getElementById("updateUserIdText").value = email?.innerHTML;
    var modal = document.getElementById("updateUserModal");
    modal.style.display = "block";
}

function closeUpdateModal() {
    var modal = document.getElementById("updateUserModal");
    modal.style.display = "none";
}

function closeDeleteModal() {
    var modal = document.getElementById("deleteUserModal");
    modal.style.display = "none";
}

