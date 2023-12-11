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

async function checkFileIsValid()
{
    var fileInput = $("[name='productImage']")[0];
    var fileIsValid = false;
    if(fileInput.files)
    {
        const UPLOAD_IMAGE_MAX_SIZE = 30_000_000;
        /*
                Through the hexadecimal file headers, check for the type of the file
                because we do not want to allow other file types
                https://en.wikipedia.org/wiki/List_of_file_signatures
        */
        // Accept PNG, JPG, JPEG in this order
        const IMAGE_FILE_TYPES_ALLOWED = [
            "89504e47",
            "ffd8ffe0",
            "ffd8ffe1"
        ];
        var fileSizeIsValid = checkFileSize(fileInput, UPLOAD_IMAGE_MAX_SIZE);
        var fileTypeIsValid = await checkFileType(fileInput, IMAGE_FILE_TYPES_ALLOWED);
        fileIsValid = fileSizeIsValid && fileTypeIsValid;
    }
    else {
        fileIsValid = false;
    }
    return fileIsValid;
}



function getFileHeaderFromWords(arrOfWords)
{
    var fileHeader = "";
    for(var arrWordsIndex = 0; arrWordsIndex < arrOfWords.length; ++arrWordsIndex)
    {
        // Turn the bytes into hexadecimal to later determine the file type through the hex notation
        fileHeader += arrOfWords[arrWordsIndex].toString(16);
    }
    return fileHeader;
}

async function checkFileType(fileInputElement, fileTypes) {
    var fileTypeIsValid = false;
    if (fileInputElement.value === "") {
        fileTypeIsValid = true;
        return fileTypeIsValid;
    }


    // Check if the browser supports File and Blob in the File API
    if (window.FileReader && window.Blob) {

        var imageBlob = fileInputElement.files[0];
        var fileReader = new FileReader();


        var blobArrayBuffer = await imageBlob.arrayBuffer();

            // Take the 4 first bytes of the file to check the header of the file
            // This header will help us determine the type of the file
            var arrOfWords = (new Uint8Array(blobArrayBuffer)).subarray(0, 4);

            /*Transform the first 4 bytes into hexadecimal*/
            var fileHeader = getFileHeaderFromWords(arrOfWords);
            fileTypeIsValid = false;

            var fileSizeErrorLabel = $("[name='fileTypeErrorLabel']");
            for (var fileTypeIndex = 0; fileTypeIndex < fileTypes.length; ++fileTypeIndex) {
                if (fileHeader === fileTypes[fileTypeIndex]) {
                    fileTypeIsValid = true;
                    removeErrorInputLabel(fileSizeErrorLabel);
                    break;
                }
            }
            if (!fileTypeIsValid) {
                addErrorInputLabel(fileSizeErrorLabel, "The file needs to be of type .PNG, .JPG or .JPEG");
            }
            return fileTypeIsValid;
    } else {
        fileTypeIsValid = false;
        console.error("This browser does not support the File and Blob.");
        return fileTypeIsValid;
    }
}



function checkFileSize(fileInputElement, uploadImageMaxSize)
{
    var fileIsCorrectSize = true;

    // If the file input element has no file sent,
    // just return that the file is of correct size (accepts no file uploaded)
    if(fileInputElement.value === "")
    {
        return fileIsCorrectSize;
    }
    var fileSizeErrorLabel = $("[name='fileSizeErrorLabel']");
    if(fileInputElement.files[0].size > uploadImageMaxSize) {
        fileIsCorrectSize = false;

        addErrorInputLabel(fileSizeErrorLabel, "The image needs to be smaller or equal to 30 MB");
    }
    else {
        removeErrorInputLabel(fileSizeErrorLabel);
    }

    return fileIsCorrectSize;
}

async function setUpEventHandlers() {
    var productForm = $("#productFormId");
    $("[name='submit']").on("click", async function (event) {
        event.preventDefault();
        // Check values inside the text fields before you submit the form
        var titleTextField = $("[name='title']");
        var titleErrorLabel = $("[name='titleErrorLabel']");
        var titleIsEmpty = checkTextFieldEmpty(titleTextField, titleErrorLabel, "Title is empty");

        var priceTextField = $("[name='price']");
        var emptyPriceErrorLabel = $("[name='emptyPriceErrorLabel']");
        var priceIsEmpty = checkTextFieldEmpty(priceTextField, emptyPriceErrorLabel, "Price is empty");
        var priceIsANumber = checkPriceIsANumber();
        var categorySelectedIsNone = checkCategoryIsNone();


        var fileIsValid = await checkFileIsValid();


        if (!titleIsEmpty && !priceIsEmpty && priceIsANumber && !categorySelectedIsNone && fileIsValid) {
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