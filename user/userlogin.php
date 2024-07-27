<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../task4/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="login-container">
        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'inc'): ?>
            <div class="alert alert-primary" role="alert">
                Invalid credentials.
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'not_approved'): ?>
            <div class="alert alert-primary" role="alert">
                User not approved
            </div>
        <?php endif; ?>
        <h2>Login</h2>
        <form method="post" action="../task4/logindb.php">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="btn-container">
                <input type="submit" value="Login" >
            </div>
         </form>
    </div>
</body>
</html>
