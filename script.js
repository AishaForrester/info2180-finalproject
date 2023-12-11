window.onload = function () {
  var myform = document.querySelector('#myform');

  myform.addEventListener('submit', function (element) {
    var validationFailed = false;

    var firstname = document.querySelector('#firstname');
    var lastname = document.querySelector('#lastname');
    var telephone = document.querySelector('#telephone');
    var email = document.querySelector('#email');
    var company = document.querySelector('#company');

  // clear previous error messages
    clearErrors();

    if (isEmpty(firstname.value.trim())) {
      validationFailed = true;
      displayErrorMessage(firstname, "You must fill in your First Name");
    };

    if (isEmpty(lastname.value.trim())) {
      validationFailed = true;
      displayErrorMessage(lastname, "You must fill in your Last Name");
    };

    if (!isValidTelephoneNum(telephone.value.trim())) {
      validationFailed = true;
      displayErrorMessage(telephone, "Incorrect format for telephone number.");
    };

    if (!isValidEmail(email.value.trim())) {
      validationFailed = true;
      displayErrorMessage(email, "Incorrect format for email address.");
    };

    if (isEmpty(company.value.trim())) {
      validationFailed = true;
      displayErrorMessage(company, "You must fill in your company name.");
    };

    if (validationFailed) {
      element.preventDefault();
    };

    if (!validationFailed) {
      alert("New contact saved!");
    };
  });
};

// Check if value for a field is empty.
function isEmpty(elementValue) {
  if (elementValue == "") {
    return true;
  }

  return false;
}

//Check if a valid telephone number was entered.
function isValidTelephoneNum(telephoneNum) {
  return /^\d{3}-\d{3}-\d{4}$/.test(telephoneNum);
}

//Check if a valid email address was entered.
function isValidEmail(email) {
  return /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/.test(email);
}


// Function to add an element after another 
function insertAfter(element, newNode) {
  element.parentNode.insertBefore(newNode, this.nextSibling);
}


//Clear error messages
function clearErrors() {
  var elementsWithErrors = document.querySelectorAll('.error');

  for (var x = 0; x < elementsWithErrors.length; x++) {
    elementsWithErrors[x].setAttribute('class', '');
    elementsWithErrors[x].parentNode.removeChild(elementsWithErrors[x].nextElementSibling);
  }

}

//Display error message next to field.

function displayErrorMessage(formField, message) {
  formField.setAttribute('class', 'error');
  var errorMessageText = document.createTextNode(message);
  var errorMessage = document.createElement('span');
  errorMessage.setAttribute('class', 'error-message');
  errorMessage.appendChild(errorMessageText);
  insertAfter(myform, errorMessage);
}
