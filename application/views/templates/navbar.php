<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <img src="<?= base_url() ?>assets/images/demo/shards-logo.svg" alt="Example Navbar 1" class="mr-2" height="30">
  <a class="navbar-brand" href="#">GO-GRAB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown-6" aria-controls="navbarNavDropdown-6"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse mr-auto" id="navbarNavDropdown-6">
    <ul class="navbar-nav mr-auto">
      
      <!-- USERS MENU -->
      <?php if($this->session->userdata('data')['level'] == 'User') : ?>
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url() ?>users/home">HOME
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url() ?>pesan/motor">GROB-BIKE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url() ?>pesan/mobil">GROB-CAR</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">MY ORDER</a>
        </li>
      <!-- USERS MENU -->

      <!-- DRIVER MENU -->
      <?php elseif($this->session->userdata('data')['level'] == 'Driver') : ?>
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url() ?>users/home">HOME
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">MY ORDER</a>
        </li>
      <!-- DRIVER MENU -->
      
      <!-- ADMINISTRATOR MENU -->
      <?php else : ?>
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url() ?>dashboard">DASHBOARD
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink-6" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            SETTINGS
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink-6">
            <a class="dropdown-item" href="<?= base_url() ?>pengaturan/harga">Price</a>
            <a class="dropdown-item" href="<?= base_url() ?>pengaturan/level">Level</a>
            <a class="dropdown-item" href="<?= base_url() ?>pengaturan/pengguna">Users</a>
            <a class="dropdown-item" href="#">Driver</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink-6" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            REPORT
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink-6">
            <a class="dropdown-item" href="#">Transaction</a>
          </div>
        </li>
      <?php endif; ?>
      <!-- ADMINISTRATOR MENU -->

      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="https://designrevision.com" id="navbarDropdownMenuLink-6" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Services
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink-6">
          <a class="dropdown-item" href="#">Design</a>
          <a class="dropdown-item" href="#">Development</a>
          <a class="dropdown-item" href="#">Marketing</a>
        </div>
      </li> -->

    </ul>

    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink-6" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i> &nbsp; <?= $this->session->userdata('data')['nama'] ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink-6">
          <a class="dropdown-item" href="<?= base_url() ?>profile">Profile</a>
          <a class="dropdown-item" href="#">History</a>
          <a class="dropdown-item" href="#" onclick="out()">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>