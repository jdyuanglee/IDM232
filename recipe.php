<?php
	require "includes/db.php";
	
	$id = isset($_GET['id']) ? $_GET['id'] : null;

	if (!$id) redirect_to('index.php');
	else {

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
<?php include 'nav.php'?>

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
                <h3>Ingredients</h3>    
                <?php echo$recipe['ingredient']?>
        </div>
        <div class="instruction">
            <?php
            for($i=0; $i<$recipe['numOfInstruction'];$i++){
            ?>
            <h3>Step <?php echo $i+1?></h3>
            <img src="assets/images/<?php echo $link?>/ins<?php echo $i+1?>.jpg" alt="titleimg">      
            <p><?php echo $array[$i]?></p>
            <?php
            }
            ?>
        </div>
        <?php include 'category.php'?>
    </main>

    <?php
		}
		mysqli_free_result($result);
		mysqli_close($connection);
    ?>
<?php include 'footer.php'?>