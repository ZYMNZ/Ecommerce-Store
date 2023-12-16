function addErrorInputBorder(inputErrorElement) {
    // Add the red border around the input field
    inputErrorElement.addClass("invalidInput");
}

function addErrorInputLabel(inputErrorLabel, errorLabelText = "") {
    inputErrorLabel.removeClass("displayNone");

    if(errorLabelText !== "") {
        inputErrorLabel.html(errorLabelText);
    }
}

function removeErrorInputBorder(inputErrorField) {
    inputErrorField.removeClass("invalidInput");
}

function removeErrorInputLabel(inputTextLabel) {
    inputTextLabel.addClass("displayNone");
}

function checkTextFieldEmpty(pTextField, pErrorLabel, pErrorLabelText = "") {
    var textField = pTextField;
    var errorLabel = pErrorLabel;
    var fieldIsEmpty = false;

    if(textField.val().trim().length === 0) {
        /*
        Check if the value inside the title text field is empty
        because the title column inside the database is not null
         */
        fieldIsEmpty = true;
        addErrorInputBorder(textField);
        addErrorInputLabel(errorLabel, pErrorLabelText);
    }
    else {
        removeErrorInputBorder(textField);
        removeErrorInputLabel(errorLabel);
    }
    return fieldIsEmpty;
}

function firstNameCheck(firstname,fNErrorLabel) {
    var firstName = firstname;
    var firstNameErrorLabel = fNErrorLabel;

    var regex = /^[A-Za-z]{2,50}$/;

    var firstNameValid = regex.test(firstName.val());
    var check = false;
    // console.log(firstNameValid);
    if(firstNameValid) {
        check = true;
        removeErrorInputBorder(firstName);
        removeErrorInputLabel(firstNameErrorLabel);
    }
    else {
        addErrorInputBorder(firstName);
        addErrorInputLabel(firstNameErrorLabel, "firstName must be a letters only and at least 2, max of 50 characters");
    }
    return check;
}


function lastNameCheck(lastname,lNErrorLabel) {
    var lastName = lastname;
    var lastNameErrorLabel = lNErrorLabel;

    var regex = /^[A-Za-z]{2,50}$/;
    var check = false;
    var lastNameValid = regex.test(lastName.val());
    // console.log(lastNameValid);
    if(lastNameValid) {
        check=true;
        removeErrorInputBorder(lastName);
        removeErrorInputLabel(lastNameErrorLabel);
    }
    else {

        addErrorInputBorder(lastName);
        addErrorInputLabel(lastNameErrorLabel, "lastName must be a letters only and at least 2, max of 50 characters");
    }
    return check;
}

function emailCheck(pEmail,pEmailErrorLabel) {
    var email = pEmail;
    var emailErrorLabel = pEmailErrorLabel;

    var regex = /^[A-Za-z0-9_\.\-]{3,15}@[A-Za-z0-9\.]{2,22}(\.com|\.ca|\.qc\.ca|\.qc)$/;
    var check = false;
    var emailValid = regex.test(email.val());
    // console.log(lastNameValid);
    if(emailValid) {
        check=true;
        removeErrorInputBorder(email);
        removeErrorInputLabel(emailErrorLabel);
    }
    else {
        addErrorInputBorder(email);
        addErrorInputLabel(emailErrorLabel, "Email must be 3 to 15 'name' characters, 'domain' must be from 2 to 22 characters and (.com|.ca|.qc|.qc.ca) are the only accepted Top-level domains ");
    }
    return check;
}