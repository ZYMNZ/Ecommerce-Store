<?php
function modal(string $action, $id): void
{
    $newAction = null;
    if ($action === 'viewBuyers') {
        $newAction = 'deleteBuyer';
    } else {
        $newAction = 'deleteSeller';
    }
?>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Alert</h4>
            </div>
            <div class="modal-body">
                <p>Would you like to delete this user?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <a href='<?php echo "?controller=user&action=$newAction&id=$id" ?>'><button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button></a>
            </div>
        </div>

    </div>
</div>
    <script>
        document.querySelector('.btn-primary').addEventListener('click', () => {
            window.location.href = '<?php echo "/?controller=user&action=$newAction&id=$id" ?>';
        });
    </script>
<?php
}
?>

