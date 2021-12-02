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
    <span class="returnButton" type="button" onclick="location.href='studentInfo.php'"><i class="fas fa-school"></i> 돌아가기 </span>

    <div id="clock"></div>
    <!-- 학생의 대면, 비대면 / 백신 0,1,2차 수정 가능하게 select 만들고 sql 수정하도록 함 -->

    <div class="studentInfoUpdataPage">
        <div class="searchForm">
            <form action="studentInfoUpdate.php" method="POST">
                이름으로 검색 <input class="submitButton" type="text" name="name" />
                <button class="submitButton" type="submit"> 검색 </button>
            </form>
        </div>


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
        $name_u = "987654321";
        $name_u = $_POST['name'];

        if ($name_u != "987654321") {
            $sql = "SELECT * FROM student WHERE name = '$name_u';";
        }

        $result = mysqli_query($connect, $sql); // 쿼리문 실행
        $fields = mysqli_num_fields($result); // fetch하기 위하여 쿼리 결과를 이용하여 필드 반환

        echo "<div class='tableDiv'>";
        echo "<table> <tr class='tableTitle'>";
        echo "<td>학번</td> <td>이름</td> <td>학과</td> <td>학년</td> <td>거주 지역</td>";
        echo "<td>전화번호</td> <td>백신 접종 여부</td> <td>발열 여부</td>";
        echo "</tr>";

        while ($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            for ($i = 0; $i < $fields; $i = $i + 1) {
                echo "<td>$row[$i]</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        ?>


        <div class="searchForm">
            <form action="studentInfoUpdate.php" method="POST">
                <input class="submitButton" type="text" name="id" placeholder="수정하려면 학번 입력" />
                접종여부 <select name="vac" id="vac">
                    <option value="X">X</option>
                    <option value="1차">1차</option>
                    <option value="2차">2차</option>
                    <option value="3차">3차</option>
                </select>
                발열여부 <select name="fever" id="fever">
                    <option value="X">X</option>
                    <option value="O">O</option>
                </select>
                <button class="submitButton" type="submit"> 수정 </button>
            </form>
        </div>


        <?
        $sql = "SELECT * FROM student;";

        $name_u = $_POST['name'];
        $id_u = $_POST['id'];
        $vac_u = $_POST['vac'];
        $fever_u = $_POST['fever'];
        $sql = "UPDATE student SET vac = '$vac_u', fever = '$fever_u' WHERE id =  '$id_u'";
        mysqli_query($connect, $sql);
        ?>

        <div class="searchForm">
            <form action="studentInfoUpdate.php" method="POST">
                삭제하시려면 삭제합니다를 입력해주세요
                <input class="submitButton" type="text" name="name" placeholder="이름 입력" />
                <input class="submitButton" type="text" name="delete" placeholder="삭제합니다" />
                <button class="submitButton" type="submit"> 삭제 </button>
            </form>
        </div>

        <?
        $delete = $_POST['delete'];
        if ($delete == "삭제합니다") {
            $sql = "DELETE FROM student where name = '$name_u'; ";
            mysqli_query($connect, $sql);
        }
        mysqli_close($connect);
        ?>
    </div>
</body>

</html>