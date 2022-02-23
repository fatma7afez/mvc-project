<?php include_once('inc/header.php'); ?>

<div class="d-flex vh-100 align-items-center text-white">
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
        <form action="../updatedData" method="post">
            <div class="mb-3">
                <label for="pName" class="form-label">Product Name : <span class="text-danger"> * </span></label>
                <input type="text" class="form-control" id="pName" name="productname" value="<?=$product['productname'];?>">
            </div>
            <div class="mb-3">
                <label for="pPrice" class="form-label">Product Price : <span class="text-danger"> * </span></label>
                <input type="text" class="form-control" id="pPrice" name="productprice"  value="<?=$product['productprice'];?>" >
            </div>
            <div class="mb-3">
                <label for="pCategory" class="form-label">Product Category : <span class="text-danger"> * </span></label>
                <input type="text" class="form-control" id="pCategory" name="productcategory"  value="<?=$product['productcategory'];?>">
            </div>
            <div class="mb-3">
                <label for="pDesc" class="form-label">Product Description : <span class="text-danger"> * </span></label>
                <textarea class="form-control" id="pDesc" name="productdesc"><?=$product['productdesc'];?>"</textarea>
            </div>
            <input type="hidden" name="id"  value="<?= $product['id'];?>">
            <button type="submit" class="btn btn-outline-light float-end">updated</button>
        </form>
    </section>
</div>
<!-- ../ form data section/ -->

<?php include_once('inc/footer.php'); ?>