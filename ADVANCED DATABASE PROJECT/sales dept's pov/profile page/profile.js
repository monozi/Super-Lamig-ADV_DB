function populateUserData() {
    // Replace with your logic to fetch user data from backend
    const userName = "John Doe";
    const userId = "123456";
    const userDepartment = "Production";
    const userEmail = "john.doe@coca-cola.com";

    document.getElementById("user-name").textContent = userName;
    document.getElementById("user-id").textContent = userId;
    document.getElementById("user-department").textContent = userDepartment;
    document.getElementById("user-email").textContent = userEmail;
}