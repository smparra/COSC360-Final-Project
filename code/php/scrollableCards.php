<?php
    function scrollableCards($conn, $class, $category){
        echo '<div class="scrolling-wrapper mx-5">';
            if (is_null($category)){
                $sql = "SELECT * FROM Products WHERE class = '$class'";
            } else{
                $sql = "SELECT * FROM Products WHERE category = '$category'";
            }
            $result = mysqli_query($conn, $sql);
            while($row = $result->fetch_assoc()){ 
                $name = $row["Name"];
                $price = $row["Price"];
                $id = $row["ProductID"];
                echo '
                    <div class="card" style="width: 18rem;">
                    <img src="php/image.php?id='.$id.'" class="card-img-top" class="card-img-top" alt="item">
                        <div class="card-body">
                            <h6 class="card-title">
                            <a href="item.php?ProductID='.$id.'">'
                            .$name.
                            '</a></h6>
                            <h5 class="card-text">Best Price: '.$price.'</h5>
                        </div>
                    </div>
                ';
            }
        echo '</div>';
        mysqli_free_result($result);
    }
?>