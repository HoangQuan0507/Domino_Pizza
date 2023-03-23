<?php
$errors = array();

if (isset($_POST["create"])) {


    if (empty($_POST["name"])) {
        $errors[] = "please enter product name.";
    }

    if (empty($_POST["intro"])) {
        $errors[] = "please enter your intro.";
    }
    if (empty($_POST["saleoff"])) {
        $errors[] = "please enter saleoff.";
    }
 
    if (!check_name_code_exists ($conn,$_POST["name"])) {
        $errors[] = "code exists";
     }
     if (!check_code_exists ($conn,$_POST["code"])) {
        $errors[] = "id code exists";
     }

  
    if (empty($_POST["code"])) {
        $errors[] = "please choose your code.";
    }
   
    if(empty($errors)) {
    
        $data["name"] = $_POST["name"];
       
        $data["intro"] = $_POST["intro"];
  
        $data["code"] = $_POST["code"];
        $data["saleoff"] = $_POST["saleoff"];


        create_saleoff ($conn,$data);
        

        header("location:index.php?p=list-saleoff");
        exit();

    }
}
?>

<?php if (!empty($errors)) { ?>
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
    <?php
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }

    ?>
</div>
<?php } ?>

<form action="" method="POST" enctype="multipart/form-data">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Them san pham</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
           

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name category"
                <?php
                    if (isset($_POST["name"])) {
                        echo 'value="'.$_POST["name"].'"';
                    }
                ?>
                >
            </div>
         
         
       

            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" name="intro"><?php
                        if (isset($_POST["intro"])) {
                            echo $_POST["intro"];
                        }
                    ?></textarea>
                    <script>
                        var editor = CKEDITOR.replace('intro');
                        CKFinder.setupCKEditor(editor);
                    </script>
            </div>     
            <div class="form-group">
                <label>Code</label>
                <input type="text" class="form-control" name="code" placeholder="Enter code"
                <?php
                    if (isset($_POST["code"])) {
                        echo 'value="'.$_POST["code"].'"';
                    }
                ?>
                >
            </div>
            <div class="form-group">
                <label>Saleoff</label>
                <input type="text" class="form-control" name="saleoff" placeholder="Enter saleoff"
                <?php
                    if (isset($_POST["saleoff"])) {
                        echo 'value="'.$_POST["saleoff"].'"';
                    }
                ?>
                >
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        <button type="submit" name="create" class="btn btn-primary">Create</button>
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</form>