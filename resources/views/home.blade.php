<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="bg-dark text-white py-3">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <!-- Left-aligned brand name -->
      <a class="navbar-brand" href="#">Ecommerce</a>

      <!-- Hamburger menu button for smaller screens -->
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar links -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <!-- Home -->
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <!-- About Us -->
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
          <!-- Category Dropdown -->
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Category
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Category 1</a></li>
              <li><a class="dropdown-item" href="#">Category 2</a></li>
              <li><a class="dropdown-item" href="#">Category 3</a></li>
            </ul>
          </li>
          <!-- Login -->
          <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
          </li>
          <!-- Payment -->
          <li class="nav-item">
            <a class="nav-link" href="welcome">Payment</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
    


<!-- Search form below the navbar -->
<div class="container mt-3">
  <form class="d-flex" role="search">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" width="full">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
</div><br/>
<!-- the card to add image -->

<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="image is added here">
      <div class="card-body">
        <h5 class="card-title">Name Of Product</h5>
        <p class="card-text">. Here is the description.</p>
        <p class="d-inline-flex gap-1">
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Add to Card
        </a>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Buy Product
        </a>
    </p>

      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Name Of Product</h5>
        <p class="card-text">Description of product</p>
        <p class="d-inline-flex gap-1"></p>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Add to Card
        </a>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Buy Product
        </a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Name Of Product</h5>
        <p class="card-text">Description of product.</p>
        <p class="d-inline-flex gap-1"></p>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Add to Card
        </a>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Buy Product
        </a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Name Of Product</h5>
        <p class="card-text">Description of product</p>
        <p class="d-inline-flex gap-1"></p>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Add to Card
        </a>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Buy Product
        </a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Name Of Product</h5>
        <p class="card-text">Description of product</p>
        <p class="d-inline-flex gap-1"></p>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Add to Card
        </a>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Buy Product
        </a>
      </div>
    </div>
  </div>
  <!-- //here start of sinle box -->
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Name Of Product</h5>
        <p class="card-text">Description of product</p>
        <p class="d-inline-flex gap-1"></p>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Add to Card
        </a>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Buy Product
        </a>
      </div>
    </div>
    </div>
    <!-- end of single box -->
</div>
<div>
<footer class="bg-dark text-white text-center py-3 mt-4">
    <p>&copy; {{ date('Y') }} My Website. All rights reserved.</p>
</footer>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
