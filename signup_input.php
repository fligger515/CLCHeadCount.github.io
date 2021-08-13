<?php
    $conn = mysqli_connect(
      "localhost",
      "fligger515",
      "Jade3390",
      "fligger515"); //DB이름
    /*if ( mysqli_connect_errno() ) {
      echo "DB 연결 실패 : " . mysqli_connect_errno() . mysqli_connect_error();
    }*/
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "
      INSERT INTO hallymuser
        (stuID, password, phone, created)
        VALUES('{$_POST['stuID']}', '{$hashedPassword}', '{$_POST['phone']}', NOW() )";
    $result = mysqli_query($conn, $sql);
    if ($result === false) {
      echo "저장에 문제가 생겼습니다. Error : " . mysqli_error($conn);
    } else {
?>
  <script>
    alert("회원가입이 완료되었습니다. ");
    location.href = "login.php";
  </script>
<?php
    }
?>
