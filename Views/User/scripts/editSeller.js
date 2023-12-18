$(document).ready(
    function (){
        setUpEventHandler();
    }
);


function setUpEventHandler() {
    var editSellerForm = $('#editSellerForm');
    $("[name='submit']").on("click",function(event){
        // event.preventDefault();


        var firstName = $("[name='firstName']");
        var firstNameErrorLabel = $("[name='firstNameErrorLabel']");
        var firstName = firstNameCheck(firstName,firstNameErrorLabel);

        var lastName = $("[name='lastName']");
        var lastNameErrorLabel = $("[name='lastNameErrorLabel']");
        var lastName = lastNameCheck(lastName,lastNameErrorLabel);

        var email = $("[name='email']");
        var emailNameErrorLabel = $("[name='emailErrorLabel']");
        var email = emailCheck(email,emailNameErrorLabel);

        var phoneNum = $("[name='phoneNumber']");
        var phoneIsEmpty = phoneNumberIsEmpty(phoneNum);

        if (phoneIsEmpty || phoneNum.val() === undefined){
            if (!firstName || !lastName) {
                /*
                Prevent the submit from happening
                if the values are wrong
                */
                event.preventDefault();
            }
        }
        else {
            var errorNumberLabel = $("[name='numberErrorLabel']")
            var phoneNumber = phoneNumberCheck(phoneNum,errorNumberLabel);
            if (!phoneNumber || !firstName || !lastName) {

                event.preventDefault();
            }
        }
    })
}