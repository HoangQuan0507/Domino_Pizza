<?php

$data = list_code ($conn); 
?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">danh sach san pham</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
    <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    
                    <th>Name</th>
                   
                  
                    <th>Intro</th>
                   
                    <th>Code</th>
                    <th>Saleoff</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($data as $item) { 
                ?>
                <tr>
               
                    <td><?php echo $item["name"] ?></td>
                 
                
              
                    <td><?php echo $item["intro"] ?></td>
                
                    <td><?php echo $item["code"] ?> </td>
                    <td><?php echo $item["saleoff"] ?> </td>
                    <td><a onclick="return acceptDelete ('ban co muon xoa noi dung nay ko?')" href="index.php?p=delete-saleoff&id=<?php echo $item["id"]?>">Delete</a></td>
                    <td><a href="index.php?p=edit-saleoff&id=<?php echo $item["id"]?>">Edit</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
<!-- /.card -->