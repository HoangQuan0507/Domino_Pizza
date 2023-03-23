<?php
$data = list_id_product ($conn);
?>

<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">danh sach cỡ size</h3>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Product</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stt = 0;
                foreach ($data as $item) { 
                    $stt++; 
                ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $item["type"] ?></td>
                    <td><?php echo $item["product_name"] ?></td>
                    <td><?php echo $item["size_name"] ?></td>
                    <td><?php echo number_format($item["price"],0,"",".") ?></td>
                    <td><a onclick="return acceptDelete ('ban co muon xoa noi dung nay ko?')" href="index.php?p=delete-product-size&id=<?php echo $item["id"]?>">Delete</a></td>
                    <td><a href="index.php?p=edit-product-size&id=<?php echo $item["id"]?>">Edit</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
