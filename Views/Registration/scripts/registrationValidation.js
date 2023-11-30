$(document).ready(
    function() {

        setUpEventHandlers();
        // executeEmailValidation();
    }
);

function doPasswordsMatch() {
    var passwordInputField = $("[name='password']");
    var confirmPasswordInputField = $("[name='confirmPassword']");
    var confirmPasswordErrorInputLabel = $("[name='notMatchingPasswordLabel']");
    // var emptyPasswordField = $("[name='emptyPasswordLabel']");

    var passwordsMatch = false;
    // if (passwordInputField.val() == "" || confirmPasswordErrorInputLabel.val() == "") {
        if (passwordInputField.val() === confirmPasswordInputField.val()) {
            removeErrorInputBorder(confirmPasswordInputField);
            removeErrorInputLabel(confirmPasswordErrorInputLabel);
            passwordsMatch = true;
        }
    // }
    else {
        addErrorInputBorder(confirmPasswordInputField);
        addErrorInputLabel(confirmPasswordErrorInputLabel, "Passwords do not match");
    }
    return passwordsMatch;
}



function setUpEventHandlers() {
    // var registrationSignUpButton = $("[name='signUp']");
    var registrationForm = $("#registrationForm");
    registrationForm.on("submit", function(event) {

        var passwordsMatch = doPasswordsMatch();
        var emailValid = checkEmailValidation();

        // If the passwords match, submit the form
        if(!passwordsMatch || !emailValid) {
            // Prevent form submission to check if the passwords match
            event.preventDefault();
        }
    });
}


//Still under testing
function checkEmailValidation(){
    var emailInputField = $("[name='email']").val();
    var checkEmail = $("[name='emailCheck']");
    var emailTextFieldValidation = $("[name='email']");

    var regex = /^[\w\-]{2,}@[a-zA-Z]{5,}(\.com|\.ca|\.qc\.ca|\.co|\.uk|\.gov|\.org)$/;
    var emailValid = true;
    if (emailInputField.trim() == "" || !regex.test(emailInputField)){
        checkEmail.removeClass("displayNone");
        emailTextFieldValidation.addClass("invalidInputField");
        checkEmail.html("Invalid Email");
        emailValid = false;
        return emailValid;
    }
    return emailValid;
}














