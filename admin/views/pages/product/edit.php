<?php include 'views/partials/header.php'; ?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Product</h4>
                    <p class="card-description">
                        Edit product
                    </p>
                    <form class="forms-sample" method="POST" action="edit-product?id=<?php echo $_GET['id']  ?>" enctype="multipart/form-data">
                        <?php if (!empty($err)): ?>
                            <div class="alert alert-danger">
                                <?php foreach ($err as $key => $value): ?>
                                    <li><?php echo $value; ?></li>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" 
                            value="<?php echo isset($productData['name']) ?  $productData['name'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="thumbnail" value="<?php echo  $productData['image']; ?>" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" name="thumbnail" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image" value="<?php echo isset($productData['image']) ?  $productData['image'] : ''; ?>">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                           <label for="id_category">Category</label>
                             <select name="id_category" id="id_category" class="form-control">
                              <?php
                             $categories = Database::query("SELECT * FROM categories");
                                 while ($category = $categories->fetch_assoc()) {
                                   $selected = isset($productData) && $productData['id_category'] == $category['id'] ? 'selected' : '';
                                   echo "<option value='{$category['id']}' $selected>{$category['name']}</option>";
                                    }
                                ?>
                               </select>
                        </div>
                        <div class="form-group">
                            <label for="status">status</label>
                            <input type="number" class="form-control" name="status" id="status" placeholder="status"
                                value="<?php echo $data['status']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" id="price" placeholder="Price"
                                value="<?php echo $data['price']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="price_old">price_old</label>
                            <input type="number" class="form-control" name="price_old" id="price_old" placeholder="price_old"
                                value="<?php echo $data['price_old']; ?>">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="product"><span class="btn btn-light">Cancel</span></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="views/vendors/js/vendor.bundle.base.js"></script>
<script src="views/vendors/typeahead.js/typeahead.bundle.min.js"></script>
<script src="views/vendors/select2/select2.min.js"></script>


<script src="views/js/file-upload.js"></script>
<script src="views/js/typeahead.js"></script>
<script src="views/js/select2.js"></script>




<?php include_once 'views/partials/_footer.php'; ?>