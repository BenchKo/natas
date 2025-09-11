<?php

# Überlegung:
#
# Die $Query in der username Request mit einer erneuten gesamten eigenständigen $query zu überschreiben.
#
# $query = "SELECT * from users where username=\"".$_REQUEST["username"]. 
# 1. Brich die Query auf index 0 meiner Eingabe mit ; ab
# 2. starte neue $query="SELECT * from users where username=natas15"; 
#
#payload: ; $query = "SELECT * FROM users WHERE username='natas15'";
#
#
<?php
if(array_key_exists("username", $_REQUEST)) {
    $link = mysqli_connect('localhost', 'natas14', '<censored>');
    mysqli_select_db($link, 'natas14');

    $query = "SELECT * from users where username=\"".$_REQUEST["username"]."\" and password=\"".$_REQUEST["password"]."\"";
    if(array_key_exists("debug", $_GET)) {
        echo "Executing query: $query<br>";
    }

    if(mysqli_num_rows(mysqli_query($link, $query)) > 0) {
            echo "Successful login! The password for natas15 is <censored><br>";
    } else {
            echo "Access denied!<br>";
    }
    mysqli_close($link);
} else {
?>

<form action="index.php" method="POST">
Username: <input name="username"><br>
Password: <input name="password"><br>
<input type="submit" value="Login" />
</form>
<?php } ?>
<div id="viewsource"><a href="index-source.html">View sourcecode</a></div>
</div>
</body>
</html>
