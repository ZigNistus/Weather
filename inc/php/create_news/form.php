<?php

require_once '../connect.php';

$chek_category = $db->prepare("SELECT * FROM category");
$chek_category->execute();
$category = $chek_category->get_result();

if (mysqli_num_rows($category) > 0) {
    $cat = $category->fetch_all();

    foreach ($cat as $key => $value) {
        echo '<option class="item" value="' . $value[0] .  '">' . $value[1] . '</option>';
    }
}
