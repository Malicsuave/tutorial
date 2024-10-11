<?php
session_start();
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
} else {
    echo "<script>window.location.href='../';</script>";
}

include("../connections.php");
   
include("nav.php");

$check = $checkErr = "";

if (isset($_POST["btnSubmit"])) {
        if(empty($_POST["check"])){
            $checkErr = "Please select at least one (1) option.";
        }else{
            $check = $_POST["check"];
        }

        if($check) {
            echo "<br><br>";
            foreach($check as $new_check){
                echo $new_check . "<br>";
            }
        }    
}
?>

<hr>

<form method = "POST">

<span class="error"><?php echo $checkErr; ?></span> <br> <br>
<input type="checkbox" name="check[]" value="Beer"> Beer <Br>
<input type="checkbox" name="check[]" value="San Miglight Apple"> San Miglight Apple <Br>
<input type="checkbox" name="check[]" value="Alfonso Lights"> Alfonso Lights <Br>
<input type="checkbox" name="check[]" value="Great Taste White Choco"> Great Taste White Choco <Br>
<input type="checkbox" name="check[]" value="Coke"> Coke <br>
<input type="checkbox" name="check[]" value="Sprite"> Sprite <br>
<input type="checkbox" name="check[]" value="Red Horse"> Red Horse <br>
<input type="checkbox" name="check[]" value="Tanduay Ice"> Tanduay Ice <br>
<input type="checkbox" name="check[]" value="Jack Daniels"> Jack Daniels <br>
<input type="checkbox" name="check[]" value="Pepsi"> Pepsi <br>

<input type="submit" name="btnSubmit" value="Submit">

</form>