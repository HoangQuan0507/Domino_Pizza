<?php
$data = list_user ($conn);
?>

<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">danh sach thanh vien</h3>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Level(s)</th>
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
                    <td><?php echo $stt ?></td>
                    <td><?php echo $item["name"] ?></td>
                    <td>
                        <?php
                            if ($item["level"] == 1) {
                                echo "<spam class='text-danger'>Admin</span>";
                            } else {
                                echo "Menmber";
                            }
                        ?>
                    </td>
                    <td><a onclick="return acceptDelete ('ban co muon xoa noi dung nay ko?')" href="index.php?p=delete-user&id=<?php echo $item["id"]?>">Delete</a></td>
                    <td><a href="index.php?p=edit-user&id=<?php echo $item["id"]?>">Edit</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Footer
    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->