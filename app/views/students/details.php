<div class="card mt-5" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Name: <?= $data['students']['name']?></h5>
    <h6 class="card-subtitle mb-2 text-muted">Number: <?= $data['students']['number']?></h6>
    <p class="card-text">Email: <?= $data['students']['email']?></p>
    <a href="<?= BASEURL?>/students" class="card-link"> <= Back</a>
  </div>
</div>