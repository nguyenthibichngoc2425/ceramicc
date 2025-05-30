<!-- Description Modal -->
<div class="modal fade" id="description" tabindex="-1" aria-labelledby="descriptionLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="descriptionLabel"><b><span class="name"></span></b></h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="desc"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">
          <i class="fa fa-times"></i> Close
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Add New Product Modal -->
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="addnewLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="addnewLabel"><b>Add New Product</b></h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="products_add.php" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label font-weight-bold">Name</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="name" name="name" placeholder="Product name" required>
            </div>

            <label for="category" class="col-sm-2 col-form-label font-weight-bold">Category</label>
            <div class="col-sm-4">
              <select class="form-control" id="category" name="category" required>
                <option value="" selected disabled>- Select Category -</option>
                <!-- Options should be loaded dynamically -->
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label font-weight-bold">Price</label>
            <div class="col-sm-4">
              <input type="number" min="0" step="0.01" class="form-control" id="price" name="price" placeholder="0.00" required>
            </div>

            <label for="photo" class="col-sm-2 col-form-label font-weight-bold">Photo</label>
            <div class="col-sm-4">
              <input type="file" id="photo" name="photo" accept="image/*" class="form-control-file">
              <small class="form-text text-muted">Optional. Upload product image.</small>
            </div>
          </div>

          <div class="form-group">
            <label for="editor1" class="font-weight-bold">Description</label>
            <textarea id="editor1" name="description" rows="6" class="form-control" placeholder="Enter product description..." required></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">
            <i class="fa fa-times"></i> Close
          </button>
          <button type="submit" class="btn btn-primary btn-flat" name="add">
            <i class="fa fa-save"></i> Save
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Update Photo Modal -->
<div class="modal fade" id="edit_photo" tabindex="-1" aria-labelledby="editPhotoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title" id="editPhotoLabel"><b><span class="name"></span></b></h5>
        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="products_photo.php" enctype="multipart/form-data">
        <input type="hidden" class="prodid" name="id">
        <div class="modal-body">
          <div class="form-group row">
            <label for="photo" class="col-sm-3 col-form-label font-weight-bold">Photo</label>
            <div class="col-sm-9">
              <input type="file" id="photo" name="photo" accept="image/*" class="form-control-file" required>
              <small class="form-text text-muted">Choose a new product photo</small>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">
            <i class="fa fa-times"></i> Close
          </button>
          <button type="submit" class="btn btn-success btn-flat" name="upload">
            <i class="fa fa-check-square-o"></i> Update
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
