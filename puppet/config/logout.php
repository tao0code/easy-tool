<?php
session_start();

// 清除会话相关内容
$_SESSION = [];
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}
session_destroy();
?>

<!DOCTYPE html>
<html>
<body>
<script>
    alert('退出登录成功！');
    window.location.href = '../index.php';
</script>
</body>
</html>