<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>학과 별 대면 강의 리스트</title>
</head>

<body>
    <h1>학과 별 대면 강의 리스트</h1>

    <!-- 학과   강의명 대면 -->
    <!-- select 태그 이용해서 해당 학과 선택하면 대면인 강의들 쭉 나오게 -->
    <!-- 대면/비대면 select 대면 누르면 대면인 강의들 나오고 비대면 누르면 비대면 강의들 나오게 -->


    <button class="button" type="button" onclick="location.href='Landing.html'">학과별</button>

    지금 시간은 <b>
        <?
        echo "현재 날짜 : " . date("Y-m-d") . "<br/>";
        echo "현재 시간 : " . date("H:i:s") . "<br/>";
        echo "현재 일시 : " . date("Y-m-d H:i:s") . "<br/>";
        ?>
    </b> 입니다.


</body>

</html>