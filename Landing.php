<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="clock.js"></script>
    <title>Landing Page</title>
</head>

<body onload="startTime()">
    <div class="title">
        <p>코로나 펜데믹 시대에 따른</p>
        <p> 강좌 관리 시스템</p>
    </div>
    <div id="clock"></div>

    <div class="buttons">
        <button class="button" type="button" onclick="location.href='studentInfo.php'">학생 정보 조회</button>
        <button class="button" type="button" onclick="location.href='classList.php'">학과 별 대면 강의 리스트</button>
        <button class="button" type="button" onclick="location.href='studentInClass.php'">강의 별 대면을 선택한 학생</button>
        <button class="button" type="button" onclick="location.href='proStuInfo.php'">담당 교수 별 학생의 대면 여부</button>
    </div>

    <div class="footer">
        <p>김지환 윤혜린</p>
        <p>2021 2학기 DB Project</p>
    </div>
</body>



</html>