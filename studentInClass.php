<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>강의 별 대면을 선택한 학생</title>
</head>

<body>
    <h1>강의 별 대면을 선택한 학생</h1>

    <!-- 강의   학생이름/학번 -->

    <?
    $connect = mysqli_connect("localhost", "root", "1234");
    mysqli_select_db($connect, "cm");
    echo "DB 연동 완료";

    $sql = "select * from ";

    mysqli_close($connect);
    ?>

    <button class="button" type="button" onclick="location.href='Landing.html'">학과별</button>
    지금 시간은 <b> <?
                echo date("Y-m-d H:i:s")
                ?> </b> 입니다.

</body>

</html>