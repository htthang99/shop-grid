<!-- Delete Modal -->
<div class="modal fade" id="confirmDeleteModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Ward or Commune</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
<!-- Form submit để xoá Ward có ID được submit bởi POST -->
<form method="POST" action="" id="deleteForm">
    <!-- Giá trị ID ward ẩn trên form -->
    <input type="hidden" name="id" id="ward-id" value="" />
    <!-- URL để redirect khi xoá thành công -->
    <input type="hidden" name="return_url" id="return-url" value="" />
    <h4>
        <p class="text-danger" id="delete-message"></p>
    </h4>
</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <!-- Đặt thuộc tính form="deleteForm" để submit form khi nút submit nằm bên ngoài form -->
                <button type="submit" id="btnConfirmDelete" form="deleteForm" class="btn btn-danger">Confirm</button>
            </div>
        </div>
    </div>
</div>