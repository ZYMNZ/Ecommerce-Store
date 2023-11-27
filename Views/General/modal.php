<?php
function modal(string $action, $id): void
{
?>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><a href='<?php echo "/?controller=user&action=$action&id=$id" ?>'>Yes</a></button>
            </div>
        </div>

    </div>
</div>
    <script>
        document.querySelector('.btn-primary').addEventListener('click', () => {
            window.location.href = '<?php echo "/?controller=user&action=$action&id=$id" ?>';
        });
    </script>
<?php
}
?>

