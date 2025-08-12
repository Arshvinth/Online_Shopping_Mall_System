const closeBtn = document.querySelector('.close-btn');
const loginForm = document.querySelector('form');

closeBtn.addEventListener('click', () => {
  const loginPopup = document.querySelector('.login-popup');
  loginPopup.classList.remove('active'); // Add a class 'active' to the login-popup element in CSS to control its visibility
});

loginForm.addEventListener('submit', (event) => {
  // You can add validation logic here to check if email and password are filled in correctly before submitting

  // Replace this with your actual functionality after validation
  event.preventDefault(); // Prevent default form submission behavior
  alert('Submitted!'); // Simulate a successful login
});
