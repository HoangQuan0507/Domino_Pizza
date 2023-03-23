<?php
$data = list_type ($conn);
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
                    <th>Quality</th>
                    <th>Cart</th>
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
                    <td><?php echo $item["quality"] ?></td>
                    <td><?php echo $item["name"] ?></td>
                    <td><a onclick="return acceptDelete ('ban co muon xoa noi dung nay ko?')" href="index.php?p=delete-detail-cart&id=<?php echo $item["id"]?>">Delete</a></td>
                    <td><a href="index.php?p=edit-detail-cart&id=<?php echo $item["id"]?>">Edit</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>