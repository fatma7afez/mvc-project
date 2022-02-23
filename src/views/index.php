<?php include_once('inc/header.php'); ?>



<nav class="navbar navbar-expand-lg navbar-dark ">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="https://memute.com/wp-content/uploads/2021/07/mvc-part-3.png" width="60px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item text-center">
          <?php if ($_SERVER["QUERY_STRING"] != "") : ?>
            <button class="btn btn-primary">
              <a class="nav-link active" aria-current="page" href="<?= "addData"; ?>">
                Add Product
              </a>
            </button>

          <?php else : ?>
            <button class="btn btn-primary">
            <a class="nav-link active" aria-current="page" href="<?= "home/addData"; ?>">
              Add Product
            </a>
            </button>

          <?php endif; ?>

        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- / display data section/ -->
<header class="text-white text-center py-5">
  <h1 class="h3 text-decoration-underline">All Products</h1>
</header>
<!-- / display data section/ -->


<!-- / display data section/ -->
<div class="container table-responsive">
  <table class="table border shadow rounded p-2 text-center">
    <thead class="text-white">
      <tr>
        <th>Index</th>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Description</th>
        <?php if ($_SERVER["QUERY_STRING"] != "") :; ?>
          <th>Updated</th>
          <th>Delected</th>
        <?php endif; ?>
      </tr>
    </thead>
    <tbody class="text-white">
      <?php foreach ($key as $product) : ?>
        <tr>
          <td><?= $product['id'] ?></td>
          <td><?= $product['productname'] ?></td>
          <td><?= $product['productprice'] ?></td>
          <td><?= $product['productcategory'] ?></td>
          <td><?= $product['productdesc'] ?></td>
          <?php if ($_SERVER["QUERY_STRING"] != "") :; ?>
            <td>
              <a href="editedData/<?= $product['id'] ?>">
                <i class="fas fa-edit text-warning fa-lg point"></i>
              </a>
            </td>

            <td><a href="DeleteData/<?= $product['id'] ?>"><i class="fas fa-trash-alt text-danger fa-lg point"></i></a></td>
          <?php endif; ?>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
<!-- / display data section/ -->



<?php include_once('inc/footer.php'); ?>