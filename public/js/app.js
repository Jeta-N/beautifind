const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    slidesPerView: 4.5,
    spaceBetween: 30,

});

// Login & Register toggle
var formTitle = document.getElementById('loginModalHeader');
var signInBtn = document.getElementById('signInBtn');
var registerBtn = document.getElementById('registerBtn');
var loginForm = document.getElementById('loginForm');
var registerForm = document.getElementById('registerForm');

signInBtn.addEventListener('click', function () {
    toggleButton(signInBtn, registerBtn);
    changeFormTitle('Nice to see you again :)');
    loginForm.classList.remove('d-none');
    loginForm.classList.add('d-block');
    registerForm.classList.add('d-none')
});

registerBtn.addEventListener('click', function () {
    toggleButton(registerBtn, signInBtn);
    changeFormTitle('Welcome to BeautiFind');
    registerForm.classList.remove('d-none');
    registerForm.classList.add('d-block');
    loginForm.classList.add('d-none')
});

// Function to toggle button classes
function toggleButton(activeBtn, inactiveBtn) {
    // Add or remove classes for the active button
    activeBtn.classList.add('bg-white', 'fade-in');
    activeBtn.classList.remove('bg-secondary-subtle');

    // Add or remove classes for the inactive button
    inactiveBtn.classList.remove('bg-white', 'fade-in');
    inactiveBtn.classList.add('bg-secondary-subtle');
}

function changeFormTitle(newTitle) {
    formTitle.classList.remove('fade-in-title'); // Remove the animation class
    formTitle.innerText = newTitle;
    void formTitle.offsetWidth; // Trigger reflow to restart the animation
    formTitle.classList.add('fade-in-title'); // Add the animation class back
}

