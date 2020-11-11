<div class="container  mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-2 mt-2">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary addBtn" data-toggle="modal" data-target="#formModal">
                Add Student
            </button>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-6">
            <form action="<?= BASEURL?>/students/search" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="search something" name="keyword" id="keyword" autocomplete="off">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit" id="searchBtn">Search</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">    
            <h3>Students List</h3>
            <ul class="list-group">
                <?php foreach ($data['students'] as $student) : ?>
                    <li class="list-group-item">
                        <?= $student['name'] ?>
                        <a class="badge badge-danger float-right ml-2" href="<?= BASEURL ?>/students/delete/<?= $student['id'] ?>" onclick="return confirm('Delete this student ?')">Delete</a>
                        <a class="badge badge-warning float-right ml-2 editBtn" href="<?= BASEURL ?>/students/edit/<?= $student['id'] ?>" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']?>">Edit</a>
                        <a class="badge badge-secondary float-right ml-2" href="<?= BASEURL ?>/students/details/<?= $student['id'] ?>">Details</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Add Student ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL?>/students/add" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name here.." name="name">
            </div>
            <div class="form-group">
                <label for="number">Number</label>
                <input type="number" class="form-control" id="number" placeholder="Enter number here.." name="number">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email here.." name="email">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>