<?php 
include("connections.php");

if(empty($_GET["search"])){
    echo "Get doesn't contain any value";
} else {
    $check = $_GET["search"];
    $terms = explode(" ", $check);

    // Prepared statement initialization
    $stmt = $connections->prepare("SELECT * FROM mytbl WHERE fName LIKE ? OR mName LIKE ? OR lName LIKE ?");
    
    if(strlen($check) == 1) {
        // For single letter search (initial)
        $param = "$check%";
        $stmt->bind_param("sss", $param, $param, $param);
    } else {
        // Multi-word search logic
        $q_parts = [];
        $param_types = '';
        $params = [];

        foreach($terms as $each) {
            $like_term = "%$each%";
            $q_parts[] = "(fName LIKE ? OR mName LIKE ? OR lName LIKE ?)";
            array_push($params, $like_term, $like_term, $like_term);
            $param_types .= 'sss';
        }

        $q = "SELECT * FROM mytbl WHERE " . implode(' OR ', $q_parts);
        $stmt = $connections->prepare($q);
        $stmt->bind_param($param_types, ...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    // Check for search results
    if ($result->num_rows > 0) {
        echo "<div class='result-container'>";
        echo "<h3>Search Results</h3>";
        echo "<table>";
        echo "<tr><th>First Name</th><th>Middle Name</th><th>Last Name</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['fName']) . "</td>";
            echo "<td>" . htmlspecialchars($row['mName']) . "</td>";
            echo "<td>" . htmlspecialchars($row['lName']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<a href='search.php' class='btn back-btn'>Back</a>";
        echo "</div>";
    } else {
        echo "<p>No result found.</p>";
    }
}

?>

<!-- Styling -->
<style>
    body {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        background-color: #e9ecef; 
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .result-container {
        text-align: center;
        background-color: #f9f9f9; 
        border-radius: 10px;
        padding: 20px;
        width: 600px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        position: relative;
        padding-bottom: 60px; 
    }

    h3 {
        color: #4CAF50;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        padding: 10px;
        border: 1px solid #333;
        text-align: left;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    td {
        background-color: #f9f9f9;
        color: #333;
    }

  
    tr:hover td {
        background-color: #004643;
        color: white;
    }

    .btn.back-btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        position: absolute;
        bottom: 10px;
        left: 10px;
        transition: background-color 0.3s ease;
    }

    .btn.back-btn:hover {
        background-color: #004643;
    }
</style>
