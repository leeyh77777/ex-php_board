<?php
    $id = 'id';
    $name = 'name';
    $category = $_POST['category'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    require('_conn.php');
    $sql = "INSERT INTO `blog1` (`name`, `title`, `category`, `content`, `id`) VALUE ('$name', '$title', '$category', '$content', '$id')";
    $result = mysqli_query($conn, $sql);
    if($result) {
        echo "<script>alert('글 작성이 완료되었습니다.');location.href='blog.php'</script>";
    }
?>