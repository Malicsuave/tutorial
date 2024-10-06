<?php 
session_start();
include("../connections.php");
include("nav.php");
?>

<!-- Include jQuery -->
<script type="text/javascript" src="js/jQuery.js"></script>

<!-- Script to refresh the retriever.php content every 1 second -->
<script type="application/javascript">
    setInterval(function(){
        $('#retriever').load('retriever.php');
    }, 1000);
</script>

<?php 

if(empty($_GET["getUpdate"])) {





?>

<center>
    
<!-- Retrieve data display area -->
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