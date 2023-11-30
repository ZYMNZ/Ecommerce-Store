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