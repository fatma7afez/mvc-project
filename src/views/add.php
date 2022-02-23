<?php include_once('inc/header.php'); ?>

<nav class="navbar navbar-expand-lg navbar-dark "> -->
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
          <a class="nav-link active" aria-current="page" href="<?= "addData"?>">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav> 

<div class="mx-auto text-white">
    <section class="container mx-auto shadow rounded p-5">

        <!-- / header section/ -->
        <header class="text-center">
            <h1 class="h3 text-decoration-underline">Products Store<h1>
        </header>
        <!-- ../ header section/ -->

        <!-- /error section/ -->
        <?php if (!empty($_COOKIE['alert'])) : ?>
            <div class="alert alert-danger" role="alert" style="overflow-y:auto;">
                <?php $errors = json_decode($_COOKIE['alert'], true); ?>
                <?php foreach ($errors as $error) : ?>
                    <p><?= $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif ?>
        <!-- ../error section/ -->

        <!-- / form data section/ -->
        <form action="storeData" method="post">
            <div class="mb-3">
                <label for="pName" class="form-label">Product Name : <span class="text-danger"> * </span></label>
                <input type="text" class="form-control" id="pName" name="productname">
            </div>
            <div class="mb-3">
                <label for="pPrice" class="form-label">Product Price : <span class="text-danger"> * </span></label>
                <input type="text" class="form-control" id="pPrice" name="productprice">
            </div>
            <div class="mb-3">
                <label for="pCategory" class="form-label">Product Category : <span class="text-danger"> * </span></label>
                <input type="text" class="form-control" id="pCategory" name="productcategory">
            </div>
            <div class="mb-3">
                <label for="pDesc" class="form-label">Product Description : <span class="text-danger"> * </span></label>
                <textarea class="form-control" id="pDesc" name="productdesc"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-light float-end">Submit</button>
        </form>
    </section>
</div>
<!-- ../ form data section/ -->

<?php include_once('inc/footer.php'); ?>