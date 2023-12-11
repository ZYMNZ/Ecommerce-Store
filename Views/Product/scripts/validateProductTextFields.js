$(document).ready(
    function() {
        // When the document is ready, set up any event handler
        setUpEventHandlers();
    }
);

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

function setUpEventHandlers() {
    $("[name='submit']").click(function(event) {

        // Check values inside the text fields before you submit the form
        var titleTextField = $("[name='title']");
        var titleErrorLabel = $("[name='titleErrorLabel']");
        var titleIsEmpty = checkTextFieldEmpty(titleTextField, titleErrorLabel, "Title is empty");

        var priceTextField = $("[name='price']");
        var emptyPriceErrorLabel = $("[name='emptyPriceErrorLabel']");
        var priceIsEmpty = checkTextFieldEmpty(priceTextField, emptyPriceErrorLabel, "Price is empty");
        var priceIsANumber = checkPriceIsANumber();
        var categorySelectedIsNone = checkCategoryIsNone();

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