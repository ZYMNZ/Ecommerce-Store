<?php
// If the data that was sent contains an array key (assoc array "categories)
// Use the data in that array key to list the categories in the dropdown
// This is because when clicking on a category on the select dropdown,
// It needs to send the products as well as the categories, so it uses an assoc array
$categories = $dataToSend["categories"] ?? $dataToSend;
?>
    <section>
        <form id="category" action="/?controller=product&action=product" method="post">
            <select name="category"  class="categoryNavBar cursorPointer" required>
                <option id="optionNone" value="None" selected disabled>Choose Category</option>
                <?php
                foreach ($categories as $category) {
                    echo "<option value='" . $category->getCategory() . "'>" . $category->getCategory() . "</option>";
                }
                ?>
            </select>
        </form>
    </section>
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

    //IF 'NONE' IT WON'T DO ANYTHING (STILL UNDER TEST)
    // var selectedName = txtName.options[txtName.selectedIndex].text;
    // var selectedName = $('#category').val();
    // console.log(txtName);

    document.querySelector('select[name="category"]').addEventListener('change', function () {
        // console.log("inside blub blub")

        // if(!document.getElementById("optionNone").innerHTML) {
            document.getElementById('category').submit();
        // }

        // }
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
