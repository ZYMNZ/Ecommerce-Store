$(document).ready(
    function() {

        setUpEventHandlers();
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


function checkEmailValidation(){
    var emailInputField = $("[name='email']").val();

    // var regex =
}
















