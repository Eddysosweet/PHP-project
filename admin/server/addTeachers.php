
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-2xl" id="exampleModalLabel">Add Teachers</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <form method="post" class="row g-3" enctype="multipart/form-data">
              <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Name" aria-label="First name">
              </div>
              <div class="col">
                <input type="file" name="avatar" class="form-control" placeholder="Last name" aria-label="Last name">
              </div>
              <div class="col-12">
                <button type="submit" name="add" class="btn text-white bg-success">Sign in</button>
              </div>
            </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white bg-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
      </div>
    </div>
  </div>
</div>