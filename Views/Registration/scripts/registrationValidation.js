$(document).ready(
    function() {

        setUpEventHandlers();
        executeEmailValidation();
    }
);

function doPasswordsMatch() {
    var passwordInputField = $("[name='password']");
    var confirmPasswordInputField = $("[name='confirmPassword']");
    var confirmPasswordErrorInputLabel = $("[name='notMatchingPasswordLabel']");

    var passwordsMatch = false;
    if(passwordInputField.val() == confirmPasswordInputField.val()) {
        confirmPasswordInputField.removeClass("invalidInputField");
        confirmPasswordErrorInputLabel.addClass("displayNone");


        passwordsMatch = true;
    }
    else {
        confirmPasswordInputField.addClass("invalidInputField");
        confirmPasswordErrorInputLabel.removeClass("displayNone");

    }

    return passwordsMatch;
}


function setUpEventHandlers() {
    var registrationSignUpButton = $("[name='signUp']");
    var registrationForm = $("#registrationForm");
    registrationForm.on("submit", function(event) {
        // Prevent form submission to check if the passwords match
        event.preventDefault();
        var passwordsMatch = doPasswordsMatch();

        // If the passwords match, submit the form
        if(passwordsMatch) {
            // Remove the submit event before submitting
            $(this).off("submit").submit();
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
    if (emailInputField = "" | !regex){
        checkEmail.removeClass("displayNone");
        emailTextFieldValidation.addClass("invalidInputField");
        checkEmail.html("Invalid Email");
        emailValid = false;
        return emailValid;
    }
    return emailValid;
}

function executeEmailValidation(){
    var form = $("#registrationForm");
    form.on("submit",function (event) {
        event.preventDefault();
        var validation = checkEmailValidation();

        if (validation){
            $(this).off("submit").submit();
        }
    })
}















