<!DOCTYPE html>
<html>
<head>
    <title>삽입 결과</title>
</head>
<body>
    <h1>책을 삽입한 결과입니다</h1>
    <?php
        if(!isset($_POST['ISBN']) || !isset($_POST['Author']) || !isset($_POST['Title']) || !isset($_POST['Price']))
        {
            echo "아무런 데이터도 입력하지 않았어요";
            exit;
        }

        $isbn = $_POST['ISBN'];
        $author = $_POST['Author'];
        $title = $_POST['Title'];
        $price = $_POST['Price'];
        $price = doubleval($price); // 숫자를 double 형태로 변경

        $db = new mysqli('127.0.0.1', 'boboddo', 'boboddo', 'books');

        $query = "INSERT INTO Books VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('sssd', $isbn, $author, $title, $price);
        $stmt->execute();

        if($stmt->affected_rows >0){ // 영향받은 row가 없다면 = 데이터가 삽입되지 않았다면
            echo "<p>책이 DB에 삽입되었어요 </p>";
        } else {
            echo "<p>에러가 발생하였어요 </p>";
        }

        $db->close();
    ?>