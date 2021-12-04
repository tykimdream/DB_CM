<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
    <script type="text/javascript" src="clock.js"></script>

    <title>강의 별 대면을 선택한 학생</title>
</head>

<body onload="startTime()"><span class="subTitle">강의 별 대면을 선택한 학생</span>
    <span class="returnButton" type="button" onclick="location.href='Landing.php'"><i class="fas fa-home"></i> 홈으로 돌아가기 </span>
    <div id="clock"></div>

    <!-- 전체 강의 목록 출력 -->
    <h1> 전체 강의 목록 </h1>
    <div class="tableDiv">
        <form class="selectDept" action="studentInClass_res.php" method="post">
            강의 검색 &nbsp <input type="text" name="id" placeholder="학수번호를 입력해주세요(7문자)">
            <input type="submit" value="검색">
        </form>
        <table>
            <tr class="tableTitle">
                <td>과목 번호</td>
                <td>과목 이름</td>
                <td>담당 교수</td>
                <td>소속학과</td>
                <td>시수</td>
                <td>학점</td>
                <td>이수 구분</td>
                <td>강의 형태</td>
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
            $sql = "select lecture.lec_id, lecture.lec_name, lecture.professor, lecture.dept, lecture.runtime, lecture.credit, lecture.comdiv, lecture.lec_statement from lecture";

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
<? echo "총 $rows 개"; ?>

</html>