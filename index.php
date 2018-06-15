<?php include 'header.php'?>
<?php include 'nav.php'?>

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
                    </div>
                </div>
			</div>
		<?php
		}
		mysqli_free_result($result);
		mysqli_close($connection);
		?>
		</div>
<?php include 'category.php'?>
    </main>
<?php include 'footer.php'?>