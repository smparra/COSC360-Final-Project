<?php
    function itemDescription($conn, $class, $category){
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
                    <img src="image.php?id='.$id.'" class="card-img-top" class="card-img-top" alt="item">
                        <div class="card-body">
                            <h6 class="card-title">
                            <a href="https://www.amazon.ca/Apple-Smartwatch-Starlight-Aluminium-Water-Resistant/dp/B0CHWYJLQQ/ref=sr_1_5?crid=3HGZETNTCUFE4&dib=eyJ2IjoiMSJ9.pDqIUGMIdK1tgXXVTPeyw7rqyMfSDAWvKiogGIzCzForKVuPcMyCoEQyg8QEarN4qWwYXnb1cnJ19q45ZRBRzwU3bCXUUZtPcV_3aP_mIJdVe5uv_R1yQ7ifEF1rtoyZi0EToi86o9xPdU9jLMakx3AqkBcYgKpBQWML8yVesk7ZXKA7aTbetzhSBpFVpZ3NFM9PLv91pIbJagyCDhmE67QvnXun8uIThmDKVfMjD20XXVowrtsDwQlCOyTMygolD2RZFr-b1tIPnckeSw9Mbezafh8UQnYl9DMCzQZLqUw.arAbogRvcD0Qc_MZAIPlrr-XNjX5uRWIvLQqksoztqs&dib_tag=se&keywords=apple+watch&qid=1710459278&sprefix=apple+wat%2Caps%2C354&sr=8-5">'
                            .$name.
                            '</a></h6>
                            <h5 class="card-text">Best Price: '.$price.'</h5>
                            <a href="https://www.amazon.ca/Apple-Smartwatch-Starlight-Aluminium-Water-Resistant/dp/B0CHWYJLQQ/ref=sr_1_5?crid=3HGZETNTCUFE4&dib=eyJ2IjoiMSJ9.pDqIUGMIdK1tgXXVTPeyw7rqyMfSDAWvKiogGIzCzForKVuPcMyCoEQyg8QEarN4qWwYXnb1cnJ19q45ZRBRzwU3bCXUUZtPcV_3aP_mIJdVe5uv_R1yQ7ifEF1rtoyZi0EToi86o9xPdU9jLMakx3AqkBcYgKpBQWML8yVesk7ZXKA7aTbetzhSBpFVpZ3NFM9PLv91pIbJagyCDhmE67QvnXun8uIThmDKVfMjD20XXVowrtsDwQlCOyTMygolD2RZFr-b1tIPnckeSw9Mbezafh8UQnYl9DMCzQZLqUw.arAbogRvcD0Qc_MZAIPlrr-XNjX5uRWIvLQqksoztqs&dib_tag=se&keywords=apple+watch&qid=1710459278&sprefix=apple+wat%2Caps%2C354&sr=8-5" class="btn btn-primary yellow-buttons">View on Amazon</a>
                        </div>
                    </div>
                ';
            }
        echo '</div>';
        mysqli_free_result($result);
    }
?>