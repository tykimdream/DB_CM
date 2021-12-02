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
    <title>학생 추가 페이지</title>
</head>

<body onload="startTime()">
    <span class="subTitle"> 학생 추가 </span>
    <span class="returnButton" type="button" onclick="location.href='Landing.php'"><i class="fas fa-home"></i> 홈으로 돌아가기 </span>
    <span class="returnButton" type="button" onclick="location.href='studentInfo.php'"><i class="fas fa-school"></i> 돌아가기 </span>
    <div id="clock"></div>
    <!-- 학생의 대면, 비대면 / 백신 0,1,2차 수정 가능하게 select 만들고 sql 수정하도록 함 -->

    <form action="addStudent.php" method="POST">
        학번 <input type="text" name="id" required /><br>
        이름 <input type="text" name="name" required /><br>
        학과 <input type="text" name="dept" required /><br>
        학년 <input type="text" name="grade" required /><br>
        거주 지역 <input type="text" name="address" required /><br>
        전화번호 <input type="text" name="tel" required /><br>
        접종여부 <select name="vac" id="vac">
            <option value="X">X</option>
            <option value="1">1차</option>
            <option value="2">2차</option>
            <option value="3">3차</option>
        </select><br>
        발열여부 <select name="fever" id="fever">
            <option value="O">O</option>
            <option value="X">X</option>
        </select><br>
        <input type="submit" />
    </form>

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

    $id_i = $_POST['id'];
    $name_i = $_POST['name'];
    $dept_i = $_POST['dept'];
    $grade_i = $_POST['grade'];
    $address_i = $_POST['address'];
    $tel_i = $_POST['tel'];
    $vac_i = $_POST['vac'];
    $fever_i = $_POST['fever'];

    // 쿼리문 작성하여 변수 sql에 저장
    $sql = "INSERT INTO student (id, name, dept, grade, address, tel, vac, fever) VALUES ('$id_i', '$name_i', '$dept_i', '$grade_i', '$address_i', '$tel_i', '$vac_i', '$fever_i');";
    // 쿼리문 실행
    $result = mysqli_query($connect, $sql);

    echo '<script>';
    echo 'console.log("DB 추가 성공")';
    echo '</script>';

    mysqli_close($connect);
    ?>

</body>

</html>