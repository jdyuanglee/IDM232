<?php include 'header.php'?>

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
                    <a href="menu.php">
                    <img src="img/search.png" alt="search">
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="intro">
        <img id="introimg2" src="img/intro copy.jpg" alt="intro">
        <img id="introimg1" src="img/intro.jpg" alt="intro">
        <div class="title1">
            <h1>Check our Cookbook for all the recipes</h1>
            <a href="menu.php"><button>GET STARTED</button></a>
        </div>
	</div>
	


    <main>
        <h3>This Week Special</h3>
        <div class="weekly">
        <?php
        $table = "finalProject";
        $query = "SELECT * FROM {$table} WHERE id<8";
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
		// Step 4: Release Returned Data
		mysqli_free_result($result);
		// Step 5: Close Database Connection
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
</body>

</html>