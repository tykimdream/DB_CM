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
    <div id="clock"></div>

    <!-- 학과   강의명 대면 -->
    <!-- select 태그 이용해서 해당 학과 선택하면 대면인 강의들 쭉 나오게 -->
    <!-- 대면/비대면 select 대면 누르면 대면인 강의들 나오고 비대면 누르면 비대면 강의들 나오게 -->

    <div class="tableDiv">

        <!-- 학과선택 -->
        <form class="selectDept" action="classList.php" method="POST">
            <select name="select_Lecture">
                <option value="0">전체보기</option>
                <option value="1">경제통계학부</option>
                <option value="2">공공사회.통일외교학부</option>
                <option value="3">국제스포츠학부</option>
                <option value="4">글로벌학부</option>
                <option value="5">디스플레이.반도체물리학부</option>
                <option value="6">문화유산융합학부</option>
                <option value="7">문화창의학부</option>
                <option value="8">미래모빌리티학과</option>
                <option value="9">생명정보공학과</option>
                <option value="10">스마트도시학부</option>
                <option value="11">식품생명공학과</option>
                <option value="12">신소재화학과</option>
                <option value="13">약학과</option>
                <option value="14">융합경영학부</option>
                <option value="15">응용수리과학부</option>
                <option value="16">인공지능사이버보안학과</option>
                <option value="17">전자.기계융합공학과</option>
                <option value="18">전자및정보공학과</option>
                <option value="19">정부행정학부</option>
                <option value="20">컴퓨터융합소프트웨어학과</option>
                <option value="21">환경시스템공학과</option>
            </select>
            <input type="submit" value="검색하기" />
        </form>

        <table class="tableform">
            <tr class="tableTitle">
                <td>학과</td>
                <td>과목코드</td>
                <td>과목 이름</td>
                <td>담당교수</td>
                <td>강의 형태</td>
            </tr>
            <?php
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
            // Default 쿼리 생성
            $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture";

            // 입력된 학과에 따라 쿼리 수정
            if (isset($_POST['select_Lecture'])) {
                $var = $_POST['select_Lecture'];
                switch ($var) {
                    case '0':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture ORDER BY lec_statement";
                        break;
                    case '1':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '경제통계학부' ORDER BY lec_statement";
                        break;
                    case '2':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '공공사회.통일외교학부' ORDER BY lec_statement";
                        break;
                    case '3':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '국제스포츠학부' ORDER BY lec_statement";
                        break;
                    case '4':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '글로벌학부' ORDER BY lec_statement";
                        break;
                    case '5':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '디스플레이.반도체물리학부' ORDER BY lec_statement";
                        break;
                    case '6':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '문화유산융합학부' ORDER BY lec_statement";
                        break;
                    case '7':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '문화창의학부' ORDER BY lec_statement";
                        break;
                    case '8':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '미래모빌리티학과' ORDER BY lec_statement";
                        break;
                    case '9':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '생명정보공학과' ORDER BY lec_statement";
                        break;
                    case '10':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '스마트도시학부' ORDER BY lec_statement";
                        break;
                    case '11':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '식품생명공학과' ORDER BY lec_statement";
                        break;
                    case '12':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '신소재화학과' ORDER BY lec_statement";
                        break;
                    case '13':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '약학과' ORDER BY lec_statement";
                        break;
                    case '14':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '융합경영학부' ORDER BY lec_statement";
                        break;
                    case '15':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '응용수리과학부' ORDER BY lec_statement";
                        break;
                    case '16':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '인공지능사이버보안학과' ORDER BY lec_statement";
                        break;
                    case '17':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '전자.기계융합공학과' ORDER BY lec_statement";
                        break;
                    case '18':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '전자및정보공학과' ORDER BY lec_statement";
                        break;
                    case '19':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '정부행정학부' ORDER BY lec_statement";
                        break;
                    case '20':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '컴퓨터융합소프트웨어학과' ORDER BY lec_statement";
                        break;
                    case '21':
                        $sql_summary = "select dept, lec_id, lec_name, professor, lec_statement from lecture where dept = '환경시스템공학과' ORDER BY lec_statement";
                        break;
                }
            }

            // 학과별 강의의 갯수(대면 / 비대면)
            $result_summary = mysqli_query($connect, $sql_summary);
            $fields_summary = mysqli_num_fields($result_summary);
            while ($row = mysqli_fetch_row($result_summary)) {
                echo "<tr>";
                for ($i = 0; $i < $fields_summary; $i = $i + 1) {
                    echo "<td>$row[$i]</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            ?>
    </div>


</body>

</html>