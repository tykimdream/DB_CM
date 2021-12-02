<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="clock.js"></script>
    <!-- 아이콘 사용하기 위하여 fontawesome을 이용 -->
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
    <title>학생 정보 수정 페이지</title>
</head>

<body onload="startTime()">
    <span class="subTitle">학생 정보 수정</span>
    <span class="returnButton" type="button" onclick="location.href='Landing.php'"><i class="fas fa-home"></i> 홈으로 돌아가기 </span>
    <div id="clock"></div>
    <!-- 학생의 대면, 비대면 / 백신 0,1,2차 수정 가능하게 select 만들고 sql 수정하도록 함 -->

    <div class="studentInfoUpdataPage">
        <?
        // Mysql 접속
        $connect = mysqli_connect("localhost", "root", "1234");
        // 해당 DB로 이동
        mysqli_select_db($connect, "cm");

        // DB 접근 확인
        if (mysqli_connect_errno()) {

            echo "MySQL 접속 실패" . mysqli_connect_error();
            exit;
        } else {
            echo '<script>';
            echo 'console.log("DB 접근 성공")';
            echo '</script>';
        }

        // 한글 깨짐 관련
        mysqli_query($connect, "set session character_set_connection=utf8;");
        mysqli_query($connect, "set session character_set_results=utf8;");
        mysqli_query($connect, "set session character_set_client=utf8;");

        // 쿼리문 작성하여 변수 sql에 저장
        $sql = "select * from student where id = '여기서 값 받아서 오기' ";
        // 쿼리문 실행
        $result = mysqli_query($connect, $sql);
        // fetch하기 위하여 쿼리 결과를 이용하여 필드 반환
        $fields = mysqli_num_fields($result);


        mysqli_close($connect);
        ?>
    </div>

</body>

</html>