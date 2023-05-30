<?php
    require_once '../connect.php';
    session_start();
    $a= $db->prepare("SELECT MAX(id) FROM news");
    $a->execute();
    $a = $a->get_result();
    $b = mysqli_fetch_assoc($a);

    $cat_id = $_POST['cat_id'];
    $tittle = $_POST['tittle'];
    $desc = $_POST['desc'];
    $photo = $b['MAX(id)'];
    $photo += 1;
    $photo_to_base = 'n'. $photo;
    $chek_news = $db->prepare(
        "INSERT into news(cat_id, tittle, `description`, img)
        values(?,?,?,?)");
    $chek_news->bind_param("isss", $cat_id, $tittle, $desc, $photo_to_base);
    $chek_news->execute();

    $path = '../../../dist/img/news/';
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (!@copy($_FILES['photo']['tmp_name'], $path . 'n' . $photo .'.jpg'))
	{}
}
    header('Location: ../../../create_news.php');
    ?>

