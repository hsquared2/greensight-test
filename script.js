
const form = document.getElementById('registrationForm');

form.addEventListener('submit', function(event) {
  event.preventDefault(); 

  const inputs = this.querySelectorAll('input');

  if(!formHasError(inputs)) {
    const formData = new FormData(this);
  };
  
});

function formHasError(inputs) {
  let hasError = false;

  const fieldsEmptyMsg = form.querySelector('.fields-empty-err');
  const emailErrMsg = form.querySelector('.email-err');
  const passwordErrMsg = form.querySelector('.password-err');

  [fieldsEmptyMsg, emailErrMsg, passwordErrMsg].forEach(el => showErrMsg(el, ''));
  
  inputs.forEach(inp => {
    removeInvalidClass(inp);

    if(isFieldEmpty(inp)) {
      hasError = true;

      addInvalidClass(inp);
      showErrMsg(fieldsEmptyMsg, `Fields can't be empty!`);
    }
  });

  const emailInput = form.querySelector('#email');
  if(!validateEmail(emailInput)){
    hasError = true;

    addInvalidClass(emailInput);
    showErrMsg(emailErrMsg, `Email has to contain '@' symbol`);
  };

  const passwords = form.querySelectorAll('#password, #passwordRpt');

  if(!validatePassword(passwords)) {
    hasError = true;

    passwords.forEach(inp => addInvalidClass(inp));
    showErrMsg(passwordErrMsg, `Password don't match, try again`);
  }

  return hasError;
  
}

function isFieldEmpty(input) {
  return input.value === '';
}

function validateEmail(input) {
  return input.value.includes('@');
}

function validatePassword(passwords) {
  return passwords[0].value === passwords[1].value;
}

function addInvalidClass(input) {
  if(!input.classList.contains('is-invalid')) {
    input.classList.add('is-invalid');
  }
}

function removeInvalidClass(input) {
  if(input.classList.contains('is-invalid')) {
    input.classList.remove('is-invalid');
  }
}

function showErrMsg(errTag, message)  {
  errTag.innerHTML = message;
}
