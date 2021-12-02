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

        <!-- <form action="studentInfoUpdate.php" method="POST">
            학번으로 검색 <input type="text" name="id" />
            <input type="submit" />
        </form> -->

        <form action="studentInfoUpdate.php" method="POST">
            이름으로 검색 <input type="text" name="name" />
            <button class="submitButton" type="submit"> 제출 </button>
        </form>

        <?
        $connect = mysqli_connect("localhost", "root", "1234");
        mysqli_select_db($connect, "cm");

        if (mysqli_connect_errno()) {

            echo "MySQL 접속 실패" . mysqli_connect_error();
            exit;
        } else {
            echo '<script>';
            echo 'console.log("DB 접근 성공")';
            echo '</script>';
        }
        mysqli_query($connect, "set session character_set_connection=utf8;");
        mysqli_query($connect, "set session character_set_results=utf8;");
        mysqli_query($connect, "set session character_set_client=utf8;");

        $sql = "SELECT * FROM student;";

        // $id_u = "987654321";
        $name_u = "987654321";

        // $id_u = $_POST['id'];
        $name_u = $_POST['name'];

        // if ($id_u != "987654321") {
        //     $sql = "SELECT * FROM student WHERE id = ('$id_u');";
        // }

        if ($name_u != "987654321") {
            $sql = "SELECT * FROM student WHERE name = '$name_u';";
        }

        // 쿼리문 실행
        $result = mysqli_query($connect, $sql);
        // fetch하기 위하여 쿼리 결과를 이용하여 필드 반환
        $fields = mysqli_num_fields($result);

        echo "<div class='tableDiv'>";
        echo "<table> <tr class='tableTitle'>";
        echo "<td>학번</td> <td>이름</td> <td>학과</td> <td>학년</td> <td>거주 지역</td>";
        echo "<td>전화번호</td> <td>접종 여부</td> <td>발열 여부</td>";
        echo "</tr>";

        while ($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            for ($i = 0; $i < $fields; $i = $i + 1) {
                echo "<td>$row[$i]</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($connect);
        ?>

    </div>

</body>

</html>