<?php

    // 회원가입

    require('_conn.php');

    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $pwc = $_POST['pwc'];
    $name = $_POST['name'];
    $addr = $_POST['address'];

    // id가 중복된 경우의 처리
    $sql = "SELECT * FROM `user` WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = $result->num_rows; // 결과값을 정수로 변환 1
    if($row > 0) {
        // 아이디가 중복된 경우
        echo "<script>alert('중복된 아이디가 있습니다.');location.href='join.php'</script>";
    }

    // 패스워드가 잘못 입력된 경우
    if($pw != $pwc) {
        echo "<script>alert('패스워드를 확인해주세요.');location.href='join.php'</script>";
    }

    // SELECT조회, INSERT 삽입, DELETE 삭제, UPDATE 변경
    $sql = "INSERT INTO `user` (`id`, `pw`, `name`, `address`) VALUE ('$id', '$pw', '$name', '$addr')";
    $result = mysqli_query($conn, $sql);
    if($result) {
        // 회원가입후 로그인 처리
        require('_loginok.php');
        echo "<script>alert('회원가입 완료!');location.href='index.php'</script>";
    } else {
        echo "<script>alert('회원가입 실패!');location.href='join.php'</script>";
    }

?>