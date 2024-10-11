<?php 
session_start();
include("../connections.php");
include("nav.php");

if(isset($_SESSION["email"])){
    $email = $_SESSION["email"];

    $authentication = mysqli_query($connections, "SELECT * FROM tbl_user WHERE email = '$email'");
    $fetch = mysqli_fetch_assoc($authentication);
    $account_type = $fetch ["account_type"];

    if($account_type != 1){
        echo "<script>window.location.href='../Forbidden';</script>";
    }
}


?>

<script type="text/javascript" src="js/jQuery.js"></script>

<script type="application/javascript">
    setInterval(function(){
        $('#retriever').load('retriever.php');
    }, 1000);
</script>

<?php 

if(empty($_GET["getDelete"])) {

}else{
    include("confirm_delete.php");
}
?>

<?php 
if(empty($_GET["getUpdate"])) {

?>
<center>
    
<div id="retriever">
    <?php include("retriever.php"); ?>
</div>
</center>

<?php 
}else{
        include("updating_user.php");
}
if(empty($_GET["notify"])){
    //do nothing her
}else{
    echo "<font color=green><h3><center>" .$_GET["notify"] . "</center></h3></font>";
}
?>