$(document).ready(
    function (){
        // when the doc is ready, this function will get triggered
        setUpEventHandlers();
    }
);

function phoneNumberCheck() {
    var password = $("[name='phoneNumber']");
    var notANumberErrorLabel = $("[name='notANumberErrorLabel']");

    var regex = /^[0-9]{10}$/;

    var phoneNumberValid = regex.test(password.val());
    console.log(phoneNumberValid);
    var check = false
    if(phoneNumberValid) {
        check = true;
        removeErrorInputBorder(password);
        removeErrorInputLabel(notANumberErrorLabel);
    }
    else {
        addErrorInputBorder(password);
        addErrorInputLabel(notANumberErrorLabel, "PhoneNumber must be a number,must be 10 digits");
    }
    return check;
}

function firstNameCheck() {
    var firstName = $("[name='firstName']");
    var firstNameErrorLabel = $("[name='firstNameErrorLabel']");

    var regex = /^[A-Za-z]{0,50}$/;

    var firstNameValid = regex.test(firstName.val());
    var check = false;
    console.log(firstNameValid);
    if(firstNameValid) {
        check = true;
        removeErrorInputBorder(firstName);
        removeErrorInputLabel(firstNameErrorLabel);
    }
    else {
        addErrorInputBorder(firstName);
        addErrorInputLabel(firstNameErrorLabel, "firstName must be a letters only and max of 50 characters");
    }
    return check;
}


function lastNameCheck() {
    var lastName = $("[name='lastName']");
    var lastNameErrorLabel = $("[name='lastNameErrorLabel']");

    var regex = /^[A-Za-z]{0,50}$/;
    var check = false;
    var lastNameValid = regex.test(lastName.val());
    console.log(lastNameValid);
    if(lastNameValid) {
        check=true;
        removeErrorInputBorder(lastName);
        removeErrorInputLabel(lastNameErrorLabel);
    }
    else {

        addErrorInputBorder(lastName);
        addErrorInputLabel(lastNameErrorLabel, "lastName must be a letters only and max of 50 characters");
    }
    return check;
}


 function setUpEventHandlers() {
    var productForm = $("#formPersonalDetails");
    $("[name='submit']").on("click", function (event) {
            event.preventDefault();
            // Check values inside the text fields before you submit the form

            var phoneNumber = phoneNumberCheck();
            var firstName = firstNameCheck();
            var lastName = lastNameCheck();

            if (phoneNumber && firstName && lastName) {
                /*
                Prevent the submit from happening
                if the values are wrong
                */
                $(this).off("click");
                productForm.submit();
            }
        }
    );
}