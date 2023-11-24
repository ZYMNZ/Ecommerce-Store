$(document).ready(
    function() {
        // When the document is ready, set up any event handler
        setUpEventHandlers();
    }
);

function checkTitleTextFieldEmpty() {
    var titleTextField = $("[name='title']");
    var titleErrorLabel = $("[name='titleErrorLabel']");
    var titleFieldIsEmpty = false;

    if(titleTextField.val().trim().length === 0) {
        /*
        Check if the value inside the title text field is empty
        because the title column inside the database is not null
         */
        titleFieldIsEmpty = true;
        addErrorTextFieldBorder(titleTextField);
        addErrorInputLabel(titleErrorLabel, "Title is empty");
    }
    else {
        removeErrorTextFieldBorder(titleTextField);
        removeErrorInputLabel(titleErrorLabel);
    }
    return titleFieldIsEmpty;
}

function checkPriceTextFieldEmpty() {
    var priceTextField = $("[name='price']");
    var emptyPriceErrorLabel = $("[name='emptyPriceErrorLabel']");
    var priceFieldIsEmpty = false;

    if(priceTextField.val().trim().length === 0) {
        // If the text inside the price text field is empty
        // Reject the input because the price column in the database is
        // not null
        priceFieldIsEmpty = true;
        addErrorTextFieldBorder(priceTextField);
        addErrorInputLabel(emptyPriceErrorLabel, "Price is empty");
    }
    else {
        removeErrorTextFieldBorder(priceTextField);
        removeErrorInputLabel(emptyPriceErrorLabel);
    }
    return priceFieldIsEmpty;
}

function checkPriceIsNotANumber() {
    var priceTextField = $("[name='price']");
    var notANumberPriceErrorLabel = $("[name='notANumberPriceErrorLabel']");

    var isANumberRegEx = /^\d+$/;
    var priceTextFieldValIsANumber = isANumberRegEx.test(priceTextField.val());
    if(priceTextFieldValIsANumber) {
        // Remove the error border and the error input label if the text inside the price text
        // Field is a number
       removeErrorTextFieldBorder(priceTextField);
       removeErrorInputLabel(notANumberPriceErrorLabel);
    }
    else {
        // Add an error input border to the price text field and
        // An error text label if the text inside the price is not a number
        // Because we want to reject values that are not numbers
        addErrorTextFieldBorder(priceTextField);
        addErrorInputLabel(notANumberPriceErrorLabel, "Price must be a number");
    }
    return priceTextFieldValIsANumber;
}

function checkCategoryIsNotNone() {
    
}
function addErrorTextFieldBorder(inputErrorField) {
    // Add the red border around the input field
    inputErrorField.addClass("invalidInputField");
}

function addErrorInputLabel(inputErrorLabel, errorLabelText = "") {
    inputErrorLabel.removeClass("displayNone");

    if(errorLabelText != "") {
        inputErrorLabel.html(errorLabelText);
    }
}

function removeErrorTextFieldBorder(inputErrorField) {
    inputErrorField.removeClass("invalidInputField");
}

function removeErrorInputLabel(inputTextLabel) {
    inputTextLabel.addClass("displayNone");
}

function setUpEventHandlers() {
    $("[name='submit']").click(function(event) {
        /*
            Prevent the submit from happening
            because we need to check the validity of the values
            inside the text fields
         */
        event.preventDefault();
        // Check values inside the text fields before you submit the form
        var titleIsEmpty = checkTitleTextFieldEmpty();
        var priceIsEmpty = checkPriceTextFieldEmpty();
        var priceIsNotANumber = checkPriceIsNotANumber();
    }
    );
}