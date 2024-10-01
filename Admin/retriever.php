<?php 

include("../connections.php");

// Retrieve data from the database
$retrieve_query = mysqli_query($connections, "SELECT * FROM tbl_user"); 

?>


<style>
        /* General styles */
body {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    background-color: #e9ecef;
    margin: 0;
    padding: 20px;
}

/* Container for the user data table */
.result-container {
    text-align: center;
    background-color: #f9f9f9;
    border-radius: 10px;
    padding: 20px;
    width: auto;
    margin: 50px auto;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
}

h3 {
    color: #4CAF50;
    margin-bottom: 20px;
}

/* Table styling */
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

/* Hover effect for table rows */
tr:hover td {
    background-color: #004643;
    color: white;
}

/* Back button */
.btn.back-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    margin-top: 20px;
}

.btn.back-btn:hover {
    background-color: #004643;
}

</style>
<div class="result-container">
    <h3>User Information</h3>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Prefix</th>
                <th>7-Digit Number</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through the query result and populate the table rows
            while($row_users = mysqli_fetch_assoc($retrieve_query)) {
                $id_user = $row_users["id_user"];
                $db_first_name = $row_users["first_name"];
                $db_middle_name = $row_users["middle_name"];
                $db_last_name = $row_users["last_name"];
                $db_gender = $row_users["gender"];
                $db_preffix = $row_users["preffix"];
                $db_seven_digit = $row_users["seven_digit"];
                $db_email = $row_users["email"];
                $db_password = $row_users["password"];

                echo "<tr>
                        <td>{$id_user}</td>
                        <td>{$db_first_name}</td>
                        <td>{$db_middle_name}</td>
                        <td>{$db_last_name}</td>
                        <td>{$db_gender}</td>
                        <td>{$db_preffix}</td>
                        <td>{$db_seven_digit}</td>
                        <td>{$db_email}</td>
                        <td>{$db_password}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Back button -->
    <a href="index.php" class="btn back-btn">Back to Home</a>
    
</div>

