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

<!-- Add design for the retriever div -->

<center>
    
<!-- Retrieve data display area -->
<div id="retriever">
    <?php include("retriever.php"); ?>
</div>
</center>