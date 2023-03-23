<?php
$data = list_product ($conn); 
?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">danh sach san pham</h3>
    </div>
    <div class="card-body">
    <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Intro</th>
                    <th>Status</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($data as $item) { 
                ?>
                <tr>
                    <td><img src="public/<?php echo $item["image"]; ?>" width="100px" /></td>
                    <td><?php echo $item["name"] ?></td>
                    <td><?php echo $item["size_name"] ?></td>
                    <td><?php echo number_format($item["price"],0,"",".") ?></td>
                    <td><?php echo $item["type"] ?></td>
                    <td><?php echo $item["intro"] ?></td>
                    <td>
                        <?php
                            if ($item["status"] == 1) {
                                echo 'hien';
                            } else {
                                echo 'an';
                            }
                        ?>
                    </td>
                    <td><?php echo $item["category_name"] ?> </td>
                    <td><a onclick="return acceptDelete ('ban co muon xoa noi dung nay ko?')" href="index.php?p=delete-product&id=<?php echo $item["id"]?>">Delete</a></td>
                    <td><a href="index.php?p=edit-product&id=<?php echo $item["id"]?>">Edit</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
<!-- /.card -->