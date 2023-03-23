function deleteUser(email) {
    document.getElementById("deleteUserId").innerHTML = email?.innerHTML;
    document.getElementById("deleteUserIdText").value = email?.innerHTML;
}

function updateUser(email) {
    document.getElementById("updateUserId").innerHTML = email?.innerHTML;
    document.getElementById("updateUserIdText").value = email?.innerHTML;
}