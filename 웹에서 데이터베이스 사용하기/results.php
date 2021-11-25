<!DOCTYPE html>
<html>
    <head>
        <title>검색 결과입니다</title>
</head>
<body>
    <h1>검색결과입니다</h1>
    <?php
        $searchtype=$_POST['searchtype'];
        $searchterm=trim($_POST['searchterm']);

        if(!$searchtype || !$searchterm)
        {
            echo '<p>정보를 입력해주시지 않으셨어요<br />뒤로가서 다시 시도해주세요</p>';
            exit;
        }

        switch($searchtype){
            case 'Title' :
            case 'Author' :
            case 'ISBN' :
                break;
            default :
                echo '<p>이상한 값을 입력하셨어요</p>';
                exit;
        }

        $db = new mysqli('127.0.0.1', 'boboddo', 'boboddo', 'books');
        $query = "SELECT ISBN, Author, Title, Price FROM Books WHERE $searchtype = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('s',$searchterm); //searchterm을 prepare 방식으로 안전하게
        $stmt->execute(); // 쿼리문을 실행
        $stmt->store_result(); // 결과를 저장해서, 밑에서 num_rows를 출력할 수 있게 해준다

        $stmt->bind_result($isbn, $author, $title, $price);

        echo "<p>Number of books found : ". $stmt->num_rows. "</p>";

        while($stmt->fetch()){
            echo "<p><strong>Title : ".$title."</strong>";
            echo "<br />Author: ".$author;
            echo "<br />ISBN : ".$isbn;
            echo "<br />Price: \$".number_format($price,2)."</p>";
        }
        $stmt->free_result(); // 결과 세트 연결을 해제한다
        $db->close(); // DB연결을 종료한다

    ?>
</body>
</html>