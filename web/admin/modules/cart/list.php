<?php
$data = list_cart ($conn); 
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
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Note</th>
                    <th>Edit</th>
                    <th>Delete</th>
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
                    <td><?php echo $item["name"] ?></td>
                    <td><?php echo $item["email"]?></td>
                    <td><?php echo $item["address"] ?> </td>
                    <td><?php echo $item["note"] ?> </td>
                    <td><a onclick="return acceptDelete ('ban co muon xoa noi dung nay ko?')" href="index.php?p=delete-cart&id=<?php echo $item["id"]?>">Delete</a></td>
                    <td><a href="index.php?p=edit-cart&id=<?php echo $item["id"]?>">Edit</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
<!-- /.card -->