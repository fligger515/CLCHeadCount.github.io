<?php
  $conn = mysqli_connect(
    "localhost",
    "fligger515",
    "Jade3390",
    "fligger515"); //DB이름

    $stuID = $_POST['stuID'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM hallymuser WHERE stuID ='{$stuID}'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);
    $hashedPassword = $row['password'];
    $row['_id'];

    foreach($row as $key => $r) {
      echo "{$key} : {$r} <br>";
    }
    // echo $row['id'];
    // DB 정보를 가져왔으니
    // 비밀번호 검증 로직을 실행하면 된다.
    $passwordResult = password_verify($password, $hashedPassword);
    if ($passwordResult === true) {
      session_start();
      $_SESSION['stuID'] = $row['_id'];
      print_r($_SESSION);
      echo $_SESSION['stuID'];
?>
      <script>
        alert("로그인에 성공하였습니다.")
        location.href = "index.php";
      </script>
<?php
    } else { // 로그인 실패
?>
      <script>
        alert("로그인에 실패하였습니다");
      </script>
<?php
    }
?>
