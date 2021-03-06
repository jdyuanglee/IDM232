<?php include 'header.php'?>
<?php include 'nav.php'?>
<?php include 'search.php'?>

    <main>
        <div class="weekly">
        <?php
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