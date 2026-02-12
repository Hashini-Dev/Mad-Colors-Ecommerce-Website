<?php

require "connection.php";

if (isset($_GET["c"])) {

    $maincategory_id = $_GET["c"];

    $maincategory_rs = Database::search("SELECT * FROM `maincategory_has_category` WHERE `maincategory_id`='".$maincategory_id."'");
    $mainategory_num = $maincategory_rs->num_rows;

    for ($x = 0; $x < $maincategory_num; $x++) {

        $maincategory_data = $maincategory_rs->fetch_assoc();

        $category_rs = Database::search("SELECT * FROM `category` WHERE `id` = '" . $category_data["category_id"] . "'");

        $catrgory_data = $category_rs->fetch_assoc();

?>

        <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>
        
<?php
    
    }

}

?>