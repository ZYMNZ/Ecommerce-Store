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
        if (passwordInputField.val() == confirmPasswordInputField.val()) {
            confirmPasswordInputField.removeClass("invalidInputField");
            confirmPasswordErrorInputLabel.addClass("displayNone");


            passwordsMatch = true;
        }
    // }
    else {
        confirmPasswordInputField.addClass("invalidInputField");
        confirmPasswordErrorInputLabel.removeClass("displayNone");

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
        console.log("passs " + passwordsMatch);
        console.log( "email " + emailValid);
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
        console.log("inside if");
        return emailValid;
    }
    return emailValid;
}














