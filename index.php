<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul class="nav justify-content-end">
        <?php
        if (isset($_SESSION['stuID'])) {
            echo "{$_SESSION['stuID']}님 환영합니다  ";
        ?>
            <li class="nav-item d-flex align-items-center" onclick="logout()">로그아웃</li>
        <?php
        } else {
        ?>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="signup.php">회원가입 </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="login.php">로그인</a>
            </li>
<?php
        }
?>
    </ul>
    <script>
        function logout() {
            console.log("hello");
            const data = confirm("로그아웃 하시겠습니까?");
            if (data) {
                location.href = "logoutPrcoess.php";
            }

        }
    </script>
</body>
</html>
