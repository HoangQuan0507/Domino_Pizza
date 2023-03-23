<?php
function check_user_exists ($conn,$name) {
    $stmt_check = $conn->prepare("SELECT * FROM user WHERE name = :name");
    $stmt_check->bindparam(":name",$name,PDO::PARAM_STR);
    $stmt_check->execute();
    $count = $stmt_check->rowcount();

    if ($count >= 1) {
        return false;
    }

    return true;
}

function create_user ($conn,$data) {
    $stmt = $conn->prepare("INSERT INTO user (name,password,level) 
    VALUES (:name,:password,:level)");
    $stmt->bindparam(":name",$data["name"],PDO::PARAM_STR);
    $stmt->bindparam(":password",$data["password"],PDO::PARAM_STR);
    $stmt->bindparam(":level",$data["level"],PDO::PARAM_INT);
    $stmt->execute();
}

function list_user ($conn) {
    $stmt = $conn->prepare("SELECT * FROM user ORDER BY id  DESC");
    $stmt->execute();
    $data = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $data;
}

function show_old_data_user ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM user WHERE id = :id");
    $stmt->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data; 
}
function show_old_data_product_size ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM product_size WHERE id = :id");
    $stmt->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data; 
}
function edit_user_have_pass ($conn,$data) {
    $stmt = $conn->prepare("UPDATE user SET password = :password, level = :level WHERE id = :id");
    $stmt->bindparam(":password",$data["password"],PDO::PARAM_STR);
    $stmt->bindparam(":level",$data["level"],PDO::PARAM_INT);
    $stmt->bindparam(":id",$data["id"],PDO::PARAM_INT);
    $stmt->execute();
}

function edit_user_no_pass ($conn,$data) {
    $stmt = $conn->prepare("UPDATE user SET level = :level WHERE id = :id");
    $stmt->bindparam(":level",$data["level"],PDO::PARAM_INT);
    $stmt->bindparam(":id",$data["id"],PDO::PARAM_INT);
    $stmt->execute();
}

function delete_user ($conn,$id) {
    $stmt = $conn->prepare("DELETE FROM user WHERE id = :id");
    $stmt->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
}

function check_category_exists ($conn,$name) {
    $stmt_check = $conn->prepare("SELECT * FROM category WHERE name = :name");
    $stmt_check->bindparam(":name",$name,PDO::PARAM_STR);
    $stmt_check->execute();
    $count = $stmt_check->rowcount();

    if ($count >= 1) {
        return false;
    }

    return true;
}

function create_category ($conn,$data) {
    $stmt = $conn->prepare("INSERT INTO category (name,parent) 
    VALUES (:name,:parent)");
    $stmt->bindparam(":name",$data["name"],PDO::PARAM_STR);
    $stmt->bindparam(":parent",$data["parent"],PDO::PARAM_STR);
    $stmt->execute();
}

function list_category ($conn) {
    $stmt = $conn->prepare("SELECT * FROM category ORDER BY id  DESC");
    $stmt->execute();
    $data = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $data;
}

function show_old_data_category ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM category WHERE id = :id");
    $stmt->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data; 
}

function edit_category ($conn,$data) {
    $stmt = $conn->prepare("UPDATE category SET name = :name, parent = :parent  WHERE id = :id");
    $stmt->bindparam(":name",$data["name"],PDO::PARAM_STR);
    $stmt->bindparam(":parent",$data["parent"],PDO::PARAM_STR);
    $stmt->bindparam(":id",$data["id"],PDO::PARAM_INT);
    $stmt->execute();       
}

function delete_category ($conn,$id) {
    $stmt = $conn->prepare("DELETE FROM category WHERE id = :id");
    $stmt->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
}

function check_product_exists ($conn,$name) {
    $stmt_check = $conn->prepare("SELECT * FROM product WHERE name = :name");
    $stmt_check->bindparam(":name",$name,PDO::PARAM_STR);
    $stmt_check->execute();
    $count = $stmt_check->rowcount();

    if ($count >= 1) {
        return false;
    }

    return true;
}
function create_saleoff ($conn,$data) {
    $stmt = $conn->prepare("INSERT INTO saleoff (name,intro,code,saleoff) 
    VALUES (:name,:intro,:code,:saleoff)");
    $stmt->bindparam(":name",$data["name"],PDO::PARAM_STR);
    $stmt->bindparam(":code",$data["code"],PDO::PARAM_INT);
    $stmt->bindparam(":saleoff",$data["saleoff"],PDO::PARAM_INT);
    $stmt->bindparam(":intro",$data["intro"],PDO::PARAM_STR);
 
    $stmt->execute();
}
function check_name_code_exists ($conn,$name) {
    $stmt_check = $conn->prepare("SELECT * FROM saleoff WHERE  name = :name");
    $stmt_check->bindparam(":name",$name,PDO::PARAM_STR);
    $stmt_check->execute();
    $count = $stmt_check->rowcount();

    if ($count >= 1) {
        return false;
    }

    return true;
}
function check_code_exists ($conn,$code) {
    $stmt_check = $conn->prepare("SELECT * FROM saleoff WHERE  code = :code");
    $stmt_check->bindparam(":code",$code,PDO::PARAM_INT);
    $stmt_check->execute();
    $count = $stmt_check->rowcount();

    if ($count >= 1) {
        return false;
    }

    return true;
}
function list_code ($conn) {
    $stmt = $conn->prepare("SELECT * FROM saleoff ORDER BY id  DESC");
    $stmt->execute();
    $data = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $data;
}
function delete_code ($conn,$id) {
    $stmt = $conn->prepare("DELETE FROM saleoff WHERE id = :id");
    $stmt->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
}
function show_old_data_code ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM saleoff WHERE id = :id");
    $stmt->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data; 
}
function check_code_exists_for_edit ($conn,$code,$id) {
    $stmt_check = $conn->prepare("SELECT * FROM saleoff WHERE  code = :code and id != :id ");
    $stmt_check->bindparam(":code",$code,PDO::PARAM_INT);
    $stmt_check->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt_check->execute();
    $count = $stmt_check->rowcount();

    if ($count >= 1) {
        return false;
    }

    return true;
}
function check_name_code_exists_for_edit ($conn,$name,$id) {
    $stmt_check = $conn->prepare("SELECT * FROM saleoff WHERE  name = :name and id != :id ");
    $stmt_check->bindparam(":name",$name,PDO::PARAM_STR);
    $stmt_check->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt_check->execute();
    $count = $stmt_check->rowcount();

    if ($count >= 1) {
        return false;
    }

    return true;
}
function edit_code ($conn,$data) {
    $stmt = $conn->prepare("UPDATE saleoff SET name = :name,intro = :intro,code = :code ,saleoff =:saleoff WHERE id = :id");
    $stmt->bindparam(":name",$data["name"],PDO::PARAM_STR);
    $stmt->bindparam(":id",$data["id"],PDO::PARAM_INT);
    $stmt->bindparam(":code",$data["code"],PDO::PARAM_INT);
    $stmt->bindparam(":saleoff",$data["saleoff"],PDO::PARAM_INT);
    $stmt->bindparam(":intro",$data["intro"],PDO::PARAM_STR);
    $stmt->execute();       
}
function check_code ($conn,$code) {
    $stmt_check = $conn->prepare("SELECT * FROM saleoff WHERE code = :code");
    $stmt_check->bindparam(":code",$code,PDO::PARAM_STR);
    $stmt_check->execute();
    $count = $stmt_check->rowcount();

    if ($count >= 1) {
        return true;
    }

    return false;
}
function show_code ($conn,$code) {
    $stmt = $conn->prepare("SELECT * FROM saleoff WHERE code = :code");
    $stmt->bindparam(":code",$code,PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data; 
}
function create_product ($conn,$data) {
    $stmt = $conn->prepare("INSERT INTO product (name,size_id,price,type,intro,image,status,category_id) 
    VALUES (:name,:size_id,:price,:type,:intro,:image,:status,:category_id)");
    $stmt->bindparam(":name",$data["name"],PDO::PARAM_STR);
    $stmt->bindparam(":type",$data["type"],PDO::PARAM_STR);
    $stmt->bindparam(":size_id",$data["size_id"],PDO::PARAM_INT);
    $stmt->bindparam(":price",$data["price"],PDO::PARAM_INT);
    $stmt->bindparam(":intro",$data["intro"],PDO::PARAM_STR);
    $stmt->bindparam(":image",$data["image"],PDO::PARAM_STR);
    $stmt->bindparam(":status",$data["status"],PDO::PARAM_INT);
    $stmt->bindparam(":category_id",$data["category_id"],PDO::PARAM_INT);
    $stmt->execute();
}

function edit_product ($conn,$data) {
    $stmt = $conn->prepare("UPDATE product SET name = :name,size_id = :size_id,price = :price,type = :type, intro = :intro , image = :image, status = :status , category_id = :category_id   WHERE id = :id");
    $stmt->bindparam(":name",$data["name"],PDO::PARAM_STR);
    $stmt->bindparam(":id",$data["id"],PDO::PARAM_INT);
    $stmt->bindparam(":intro",$data["intro"],PDO::PARAM_STR);
    $stmt->bindparam(":image",$data["image"],PDO::PARAM_STR);
    $stmt->bindparam(":status",$data["status"],PDO::PARAM_INT);
    $stmt->bindparam(":size_id",$data["size_id"],PDO::PARAM_INT);
    $stmt->bindparam(":type",$data["type"],PDO::PARAM_STR);
    $stmt->bindparam(":price",$data["price"],PDO::PARAM_INT);
    $stmt->bindparam(":category_id",$data["category_id"],PDO::PARAM_INT);
    $stmt->execute();    
}
function delete_image ($conn,$id){
    $data = show_old_data_product($conn,$id);
    $data_image_path = "public/".$data["image"];

    if (file_exists($data_image_path)) {
        unlink($data_image_path);
    }

}
function edit_product_no_image ($conn,$data) {
     $stmt = $conn->prepare("UPDATE product SET name = :name,size_id = :size_id,price = :price,type = :type, intro = :intro , status = :status , category_id = :category_id   WHERE id = :id");
    $stmt->bindparam(":name",$data["name"],PDO::PARAM_STR);
    $stmt->bindparam(":id",$data["id"],PDO::PARAM_INT);
    $stmt->bindparam(":intro",$data["intro"],PDO::PARAM_STR);
    $stmt->bindparam(":status",$data["status"],PDO::PARAM_INT);
    $stmt->bindparam(":size_id",$data["size_id"],PDO::PARAM_INT);
    $stmt->bindparam(":type",$data["type"],PDO::PARAM_STR);
    $stmt->bindparam(":price",$data["price"],PDO::PARAM_INT);
    $stmt->bindparam(":category_id",$data["category_id"],PDO::PARAM_INT);
    $stmt->execute();    
}

function list_product ($conn) {
    $stmt = $conn->prepare("SELECT c.name as category_name,p.*, s.size as size_name
    FROM ((product as p
    INNER JOIN category as c ON c.id = p.category_id)
    INNER JOIN size as s ON p.size_id = s.id)  ORDER BY id DESC");
    $stmt->execute();
    $data = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $data;
}
function show_old_data_product ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM product WHERE id = :id");
    $stmt->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data; 
}
function check_product_exists_for_edit ($conn,$name,$id) {
    $stmt_check = $conn->prepare("SELECT * FROM product WHERE name = :name and id != :id ");
    $stmt_check->bindparam(":name",$name,PDO::PARAM_STR);
    $stmt_check->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt_check->execute();
    $count = $stmt_check->rowcount();

    if ($count >= 1) {
        return false;
    }

    return true;
}

function delete_product ($conn,$id) {
    $stmt = $conn->prepare("DELETE FROM product WHERE id = :id");
    $stmt->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
}
function create_size ($conn,$data) {
    $stmt = $conn->prepare("INSERT INTO size (size) 
    VALUES (:size)");
    $stmt->bindparam(":size",$data["size"],PDO::PARAM_STR);
    $stmt->execute();
}
function check_size_exists ($conn,$size) {
    $stmt_check = $conn->prepare("SELECT * FROM size WHERE size = :size");
    $stmt_check->bindparam(":size",$size,PDO::PARAM_STR);
    $stmt_check->execute();
    $count = $stmt_check->rowcount();

    if ($count >= 1) {
        return false;
    }

    return true;
}
function list_size ($conn) {
    $stmt = $conn->prepare("SELECT * FROM size ORDER BY id  DESC");
    $stmt->execute();
    $data = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $data;
}
function show_old_data_size ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM size WHERE id = :id");
    $stmt->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data; 
}
function edit_size ($conn,$data) {
    $stmt = $conn->prepare("UPDATE size SET size = :size  WHERE id = :id");
    $stmt->bindparam(":size",$data["size"],PDO::PARAM_STR);
    $stmt->bindparam(":id",$data["id"],PDO::PARAM_INT);
    $stmt->execute();       
}

function delete_size ($conn,$id) {
    $stmt = $conn->prepare("DELETE FROM size WHERE id = :id");
    $stmt->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
}
function create_id_product ($conn,$data) {
    $stmt = $conn->prepare("INSERT INTO product_size (type,size_id,price,id_product) 
    VALUES (:type,:size_id,:price,:id_product)");
    $stmt->bindparam(":type",$data["type"],PDO::PARAM_STR);
    $stmt->bindparam(":size_id",$data["size_id"],PDO::PARAM_INT);
    $stmt->bindparam(":id_product",$data["id_product"],PDO::PARAM_INT);
    $stmt->bindparam(":price",$data["price"],PDO::PARAM_INT);
    $stmt->execute();
}
function edit_id_product($conn,$data) {
    $stmt = $conn->prepare("UPDATE product_size SET type = :type,size_id = :size_id, id_product = :id_product , price = :price WHERE id = :id");
    $stmt->bindparam(":id",$data["id"],PDO::PARAM_INT);
    $stmt->bindparam(":size_id",$data["size_id"],PDO::PARAM_INT);
    $stmt->bindparam(":type",$data["type"],PDO::PARAM_STR);
    $stmt->bindparam(":id_product",$data["id_product"],PDO::PARAM_INT);
    $stmt->bindparam(":price",$data["price"],PDO::PARAM_INT);
    $stmt->execute();
}
function check_id_size_exists ($conn,$name,$size_id) {
    $stmt_check = $conn->prepare("SELECT * FROM product WHERE size_id = :size_id and name = :name");
    $stmt_check->bindparam(":size_id",$size_id,PDO::PARAM_INT);
    $stmt_check->bindparam(":name",$name,PDO::PARAM_STR);
    $stmt_check->execute();
    $count = $stmt_check->rowcount();

    if ($count >= 1) {
        return false;
    }

    return true;
}

function check_id_product_exists_for_edit ($conn,$id_product,$size_id,$id) {
    $stmt_check = $conn->prepare("SELECT * FROM product_size WHERE size_id = :size_id and id_product = :id_product and id != :id ");
    $stmt_check->bindparam(":size_id",$size_id,PDO::PARAM_INT);
    $stmt_check->bindparam(":id_product",$id_product,PDO::PARAM_INT);
    $stmt_check->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt_check->execute();
    $count = $stmt_check->rowcount();

    if ($count >= 1) {
        return false;
    }

    return true;
}
function delete_id_product ($conn,$id) {
    $stmt = $conn->prepare("DELETE FROM product_size WHERE id = :id");
    $stmt->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
}

function list_id_product ($conn) {
    $stmt = $conn->prepare("SELECT p.*, sp.name as product_name, s.size as size_name
    FROM ((product_size as p
    INNER JOIN product as sp ON p.id_product = sp.id)
    INNER JOIN size as s ON p.size_id = s.id)  ORDER BY id DESC");
    $stmt->execute();
    $data = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $data;
}

function create_cart ($conn,$data) {
    $stmt = $conn->prepare("INSERT INTO cart (name,address,email,note) 
    VALUES (:name,:address,:email,:note)");
    $stmt->bindparam(":name",$data["name"],PDO::PARAM_STR);
    $stmt->bindparam(":address",$data["address"],PDO::PARAM_STR);
    $stmt->bindparam(":email",$data["email"],PDO::PARAM_STR);
    $stmt->bindparam(":note",$data["note"],PDO::PARAM_STR);

    $stmt->execute();
}
function show_old_data_cart ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM cart WHERE id = :id");
    $stmt->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data; 
}
function check_cart_exists ($conn,$name) {
    $stmt_check = $conn->prepare("SELECT * FROM cart WHERE name = :name");
    $stmt_check->bindparam(":name",$name,PDO::PARAM_STR);
    $stmt_check->execute();
    $count = $stmt_check->rowcount();

    if ($count >= 1) {
        return false;
    }

    return true;
}
function edit_cart ($conn,$data) {
    $stmt = $conn->prepare("UPDATE cart SET name = :name,address = :address,email = :email,note = :note  WHERE id = :id");
    $stmt->bindparam(":name",$data["name"],PDO::PARAM_STR);
    $stmt->bindparam(":address",$data["address"],PDO::PARAM_STR);
    $stmt->bindparam(":email",$data["email"],PDO::PARAM_STR);
    $stmt->bindparam(":note",$data["note"],PDO::PARAM_STR);
    $stmt->bindparam(":id",$data["id"],PDO::PARAM_INT);
    $stmt->execute();       
}
function check_cart_exists_for_edit ($conn,$name,$id) {
    $stmt_check = $conn->prepare("SELECT * FROM cart WHERE name = :name and id != :id ");
    $stmt_check->bindparam(":name",$name,PDO::PARAM_STR);
    $stmt_check->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt_check->execute();
    $count = $stmt_check->rowcount();

    if ($count >= 1) {
        return false;
    }

    return true;
}
function list_cart ($conn) {
    $stmt = $conn->prepare("SELECT * FROM cart ORDER BY id  DESC");
    $stmt->execute();
    $data = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $data;
}
function delete_cart ($conn,$id) {
    $stmt = $conn->prepare("DELETE FROM cart WHERE id = :id");
    $stmt->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
}
function create_id_cart ($conn,$data) {
    $stmt = $conn->prepare("INSERT INTO detail_cart (id_product_size,quality,id_cart) 
    VALUES (:id_product_size,:quality,:id_cart)");
    $stmt->bindparam(":id_product_size",$data["id_product"],PDO::PARAM_INT);
    $stmt->bindparam(":quality",$data["quality"],PDO::PARAM_INT);
    $stmt->bindparam(":id_cart",$data["cart"],PDO::PARAM_INT);
    $stmt->execute();
}
function edit_id_cart($conn,$data) {
    $stmt = $conn->prepare("UPDATE detail_cart SET id_product_size = :id_product_size, quality = :quality , id_cart = :id_cart  WHERE id = :id");
    $stmt->bindparam(":id",$data["id"],PDO::PARAM_INT);
    $stmt->bindparam(":id_product_size",$data["id_product"],PDO::PARAM_INT);
    $stmt->bindparam(":quality",$data["quality"],PDO::PARAM_INT);
    $stmt->bindparam(":id_cart",$data["cart"],PDO::PARAM_INT);
    $stmt->execute();
}
function list_id_cart ($conn) {
    $stmt = $conn->prepare("SELECT * FROM detail_cart ORDER BY id  DESC");
    $stmt->execute();
    $data = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $data;
}
function list_type ($conn) {
    $stmt = $conn->prepare("SELECT d.*, p.type as type, c.name as name
    FROM ((detail_cart as d
    INNER JOIN product as p ON p.id = d.id_product_size)
    INNER JOIN cart as c ON d.id_cart = c.id)  ORDER BY id DESC");
    $stmt->execute();
    $data = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $data;
}
function delete_id_cart ($conn,$id) {
    $stmt = $conn->prepare("DELETE FROM detail_cart WHERE id = :id");
    $stmt->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
}
function show_old_data_id_cart ($conn,$id) {
    $stmt = $conn->prepare("SELECT * FROM size WHERE id = :id");
    $stmt->bindparam(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data; 
}
?>
 