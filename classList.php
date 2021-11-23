<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="clock.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>

    <title>학과 별 대면 강의 리스트</title>
</head>

<body onload="startTime()">
    <span class="subTitle">학과 별 대면 강의 리스트</span>
    <span class="returnButton" type="button" onclick="location.href='Landing.php'"><i class="fas fa-home"></i> 홈으로 돌아가기 </span>
    <span class="returnButton" type="button"><a href='#summary'><i class="fas fa-angle-double-down"></i> 요약 </a> <a name="main"></a>
        <a href='#summary'><i class="fas fa-angle-double-down"></i></a></span>

    <div id="clock"></div>

    <!-- 학과   강의명 대면 -->
    <!-- select 태그 이용해서 해당 학과 선택하면 대면인 강의들 쭉 나오게 -->
    <!-- 대면/비대면 select 대면 누르면 대면인 강의들 나오고 비대면 누르면 비대면 강의들 나오게 -->

    <div class="tableDiv">
        <table>
            <tr class="tableTitle">
                <td>학과</td>
                <td>강의명</td>
                <td>대면 여부</td>
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

            // 쿼리문 작성하여 변수 sql에 저장 //
            $sql = "select dept, lec_name, lec_statement from lecture order by dept";
            // 쿼리문 실행
            $result = mysqli_query($connect, $sql);
            // fetch하기 위하여 쿼리 결과를 이용하여 필드 반환
            $fields = mysqli_num_fields($result);

            while ($row = mysqli_fetch_row($result)) {
                echo "<tr>";
                for ($i = 0; $i < $fields; $i = $i + 1) {
                    echo "<td>$row[$i]</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            ?>

            <span class="subTitle"><a name="summary"></a>학과 별 대면 강의 요약</span>
            <span class="returnButton" type="button" onclick="location.href='Landing.php'"><i class="fas fa-home"></i> 홈으로 돌아가기 </span>
            <span class="returnButton" type="button"><a href='#main'><i class="fas fa-angle-double-up"></i> 돌아가기 </a>
                <a href='#main'><i class="fas fa-angle-double-up"></i></a></span>

            <table>
                <tr class="tableTitle">
                    <td>학과</td>
                    <td>대면 강의 수</td>
                    <td>비대면 강의 수(병행 포함)</td>
                </tr>
                <?
                // 학과별 강의의 갯수(대면 / 비대면)
                $sql_summary = "select count(lec_name) from lecture order by dept";
                $result_summary = mysqli_query($connect, $sql_summary);
                $fields_summary = mysqli_num_fields($result_summary);
                while ($row = mysqli_fetch_row($result_summary)) {
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