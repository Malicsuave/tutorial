<?php 
include("../connections.php");
$retrieve_query = mysqli_query($connections, "SELECT * FROM tbl_user WHERE account_type='2'"); 
?>
<link rel="stylesheet" href="style.css">

<div class="result-container">
    <h3>User Information</h3>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Password</th>
                <th><center>Action</th>
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
                $db_gender = ucfirst($row_users["gender"]);
                $db_preffix = $row_users["preffix"];
                $db_seven_digit = $row_users["seven_digit"];
                $db_email = $row_users["email"];
                $db_password = $row_users["password"];

                $full_name= ucfirst($db_first_name) ." ". ucfirst($db_middle_name[0]).". ".ucfirst($db_last_name);
                $contact = $db_preffix.$db_seven_digit;
                $jScript = md5(rand(1,9));
                $newScript = md5(rand(1,9));
                $getUpdate = md5(rand(1,9));
                $getDelete = md5 (rand(1,9));
                echo "<tr>
                        <td>{$id_user}</td>
                        <td>{$full_name}</td>
                        <td>{$db_gender}</td>
                        <td>{$contact}</td>
                        <td>{$db_email}</td>
                        <td>{$db_password}</td>
                        <td>
                        <center>    
                                <a href=' ?jScript=$jScript && newScript=$newScript && getUpdate=$getUpdate &&id_user=$id_user' class='btn update'> Update </a>
                                &nbsp;                             
                                <a href=' ?jScript=$jScript && newScript=$newScript && getDelete=$getDelete &&id_user=$id_user' class='btn delete'> Delete </a>        
                        </center>           
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="../index.php" class="btn back-btn">Back to Home</a>
</div>