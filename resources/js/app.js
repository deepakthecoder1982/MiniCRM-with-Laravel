import './bootstrap';
// Toggle the delete confirmation modal
$('.delete-button').click(function () {
    var itemId = $(this).data('item-id');
    var form = $('#deleteForm');
    form.attr('action', form.attr('action').replace('ID', itemId));
    $('#deleteConfirmationModal').modal('show');
});
