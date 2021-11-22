<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>학생정보조회</title>
</head>

<body>
    <h1>학생 정보 조회</h1>

    <!-- 학번   이름    학과    주소    전화번호    백신여부(미접, 1차, 2차)    발열여부(o,x) -->
    <!-- 발열여부, 백신 상태 업데이트 가능하게 만들기 -->
    <!-- 검색 기능: 백신 비접종, 1차, 2차에 해당하는 학생 보여주기 -->

    <?
    $connect = mysqli_connect("localhost", "root", "1234");
    mysqli_select_db($connect, "cm");

    $sql = "select * from card1;";
    $result = mysqli_query($connect, $sql);
    $fields = mysqli_num_fields($result);

    while ($row = mysqli_fetch_row($result)) {
        echo "<tr>";
        for ($i = 0; $i < $fields; $i = $i + 1) {
            echo "<td>$row[$i]</td>";
        }
        echo "</tr>";
    }
    mysqli_close($connect);
    ?>


    <button class="button" type="button" onclick="location.href='Landing.html'">학과별</button>
    지금 시간은 <b> <? echo date("Y-m-d H:i:s") ?> </b> 입니다.

</body>

</html>