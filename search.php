<?php
$search = $searchErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")  {

    if (empty($_POST["search"])) {
        $searchErr = "Required";
    } else {
        $search = $_POST["search"];
    }
}

if ($search) {
    echo "<script>window.location.href='result.php?search=$search';</script>";
}
?>

<link rel="stylesheet" href="style.css">


<div class="search-container">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

        <input type="text" name="search" placeholder="Search..." value="<?php echo $search; ?>">
        <span class="error">* <?php echo $searchErr; ?></span><br>

        <input type="submit" value="Search">
    </form>

    <a href="index.php" class="back-btn">Back</a>
</div>
