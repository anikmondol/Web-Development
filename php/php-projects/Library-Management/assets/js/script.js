function togglePasswordVisibility(fieldId) {
    const field = document.getElementById(fieldId);
    const fieldType = field.getAttribute("type") === "password" ? "text" : "password";
    field.setAttribute("type", fieldType);

    // Toggle the icon class for eye open/close (optional)
    const icon = document.querySelector(`span[toggle="#${fieldId}"]`);
    icon.classList.toggle('fa-eye');
    icon.classList.toggle('fa-eye-slash');
}