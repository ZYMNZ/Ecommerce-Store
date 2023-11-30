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
        addErrorInputBorder(titleTextField);
        addErrorInputLabel(titleErrorLabel, "Title is empty");
    }
    else {
        removeErrorInputBorder(titleTextField);
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
        addErrorInputBorder(priceTextField);
        addErrorInputLabel(emptyPriceErrorLabel, "Price is empty");
    }
    else {
        removeErrorInputBorder(priceTextField);
        removeErrorInputLabel(emptyPriceErrorLabel);
    }
    return priceFieldIsEmpty;
}

function checkPriceIsANumber() {
    var priceTextField = $("[name='price']");
    var notANumberPriceErrorLabel = $("[name='notANumberPriceErrorLabel']");

    var isANumberRegEx = /^\d+(\.\d+)?$/;
    var priceTextFieldValIsANumber = isANumberRegEx.test(priceTextField.val());
    if(priceTextFieldValIsANumber) {
        // Remove the error border and the error input label if the text inside the price text
        // Field is a number
       removeErrorInputBorder(priceTextField);
       removeErrorInputLabel(notANumberPriceErrorLabel);
    }
    else {
        // Add an error input border to the price text field and
        // An error text label if the text inside the price is not a number
        // Because we want to reject values that are not numbers
        addErrorInputBorder(priceTextField);
        addErrorInputLabel(notANumberPriceErrorLabel, "Price must be a number");
    }
    return priceTextFieldValIsANumber;
}

function checkCategoryIsNone() {
    var categoryDropdown = $("select[name='category']");
    var categorySelectedValue = categoryDropdown.find(":selected").val();
    var categorySelectedIsNone = false;
    var categoryErrorLabel = $("label[name='categoryErrorLabel']");

    if(categorySelectedValue === "None") {
        categorySelectedIsNone = true;
        addErrorInputBorder(categoryDropdown);
        addErrorInputLabel(categoryErrorLabel, "Please choose a category");
    }
    else {
        removeErrorInputBorder(categoryDropdown);
        removeErrorInputLabel(categoryErrorLabel);
    }
    return categorySelectedIsNone;
}


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

function setUpEventHandlers() {
    $("[name='submit']").click(function(event) {


        // Check values inside the text fields before you submit the form
        var titleIsEmpty = checkTitleTextFieldEmpty();
        var priceIsEmpty = checkPriceTextFieldEmpty();
        var priceIsANumber = checkPriceIsANumber();
        var categorySelectedIsNone = checkCategoryIsNone();
        console.log(titleIsEmpty);
        console.log(priceIsEmpty);
        console.log(priceIsANumber);
        console.log(categorySelectedIsNone);
        if(titleIsEmpty || priceIsEmpty || !priceIsANumber || categorySelectedIsNone) {
            /*
            Prevent the submit from happening
            if the values are wrong
         */
            event.preventDefault();
        }
    }
    );
}