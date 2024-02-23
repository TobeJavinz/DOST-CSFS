const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const login = document.getElementById('login');


registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

login.addEventListener('click', () => {
   //window.location.href = "./dashboard.html";
});

document.addEventListener('DOMContentLoaded', function() {
    console.log("DOMContentLoaded event fired.");
    const userMenuButton = document.getElementById('user-menu-button');
    console.log("userMenuButton:", userMenuButton);
    const dropdownMenu = document.getElementById('dropdown-menu');
    console.log("dropdownMenu:", dropdownMenu);

    // Add event listeners
    if (userMenuButton && dropdownMenu) {
        console.log("Adding event listeners...");
        userMenuButton.addEventListener('click', function() {
            console.log("User menu button clicked.");
            dropdownMenu.classList.toggle('hidden');
            dropdownMenu.classList.toggle('block');
            dropdownMenu.classList.toggle('transition-transform');
            dropdownMenu.classList.toggle('opacity-0');
            dropdownMenu.classList.toggle('scale-95');
        });
    } else {
        console.error("One or more elements not found.");
    }
});

