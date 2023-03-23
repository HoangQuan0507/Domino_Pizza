




    <div class="pegination-block">
        <ul class="pagination">
            <li><a href="menu.php?page=<?php
            $totalrow_stmt = $conn->prepare("SELECT * FROM product where status = '1'");
            $totalrow_stmt->execute();
            $totalrow = $totalrow_stmt->rowcount();

            $oneperpage = 4;

            $totalpage = ceil($totalrow / $oneperpage);
            if ($_GET["page"] <= 1){
                echo  $totalpage;
            }else {
            echo ($_GET["page"] -1);
            }?>"><i class="flaticon-left-arrow"></i></a></li>
            <?php
            
            
            for ($i = 1; $i <= $totalpage; $i++) {
                if (!isset($_GET["page"])){
                    echo '<a href="menu.php?page='.'1'.'" style="padding:10px;color:red">'.$i.'</a>';
                }else{

                if ($_GET["page"] == $i) {
                    echo '<a href="menu.php?page='.$i.'" style="padding:10px;color:red">'.$i.'</a>';
                } else {
                    echo '<a href="menu.php?page='.$i.'" style="padding:10px;color:blue">'.$i.'</a>';
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
            <li><a href="menu.php?page=<?php 
            if ($_GET["page"]>=$totalpage){
                echo 1;
            }else{
                 echo ($_GET["page"] + 1);
            }?>"><i class="flaticon-right-arrow"></i></a></li>
        </ul>
    </div>

