/*responsive part */
const bar = document.getElementById('bar');
const Close = document.getElementById('close');
const nav = document.getElementById('navbar');


if(bar) {
    bar.addEventListener('click', () => {
        nav.classList.add('active');
    });
}

if(Close) {
    Close.addEventListener('click', () => {
        nav.classList.remove('active');
    });
}

/*validation part for login form*/

function validateLoginForm() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    if (password === "") {
        alert("Password cannot be empty.");
        return false;
    }
     // Success message
     alert('Thank you for login');

    return true;
}

/*validation part for register form*/

function validateRegisterForm() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    if (password === "" || password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }
     // Success message
     alert('Thank you for register!');

    return true;
}


/*validation part for Review form*/
function submitReview() {
    let productName = document.getElementById('productName').value;
    let reviewerName = document.getElementById('reviewerName').value;
    let reviewerEmail = document.getElementById('reviewerEmail').value;
    let rating = document.getElementById('rating').value;
    let review = document.getElementById('review').value;

    let feedbackMessage = document.getElementById('feedbackMessage');
    feedbackMessage.innerHTML = '';

    // Basic validation
    if (productName === '' || reviewerName === '' || reviewerEmail === '' || rating === '' || review === '') {
        feedbackMessage.innerHTML = 'Please fill in all fields.';
        return false;
    }

    let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!reviewerEmail.match(emailPattern)) {
        feedbackMessage.innerHTML = 'Please enter a valid email address.';
        return false;
    }

    if (rating < 1 || rating > 5) {
        feedbackMessage.innerHTML = 'Rating should be between 1 and 5.';
        return false;
    }

    // Success message
    alert('Thank you for your review!');
    return true;
}

/*validation part for  Coupon Form*/

function validateCouponForm() {
    const nameInput = document.getElementById('name').value;
    const nicInput = document.getElementById('nic').value;
    const phoneInput = document.getElementById('phone').value;

    let valid = true;

    // Validate Full Name
    if (nameInput.trim() === '') {
        alert('Full Name is required.');
        valid = false;
    }

    // NIC Validation
    const nicRegex = /^\d{7}([Vv]?)$/;
    if (!nicRegex.test(nicInput)) {
        alert('NIC Number must be 7 digits or 7 digits followed by optional "V".');
        valid = false;
    }

    // Phone Number Validation
    const phoneRegex = /^\+94\s7\d{8}$/;
    if (!phoneRegex.test(phoneInput)) {
        alert('Phone Number must start with +94 followed by 9 digits.');
        valid = false;
    }

    if (valid) {
        alert('Coupon request submitted successfully!');  // Success message
        return true;  // Form submission proceeds
    } else {
        return false;  // Prevent form submission if validation fails
    }
}

/*=============== SHOW HIDE PASSWORD LOGIN ===============*/
const passwordAccess = (loginPass, loginEye) =>{
    const input = document.getElementById(loginPass),
          iconEye = document.getElementById(loginEye)
 
    iconEye.addEventListener('click', () =>{
       // Change password to text
       input.type === 'password' ? input.type = 'text'
                                       : input.type = 'password'
 
       // Icon change
       iconEye.classList.toggle('ri-eye-fill')
       iconEye.classList.toggle('ri-eye-off-fill')
    })
 }
 passwordAccess('password','loginPassword')
 
 /*=============== SHOW HIDE PASSWORD CREATE ACCOUNT ===============*/
 const passwordRegister = (loginPass, loginEye) =>{
    const input = document.getElementById(loginPass),
          iconEye = document.getElementById(loginEye)
 
    iconEye.addEventListener('click', () =>{
       // Change password to text
       input.type === 'password' ? input.type = 'text'
                                       : input.type = 'password'
 
       // Icon change
       iconEye.classList.toggle('ri-eye-fill')
       iconEye.classList.toggle('ri-eye-off-fill')
    })
 }
 passwordRegister('passwordCreate','loginPasswordCreate')
 
 /*=============== SHOW HIDE LOGIN & CREATE ACCOUNT ===============*/
 const loginAcessRegister = document.getElementById('loginAccessRegister'),
       buttonRegister = document.getElementById('loginButtonRegister'),
       buttonAccess = document.getElementById('loginButtonAccess')
 
 buttonRegister.addEventListener('click', () => {
    loginAcessRegister.classList.add('active')
 })
 
 buttonAccess.addEventListener('click', () => {
    loginAcessRegister.classList.remove('active')
 })
 