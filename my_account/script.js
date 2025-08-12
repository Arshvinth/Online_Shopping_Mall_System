const updatePersonalInfoForm = document.getElementById('update-personal-info');
const personalInfoMessage = document.getElementById('personal-info-message');
const addPaymentMethodButton = document.getElementById('add-payment-method');
const addPaymentMethodForm = document.getElementById('add-payment-method-form-data');
const paymentMethodMessage = document.getElementById('payment-method-message');
const paymentMethodsContainer = document.getElementById('payment-methods-container');

// Simulate getting username from PHP (replace with actual function)
function getUsername() {
    return 'John Doe';
}

// Fetch payment methods from database (replace with actual logic)
function getPaymentMethods() {
    const paymentMethods = [
        { type: 'credit', cardNumber: '**** **** **** 1234' },
        { type: 'debit', cardNumber: '**** **** **** 5678' }
    ];
    return paymentMethods;
}

function displayPaymentMethods(paymentMethods) {
    paymentMethodsContainer.innerHTML = '';
    paymentMethods.forEach(paymentMethod => {
        const paymentMethodElement = document.createElement('div');
        paymentMethodElement.classList.add('payment-method');
        paymentMethodElement.innerHTML = `
        <p><b>Card Type:</b> ${paymentMethod.type}</p>
        <p><b>Card Number:</b> ${paymentMethod.cardNumber}</p>
        <button class="delete-payment-method" data-card-number="${paymentMethod.cardNumber}">Delete</button>
        <button class="update-payment-method" data-card-type="${paymentMethod.type}" data-card-number="${paymentMethod.cardNumber}">Update</button>
      `;
        paymentMethodsContainer.appendChild(paymentMethodElement);
    });
}

