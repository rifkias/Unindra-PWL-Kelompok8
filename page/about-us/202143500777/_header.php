<nav class="navbar navbar-expand-lg bg-secondary sticky-top">
  <div class="container-fluid bg-dark">
    <a class="navbar-brand text-light" href="<?php echo $uri . "?page=biodata" ?>">
    <img src="./img/Unindra PGRI.png" alt="Logo" width="40" height="34" class="d-inline-block align-text-top">
    Mohammad lutfy Firmansyah</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item ">
          <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="<?php echo $uri . "?page=biodata" ?>">Biodata</a>
        </li>
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle text-light " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Materi
          </a>
          <ul class="dropdown-menu bg-light text-light">
            <li><a class="dropdown-item " href="#">Pertemuan 2</a></li>
            <li><a class="dropdown-item " href="#">Pertemuan 3</a></li>
            <!-- <li><hr class="dropdown-divider"></li> -->
            <li><a class="dropdown-item " href="#">Pertemuan 4</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light " aria-disabled="true">Tugas</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>