<?php include 'header.php';?>
<nav>
    <ul class="navbar">
        <li>
            <div class="menu">
                <img src="img/menu.png" alt="menu">
            </div>
        </li>
        <li id="navtext">
            <a href="menu.php">MENU</a>
        </li>
        <li id="navtext">
            <a href="#">ABOUT US</a>
        </li>
        <li>
            <div class="logo">
                <a href="index.php">
                    <img src="img/logo_sim.png" alt="logo">
                </a>
            </div>
        </li>
        <li id="navtext">
            <a href="#">STORE</a>
        </li>
        <li id="navtext">
            <a href="#">SIGN UP</a>
        </li>
        <li>
            <div class="search">
                <img src="img/search.png" alt="search">
            </div>
        </li>
    </ul>
</nav>

<nav>
    <ul class="searchbar">
        <!-- <li class="logo2">
                <img src="img/logo.png" alt="logo">
        </li> -->
        <li>
            <p><?php echo $search?></p>
            <form action="result.php" method="post">
                <input type="text" name="search" placeholder="type your recipe here..." maxlength="20" id="search">
                <input type="submit" value="gO" id="submit">
                <img class="filter" src="img/filter.png" alt="filter">
            </form>
        </li>
        <!-- <li class="filter2">
                <img src="img/filter2.png" alt="filter2">
        </li> -->
    </ul>
</nav>

<main>
<div class="weekly">    
    <?php
        $table = "finalProject";        
        $cate = $_GET['cate'];
        $query = "SELECT * FROM {$table} WHERE cate LIKE '%$cate%'";
        $result = mysqli_query($connection, $query);
        if (!$result) {
                die ("Database query failed.");
        }
		while ($row = mysqli_fetch_assoc($result)) {	
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
            mysqli_free_result($result);
            mysqli_close($connection);
        ?>
    </div>
    <div class="div3">
        <h3>Top Categoires</h3>
        <div class="cate">
                <a href="cate.php?cate=veg" class="cate1"><p>Vegetarian</p></a>
                <a href="cate.php?cate=diet" class="cate2"><p>Diet</p></a>
                <a href="cate.php?cate=keto" class="cate3"><p>Keto</p></a>
                <a href="cate.php?cate=meat+lover" class="cate4"><p>Meat Lover</p></a>
                <a href="cate.php?cate=asians" class="cate5"><p>Asians</p></a>
                <a href="cate.php?cate=bar+food" class="cate6"><p>Bar Food</p></a>
        </div>
    </div>
</main>
<?php include 'footer.php';?>