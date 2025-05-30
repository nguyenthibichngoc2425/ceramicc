<!-- Delete Modal -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="deleteLabel"><b>Deleting...</b></h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="products_delete.php">
        <input type="hidden" class="prodid" name="id">
        <div class="modal-body text-center">
          <p>DELETE PRODUCT</p>
          <h2 class="font-weight-bold name"></h2>
          <p class="text-warning">This action cannot be undone.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">
            <i class="fa fa-times"></i> Close
          </button>
          <button type="submit" class="btn btn-danger btn-flat" name="delete">
            <i class="fa fa-trash"></i> Delete
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="editLabel"><b>Edit Product</b></h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="products_edit.php">
        <input type="hidden" class="prodid" name="id">
        <div class="modal-body">
          <div class="form-group row">
            <label for="edit_name" class="col-sm-2 col-form-label font-weight-bold">Name</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="edit_name" name="name" placeholder="Product name" required>
            </div>

            <label for="edit_category" class="col-sm-2 col-form-label font-weight-bold">Category</label>
            <div class="col-sm-4">
              <select class="form-control" id="edit_category" name="category" required>
                <option selected disabled id="catselected">- Select Category -</option>
                <!-- Options should be loaded dynamically -->
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="edit_price" class="col-sm-2 col-form-label font-weight-bold">Price</label>
            <div class="col-sm-4">
              <input type="number" min="0" step="0.01" class="form-control" id="edit_price" name="price" placeholder="0.00" required>
            </div>
          </div>

          <div class="form-group">
            <label for="editor2" class="font-weight-bold">Description</label>
            <textarea id="editor2" name="description" rows="6" class="form-control" placeholder="Enter product description..." required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">
            <i class="fa fa-times"></i> Close
          </button>
          <button type="submit" class="btn btn-success btn-flat" name="edit">
            <i class="fa fa-check-square-o"></i> Update
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
