<?php include 'header.php';?>
<?php include 'nav.php';?>
<?php include 'search.php';?>

<main>
    <?php
        if (isset($_POST['search'])){
            $search = mysqli_real_escape_string($connection, $_POST['search']); 
            $query = "SELECT * FROM {$table} WHERE title LIKE '%$search%' OR subtitle LIKE '%$search%' OR descrip LIKE '%$search%' OR ingredient LIKE '%$search%'"; 
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die ("Database query failed.");
            }
            $queryResult = mysqli_num_rows($result);
    ?>
    <h3>There are <?php echo $queryResult?> recipes found for the keyword "<?php echo $search?>"</h3>
    <div class="weekly">
        <?php
            if ($queryResult>0){
                while ($row = mysqli_fetch_assoc($result)){
                    $link = str_replace('&', '', $row['title']);		
                    $link = str_replace(' ', '', $link);
        ?>        
        <div class="rcp">
            <div class="rcpimg">
                <a href="recipe.php?id=<?php echo $row['id']?>">
                <img src="assets/images/<?php echo $link?>/title.jpg" alt="titleimg">
                </a>
            </div>
            <div class="rcpcap">
                <div class="cap">
                    <h4><?php echo$row['title']?></h4>
                    <p><?php echo$row['subtitle']?></p>
                    <!-- <p>Nutrition:1000 calories</p> -->
                </div>
                <!-- <div class="nur">
                    <img src="http://via.placeholder.com/20x20" alt="">
                    <p>30-40mins</p>
                    <img src="http://via.placeholder.com/20x20" alt="">
                    <p>2-3</p>
                </div> -->
            </div>
        </div>
        <?php
        }
            }else{
                
            }
            mysqli_free_result($result);
            mysqli_close($connection);
        }
        ?>
    </div>
    <?php include 'category.php'?>
</main>
<?php include 'footer.php';?>