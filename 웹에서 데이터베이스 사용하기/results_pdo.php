<!DOCTYPE html>
<html>
<head>
    <title>결과 조회 페이지(PDO버전)</title>
</head>
<body>
    <h1>검색 결과를 조회합니다</h1>
    <?php
        $searchtype = $_POST['searchtype'];
        $searchterm = trim($_POST['searchterm']);

        if(!$searchtype || !$searchterm)
        {
            echo '<p>데이터를 잘못 입력하셨어요</p>';
            exit;
        }

        switch($searchtype)
        {
            case 'Title':
            case 'Author':
            case 'ISBN':
                break;
            default :
                echo '<p>어떠한 옵션도 선택되지 않았어요</p>';
                exit;
        }

        // PDO를 본격적으로 사용해본다! 굳이 mysql이 아니더라도 php에서 추상적으로 DB에 접근할 수 있다.

        $user = 'boboddo';
        $pass = 'boboddo';
        $host = '127.0.0.1';
        $db_name = 'books';

        $dsn = "mysql:host=$host;dbname=$db_name"; // Data Source Name
        try{
            $db = new PDO($dsn, $user, $pass);

            //쿼리를 실행한다
            $query = "SELECT ISBN, Author, Title, Price FROM Books WHERE $searchtype = :searchterm"; // ?을 사용할 수 있다고는 하는데, 사용시에 에러가 발생한다. PDO에서 사용법은 좀 더 알아봐야 할듯
            $stmt = $db->prepare($query);
            $stmt->bindParam(":searchterm",$searchterm);
            $stmt->execute(); // 쿼리문 실행
            
            echo "<p>검색 결과 총".$stmt->rowCount()."개의 책이 검색되었어요</p>";
            
            while($result = $stmt->fetch(PDO::FETCH_OBJ)){
                //조건문을 통해 쿼리 결과를 PDO OBJECT로 반환 후 $result 에 저장하였다.
                echo "<p><strong>제목:".$result->Title."</strong>";
                echo "<br />Author:".$result->Author;
                echo "<br />ISBN:".$result->ISBN;
                echo "<br />PRICE: \$".number_format($result->Price, 2). "</p>";
            }

            $db = NULL; // DB 연결 종료

        }catch(PDOException $e){
            echo "에러: ".$e->getMessage(); // PDO 에러를 출력
            exit;
        }
    ?>
</body>
</html>
