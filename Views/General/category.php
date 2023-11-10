<?php
$categories = $dataToSend;
?>

<?php
global $action, $controllerPrefix;
if ($action == "home" && $controllerPrefix == "home") {
?>
    <section>
        <form id="category" action="/?controller=product&action=product" method="post">
            <select name="category"  class="categoryNavBar cursorPointer">
                <option id="optionNone" value="None" selected>None</option>
                <?php
                foreach ($categories as $category) {
                    echo "<option value='" . $category->getCategory() . "'>" . $category->getCategory() . "</option>";
                }
                ?>
            </select>
        </form>
    </section>
<?php
}
?>

<script>
    /*const form = document.querySelector('form');
    const option = document.querySelector('#optionNone');
    form.addEventListener('submit', (e)=> {
        e.preventDefault()
    })

    if (form) {
        console.log('yes')
    }*/
    // Automatically submit the form when the select value changes
    document.querySelector('select[name="category"]').addEventListener('change', function() {
        document.getElementById('category').submit();
    });
    // Work on later to prevent None from submitting
    /*const form = document.querySelector('form');
    const select = document.querySelector('select');
    const optionNone = document.querySelector('#optionNone');
    form.addEventListener('submit', (e)=> {
        const selectedOption = select.options[select.selectedIndex];
        console.log(selectedOption);
        if (selectedOption !== optionNone) {
            return;
        }
        e.preventDefault();
    })*/

</script>
