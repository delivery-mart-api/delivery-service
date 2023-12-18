<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url('/'); ?>">HeMart</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <!-- <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= base_url('/'); ?>">Home</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/transaction'); ?>">My Transaction</a>
            </li>
        </ul>
        
    </div>
    <div class="d-flex justify-content-end">
        <a class="btn btn-success my-2 my-sm-0 mx-1"href="<?= base_url('/profile'); ?>" type="submit">My Profile</a>
        <form class="form-inline my-2 my-lg-0 mx-1" action="/logout" method="POST">
          <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
        </form>
    </div>
  </div>
</nav>