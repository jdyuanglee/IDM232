<nav>
    <ul class="searchbar">
        <li>
            <p><?php echo $search?></p>
            <form action="result.php" method="post">
                <input type="text" name="search" placeholder="type your recipe here..." maxlength="20" id="search">
                <input type="submit" value="gO" id="submit">
            </form>
        </li>
    </ul>
</nav>