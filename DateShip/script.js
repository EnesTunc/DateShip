const createAccountButton = document.querySelector('.create-account-button');
const signupForm = document.querySelector('.signup-form');
const loginForm = document.querySelector('#loginForm');
const errorMessages = document.getElementById('errorMessages');

createAccountButton.addEventListener('click', () => {
  signupForm.style.display = 'block'; 
});


const gunSecimi = document.getElementById('day');
const aySecimi = document.getElementById('month');
const yilSecimi = document.getElementById('year');

function gunSecenekleriniOlustur() {
  gunSecimi.innerHTML = ''; 
  for (let i = 1; i <= 31; i++) {
    const option = document.createElement('option');
    option.value = i;
    option.text = i;
    gunSecimi.appendChild(option);
  }
}

function aySecenekleriniOlustur() {
  const ayIsimleri = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  aySecimi.innerHTML = ''; 
  for (let i = 0; i < ayIsimleri.length; i++) {
    const option = document.createElement('option');
    option.value = i; 
    option.text = ayIsimleri[i];
    aySecimi.appendChild(option);
  }
}

function yilSecenekleriniOlustur() {
  yilSecimi.innerHTML = ''; 
  for (let i = 1930; i <= 2008; i++) {
    const option = document.createElement('option');
    option.value = i;
    option.text = i;
    yilSecimi.appendChild(option);
  }
}


gunSecenekleriniOlustur();
aySecenekleriniOlustur();
yilSecenekleriniOlustur();


loginForm.addEventListener('submit', (event) => {
  event.preventDefault();
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'login.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      const response = xhr.responseText;
      if (response === 'success') {
        
        window.open('welcome.php', '_blank');
      } else {
        
        errorMessages.innerHTML = response;
      }
    } else {
      
      errorMessages.innerHTML = 'Server error. Please try again later.';
    }
  };
  xhr.send(`email=${email}&password=${password}`);
});

const closeButton = document.querySelector('.close-button');

closeButton.addEventListener('click', () => {
  signupForm.style.display = 'none';
});
