<?php
    $conn = mysqli_connect("localhost",
    "fligger515",
    "Jade3390",
    "fligger515"); //DB이름

    $select_db = mysqli_select_db($fligger515);

    if ( mysqli_connect_errno() ) {
      echo "DB 연결 실패 : " . mysqli_connect_errno() . mysqli_connect_error();
      echo " ";
    }
    $hashedPassword = password_hash($_POST['psswrd'], PASSWORD_DEFAULT);
    echo $hashedPassword;

    $sql = "
      INSERT INTO hallymuser
        (stuID, psswrd, phone, created)
        VALUES(
          '{$_POST['stuID']}',
          '{$hashedPassword}',
          '{$_POST['phone']}',
          NOW()
        )
    ";

    $result = mysqli_query($conn, $sql);
    if ($result === false) {
        echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
        echo mysqli_error($conn);
    } else {
?>
  <script>
    alert("회원가입이 완료되었습니다");
    location.href = "login.html";
  </script>
<?php
    }
?>
<?php
    if($result === false){
      echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요. ';
      error_log(mysqli_error($conn));
    } else {
      echo '성공했습니다. <a href="LogMain.html">돌아가기</a>';
    }
 ?>
