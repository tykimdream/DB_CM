<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="clock.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>

    <title>담당 교수 별 학생의 대면 여부</title>
</head>

<body onload="startTime()">
    <span class="subTitle">담당 교수 별 학생의 대면 여부</span>
    <span class="returnButton" type="button" onclick="location.href='Landing.php'"><i class="fas fa-home"></i> 홈으로 돌아가기 </span>
    <div id="clock"></div>

    <!-- 교수이름   학생이름    대면 여부   접종상태(학생) -->
    <!-- 1안 학과 -> 교수 선택하게 selecet 태그 -->
    <!-- 2안 교수 이름을 내림, 오름 차순으로 정렬 -->
    <h1> 담당 교수 별 학생 전체 목록 </h1>

    <form class="searchForm" action="proStuInfo_res.php" method="post">
        교수 검색 &nbsp; <input type="text" name="id" size="21" placeholder="교수님 성함을 입력해주세요">
        <input type="submit" value="검색">
    </form>


    <div class="tableDiv">
        <table>
            <tr class="tableTitle">
                <td>담당 교수</td>
                <td>소속학과</td>
                <td>학생 이름</td>
                <td>학생 학번</td>
                <td>백신 접종 여부</td>
                <td>학생 발열 여부</td>
            </tr>
            <?

            $connect = mysqli_connect("localhost", "root", "1234");
            mysqli_select_db($connect, "cm");

            $professorName = $_POST["id"];

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
            $sql = "select professor.name, professor.dept, student.name, student.id, student.vac, student.fever
             from professor, instruct, student
             where professor.id = instruct.professor_id and  instruct.student_id = student.id";


            // 쿼리문 실행
            $result = mysqli_query($connect, $sql);
            // fetch하기 위하여 쿼리 결과를 이용하여 필드 반환
            $fields = mysqli_num_fields($result);
            $rows = mysqli_num_rows($result);


            while ($row = mysqli_fetch_row($result)) {
                echo "<tr>";
                for ($i = 0; $i < $fields; $i = $i + 1) {
                    echo "<td>$row[$i]</td>";
                }
                echo "</tr>";
            }
            mysqli_close($connect);
            ?>
        </table>
    </div>

</body>
<? echo "총 $rows 명"; ?>

</html>