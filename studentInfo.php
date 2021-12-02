<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <script type="text/javascript" src="clock.js"></script>
    <!-- 아이콘 사용하기 위하여 fontawesome을 이용 -->
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
    <title>학생정보조회</title>
</head>

<body onload="startTime()">
    <span class="subTitle">학생 정보 조회</span>
    <span class="returnButton" type="button" onclick="location.href='Landing.php'"><i class="fas fa-home"></i> 홈으로 돌아가기 </span>
    <span class="editButton" type="button" onclick="location.href='addStudent.php'"><i class="fas fa-user-plus"></i> 학생 추가 </span>
    <span class="editButton" type="button" onclick="location.href='Landing.php'"><i class="fas fa-user-edit"></i> 학생 정보 수정 </span>
    <div id="clock"></div>
    <!-- 학번   이름    학과    주소    전화번호    백신여부(미접, 1차, 2차)    발열여부(o,x) -->
    <!-- 발열여부, 백신 상태 업데이트 가능하게 만들기 -->
    <!-- 검색 기능: 백신 비접종, 1차, 2차에 해당하는 학생 보여주기 -->

    <div class="tableDiv">
        <table>
            <tr class="tableTitle">
                <td>학번</td>
                <td>이름</td>
                <td>학과</td>
                <td>학년</td>
                <td>거주 지역</td>
                <td>전화번호</td>
                <td>접종 여부</td>
                <td>발열 여부</td>
            </tr>
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
            $sql = "select * from student";
            // 쿼리문 실행
            $result = mysqli_query($connect, $sql);
            // fetch하기 위하여 쿼리 결과를 이용하여 필드 반환
            $fields = mysqli_num_fields($result);

            while ($row = mysqli_fetch_row($result)) {
                echo "<tr>";
                for ($i = 0; $i < $fields; $i = $i + 1) {
                    echo "<td>$row[$i]</td>";
                }
                echo "<td> <form method = 'post'>";
                // 뭘 전달해야할까
                echo "</tr>";
            }
            mysqli_close($connect);
            ?>
        </table>
    </div>
    <!-- 개별적으로 학생의 대면, 비대면 / 백신 0,1,2차 수정 가능하게 버튼 만들고 onclick event로 처리 -->

</body>

</html>