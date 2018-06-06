<?php
	require "includes/db.php";
	
	// Get the `id` from the URL parameter.
	$id = isset($_GET['id']) ? $_GET['id'] : null;
	// If no parameter is provided, redirect to the home page.
	if (!$id) redirect_to('index.php');
	else {
		// Parameter is provided.
		// Look for a matching ID in the database.
		$query = 'SELECT * ';
		$query .= 'FROM finalProject ';
		$query .= "WHERE id = '{$id}' ";
		$query .= 'LIMIT 1';
		$result = mysqli_query($connection, $query);
		if (!$result) {
			die('Database query failed.');
		}
    }
    
    while ($recipe = mysqli_fetch_assoc($result)) {
        $link = str_replace('&', '', $recipe['title']);		
        $link = str_replace(' ', '', $link);
        
        if($recipe['numOfInstruction']==6){
            $array = array($recipe['instruction1'],$recipe['instruction2'],$recipe['instruction3'],$recipe['instruction4'],$recipe['instruction5'],$recipe['instruction6']);                         
        }else{
            $array = array($recipe['instruction1'],$recipe['instruction2'],$recipe['instruction3'],$recipe['instruction4'],$recipe['instruction5']);            
        }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>IDM232</title>
</head>

<body>
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

    <main>
        <div class="recipe">

            <div class="recipeimg">
                <img src="assets/images/<?php echo $link?>/title.jpg" alt="titleimg">
            </div>
            <!-- <div class="nur">
                <img src="http://via.placeholder.com/20x20" alt="">
                <p>30-40mins</p>
                <img src="http://via.placeholder.com/20x20" alt="">
                <p>2-3</p>
            </div> -->
            <div class="recipecap">
                <div class="Rcap">
                    <h4><?php echo$recipe['title']?></h4>
                    <p><?php echo$recipe['subtitle']?></p>
                    <br>
                    <p><?php echo$recipe['descrip']?></p>
                    <br>
                </div>
            </div>
        </div>
        <div class="ingrident">
                <img src="assets/images/<?php echo $link?>/ingredients.png" alt="titleimg">         
                <p><?php echo$recipe['ingredient']?></p>
        </div>
        <div class="instruction">
            <?php
            for($i=0; $i<$recipe['numOfInstruction'];$i++){
            ?>
            <img src="assets/images/<?php echo $link?>/ins<?php echo $i+1?>.jpg" alt="titleimg">      
            <h3>Step <?php echo $i+1?></h3>
            <p><?php echo $array[$i]?></p>
            <?php
            }
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

    <?php
		}	
		// Step 4: Release Returned Data
		mysqli_free_result($result);
		// Step 5: Close Database Connection
		mysqli_close($connection);
    ?>
</body>
</html>