<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <meta name="robots" content="noindex, nofollow">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-form {
            max-width: 400px;
            width: 100%;
            padding: 25px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
        }
        .login-form h1 {
            margin-bottom: 25px;
            font-weight: 600;
            color: #3E6BF7;
        }
        .form-control:focus {
            border-color: #3E6BF7;
            box-shadow: 0 0 0 0.25rem rgba(62, 107, 247, 0.25);
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h1 class="text-center">Admin Login</h1>
        
        <?php if(isset($error)): ?>
        <div class="alert alert-danger"><?= $error; ?></div>
        <?php endif; ?>
        
        <form method="post" action="<?= base_url('admin/login'); ?>">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        
        <div class="mt-3 text-center">
            <a href="<?= base_url(); ?>" class="text-decoration-none">Back to Website</a>
        </div>
        
        <!-- Login hint for demo purposes -->
        <div class="mt-4 text-center">
            <small class="text-muted">Demo credentials: admin / password</small>
        </div>
    </div>
</body>
</html>