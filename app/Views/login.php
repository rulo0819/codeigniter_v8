<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            display: flex;
            width: 100%;
            max-width: 1000px;
            overflow: hidden;
        }

        .login-left {
            flex: 1;
            padding: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .icon-circle {
            width: 300px;
            height: 300px;
            background: #f5f5f5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .laptop-icon {
            width: 200px;
            height: 150px;
            background: #4a5568;
            border-radius: 10px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .laptop-screen {
            width: 180px;
            height: 130px;
            background: #2d3748;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-icon {
            width: 60px;
            height: 60px;
            border: 3px solid #a0aec0;
            border-radius: 50%;
            position: relative;
        }

        .user-icon::after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 40px;
            border: 3px solid #a0aec0;
            border-radius: 50%;
            border-top: none;
        }

        .floating-shape {
            position: absolute;
            border-radius: 50%;
        }

        .shape-1 { width: 20px; height: 20px; background: #4fd1c5; top: 50px; left: 50px; }
        .shape-2 { width: 15px; height: 15px; background: #48bb78; bottom: 80px; left: 80px; }
        .shape-3 { width: 25px; height: 25px; border: 3px solid #48bb78; top: 100px; right: 80px; background: transparent; }
        .shape-4 { width: 18px; height: 18px; background: #4fd1c5; bottom: 120px; right: 100px; }

        .login-right {
            flex: 1;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h2 {
            font-size: 36px;
            color: #2d3748;
            margin-bottom: 40px;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            font-size: 18px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 18px 20px 18px 55px;
            border: none;
            background: #f7fafc;
            border-radius: 50px;
            font-size: 16px;
            color: #2d3748;
            transition: all 0.3s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            background: #edf2f7;
        }

        input::placeholder {
            color: #a0aec0;
        }

        .login-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            border: none;
            border-radius: 50px;
            color: white;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 10px;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(72, 187, 120, 0.3);
        }

        .forgot-link {
            text-align: center;
            margin-top: 20px;
            color: #a0aec0;
            font-size: 14px;
        }

        .forgot-link a {
            color: #667eea;
            text-decoration: none;
        }

        .create-account {
            text-align: center;
            margin-top: 40px;
            color: #a0aec0;
            font-size: 14px;
        }

        .create-account a {
            color: #2d3748;
            text-decoration: none;
            font-weight: 600;
        }

        .alert {
            padding: 12px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-danger {
            background: #fed7d7;
            color: #c53030;
            border-left: 4px solid #c53030;
        }

        .alert-success {
            background: #c6f6d5;
            color: #2f855a;
            border-left: 4px solid #2f855a;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }
            
            .login-left {
                padding: 40px;
            }
            
            .icon-circle {
                width: 200px;
                height: 200px;
            }
            
            .laptop-icon {
                width: 140px;
                height: 100px;
            }
            
            .laptop-screen {
                width: 120px;
                height: 80px;
            }
        }

 </style>
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
            <div class="floating-shape shape-4"></div>
            
            <div class="icon-circle">
                <div class="laptop-icon">
                    <div class="laptop-screen">
                        <div class="user-icon"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="login-right">
            <h2>Member Login </h2>
            <h3>test@test.com / password123</h3>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <?php foreach(session()->getFlashdata('errors') as $error): ?>
                        <div><?= esc($error) ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('login') ?>" method="POST">
                <?= csrf_field() ?>
                
                <div class="form-group">
                    <div class="input-wrapper">
                        <span class="input-icon"></span>
                        <input type="email" name="email" placeholder="Email" value="<?= old('email') ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <span class="input-icon"></span>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                </div>

                <button type="submit" class="login-btn">Login</button>

                <div class="forgot-link">
                    Forgot <a href="<?= base_url('forgot-password') ?>">Username / Password?</a>
                </div>

                <div class="create-account">
                    <a href="<?= base_url('register') ?>">Create your Account →</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>