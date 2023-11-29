<script>
    // Use the PHP value directly in the JavaScript code
    document.querySelector('button[data-toggle="modal"]').addEventListener('click', () => {
        var currentId = this.closest('tr').querySelector('#userId').value;
        console.log(currentId);
    });

</script>

<?php
include_once 'Views/General/modal.php';
modal('deleteSeller', $id);
include_once "Views/General/footer.php";
?>