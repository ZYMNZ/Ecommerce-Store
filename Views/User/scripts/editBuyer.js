$(document).ready(
    function() {
        // When the document is ready, set up any event handler
        setUpEventHandlers();
    }
);



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