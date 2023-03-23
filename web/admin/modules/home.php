<?php
$totalrow_stmt = $conn->prepare("SELECT * FROM product");
$totalrow_stmt->execute();
$totalrow = $totalrow_stmt->rowcount();

$oneperpage = 4;

$totalpage = ceil($totalrow / $oneperpage);

for ($i = 1; $i <= $totalpage; $i++) {
    if (!isset($_GET["page"])){
        echo '<a href="index.php?p=trang-chu&page='.'1'.'" style="padding:10px;color:red">'.$i.'</a>';
    }else{

    if ($_GET["page"] == $i) {
        echo '<a href="index.php?p=trang-chu&page='.$i.'" style="padding:10px;color:red">'.$i.'</a>';
    } else {
        echo '<a href="index.php?p=trang-chu&page='.$i.'" style="padding:10px">'.$i.'</a>';
    }}
} 

if (isset($_GET["page"])) {
    $page = $_GET["page"];

    if ($page > $totalpage || $page < 1) {
        $page = 1;
    }
} else {
    $page = 1;
}
$start = ($page - 1) * $oneperpage;

?>


<style type="text/css">
    .sanpham{
        float:left;
        margin-right:30px
    }
    .sanpham img{
        width:200px;
        height:200px
    }
</style>


<?php
$stmt = $conn->prepare("SELECT * FROM product ORDER BY id DESC LIMIT $start,$oneperpage");
$stmt->execute();
$data = $stmt->fetchall(PDO::FETCH_ASSOC);
foreach ($data as $item) {
?>

<div class="sanpham">
<img src="public/<?php echo $item["image"] ?>" />
<h3><?php echo $item["name"] ?></h3>
<h4><?php echo number_format($item["price"],0,"",".") ?>VND</h4>
<a href="index.php?p=mua&id=<?php echo $item["id"] ?>">Mua</a>
</div>
<?php } ?>

