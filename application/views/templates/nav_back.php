<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Nom resto #<? echo ($this->session->etabId)??''; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Menus</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Produits</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Personnalisation</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Catégories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">cat1</a>
          <a class="dropdown-item" href="#">cat2</a>
          <a class="dropdown-item" href="#">cat3</a>
        </div>
      </li>
    </ul>
  </div>
</nav>