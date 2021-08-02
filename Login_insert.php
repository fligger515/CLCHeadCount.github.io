<?php
  $conn = mysqli_connect(
    'localhost',
    'root',
    'fligger5151',
    'clcheadcounting');

    $filtered = array(
      'studentID'=> mysqli_real_escape_string($conn, $_POST['studentID']),
      'password'=> mysqli_real_escape_string($conn, $_POST['password']),
      'phone'=> mysqli_real_escape_string($conn, $_POST['phone'])
    );

  $sql = "
    INSERT INTO user
      (studentID, password, phone, created)
      VALUES(
        '{$filtered['studentID']}',
        '{$filtered['password']}',
        '{$filtered['phone']}',
          NOW()
      )
  ";
  $result = mysqli_query($conn, $sql);
  if($result === false){
    echo '로그인 과정에서 문제가 발생했습니다. 관리자에게 문의해주세요. ';
    error_log(mysqli_error($conn));
  } else {
    echo '성공했습니다. <a href="LogMain.php">돌아가기</a>';
  }
?>
