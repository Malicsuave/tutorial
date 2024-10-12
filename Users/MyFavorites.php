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

<hr>

<script type="text/javascript">
var Category = {
    "Car": ["Honda", "BMW", "Mustang", "Toyota", "Mitsubishi", "Ford", "Nissan", "Tesla", "Mazda", "Ferrari"],
    "Food": ["Burger", "Maling", "Hotdog", "Pizza", "Tacos", "Fried Chicken", "Shawarma", "Nachos", "Sushi", "Pasta", "Dumplings", "Spring Rolls", "Salad"],
    "Beer": ["Red Horse", "Colt 45", "San Mig Light Apple", "Guinness", "Asahi", "Miller Lite", "Pabst Blue Ribbon", "Blue Moon", "Modelo Especial", "Coors Light"],
    "Beverages": ["Coke", "Sarsi", "Royal", "Sprite", "Pepsi", "Dr. Pepper", "Fanta", "Iced Tea", "Lemonade", "Gatorade", "Fruit Punch", "Mountain Dew", "Root Beer"],
    "Snacks": ["Chips", "Popcorn", "Nachos", "Cookies", "Pretzels", "Cheese Balls", "Trail Mix"],
    "Desserts": ["Ice Cream", "Brownies", "Cake", "Cookies", "Donuts", "Macarons", "Cupcakes"],
    "Liquor": ["Whiskey", "Vodka", "Rum", "Tequila", "Gin", "Brandy"],
    "Juices": ["Orange Juice", "Apple Juice", "Cranberry Juice", "Grape Juice", "Pineapple Juice", "Tomato Juice"],
    "Soft Drinks": ["Coca Cola", "Pepsi", "7UP", "Mountain Dew", "Dr. Pepper", "Sprite"],
    "Energy Drinks": ["Red Bull", "Monster", "Rockstar", "NOS", "Full Throttle", "Bang"]
};


function category(value) {
    if (value.length === 0) {
        document.getElementById("choice").innerHTML = "<option></option>";
    } else {
        var category_options = "";
        for (var category_name in Category[value]) {
            category_options += "<option name='choice' value='" + Category[value][category_name] + "'>" + Category[value][category_name] + "</option>";
        }
        document.getElementById("choice").innerHTML = category_options;
    }
}
</script>

<select name="category" id="category" onChange="category(this.value);" style="width: 200px; padding: 5px; border-radius: 5px;">
    <option name="category" value="Car">Car</option>
    <option name="category" value="Food">Food</option>
    <option name="category" value="Beer">Beer</option>
    <option name="category" value="Beverages">Beverages</option>
    <option name="category" value="Snacks">Snacks</option>
    <option name="category" value="Desserts">Desserts</option>
    <option name="category" value="Liquor">Liquor</option>
    <option name="category" value="Juices">Juices</option>
    <option name="category" value="Soft Drinks">Soft Drinks</option>
    <option name="category" value="Energy Drinks">Energy Drinks</option>
</select>

<select name="choice" id="choice" style="width: 200px; padding: 5px; border-radius: 5px;">
    <option name="choice" value="">Select Category First</option>
</select>