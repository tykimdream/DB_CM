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

$id_i = $_GET['id'];
$name_i = $_GET['name'];
$dept_i = $_GET['dept'];
$grade_i = $_GET['grade'];
$address_i = $_GET['address'];
$tel_i = $_GET['tel'];
$vac_i = $_GET['vac'];
$fever_i = $_GET['fever'];

// 쿼리문 작성하여 변수 sql에 저장
$sql = "INSERT into student values($id_i, $name_i, $dept_i, $grade_i,$address_i,$tel_i,$vac_i,$fever_i) ";
// 쿼리문 실행
$result = mysqli_query($connect, $sql);

echo '<script>';
echo 'console.log("DB 추가 성공")';
echo '</script>';

mysqli_close($connect);
