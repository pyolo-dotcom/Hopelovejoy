<?php
// admin_login.php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Simple admin credentials (sa production, dapat naka-hash at naka-stored sa database)
    $admin_username = 'admin';
    $admin_password = 'hope2024'; // Palitan mo ito ng mas secure na password
    
    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header('Location: admin_dashboard.php');
        exit();
    } else {
        $error = 'Invalid username or password!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login • Hope Account Specialist</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" href="img/logo.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        :root {
            --black: #0a0a0a;
            --black-light: #1a1a1a;
            --black-lighter: #2a2a2a;
            --gold: #D4AF37;
            --gold-light: #FFD700;
            --gold-dark: #996515;
            --gold-muted: #B8860B;
            --cream: #F5F5DC;
            --white: #ffffff;
            --gray: #888888;
            --gray-light: #e5e5e5;
            --shadow-dark: 0 15px 35px rgba(0,0,0,0.5);
            --shadow-gold: 0 5px 20px rgba(212,175,55,0.2);
            --radius: 16px;
            --radius-sm: 10px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }
        
        body {
            background: var(--black);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            position: relative;
            overflow-y: auto;
            overflow-x: hidden;
        }
        
        /* Animated Background */
        body::before {
            content: '';
            position: fixed;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at 50% 50%, 
                rgba(212, 175, 55, 0.03) 0%, 
                rgba(10, 10, 10, 1) 50%,
                rgba(0, 0, 0, 1) 100%);
            animation: rotate 30s linear infinite;
            pointer-events: none;
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        /* Floating Particles */
        .particle {
            position: fixed;
            width: 3px;
            height: 3px;
            background: var(--gold);
            opacity: 0.3;
            border-radius: 50%;
            pointer-events: none;
        }
        
        .particle:nth-child(1) { top: 10%; left: 5%; animation: float 20s infinite; }
        .particle:nth-child(2) { top: 70%; left: 90%; animation: float 25s infinite; }
        .particle:nth-child(3) { top: 85%; left: 15%; animation: float 22s infinite; }
        .particle:nth-child(4) { top: 45%; left: 95%; animation: float 28s infinite; }
        .particle:nth-child(5) { top: 20%; left: 80%; animation: float 23s infinite; }
        .particle:nth-child(6) { top: 60%; left: 20%; animation: float 26s infinite; }
        .particle:nth-child(7) { top: 90%; left: 70%; animation: float 24s infinite; }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0); opacity: 0.2; }
            50% { transform: translateY(-30px) translateX(15px); opacity: 0.5; }
        }
        
        .login-container {
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(10px);
            padding: 60px 50px;
            border-radius: var(--radius);
            width: 100%;
            max-width: 500px;
            position: relative;
            z-index: 100;
            border: 1px solid rgba(212, 175, 55, 0.3);
            box-shadow: var(--shadow-dark), var(--shadow-gold);
            animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            margin: auto;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Decorative Lines */
        .login-container::before,
        .login-container::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            left: 50%;
            transform: translateX(-50%);
        }
        
        .login-container::before {
            top: 25px;
        }
        
        .login-container::after {
            bottom: 25px;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 50px;
        }
        
        /* Logo Area */
        .logo-wrapper {
            width: 130px;
            height: 130px;
            margin: 0 auto 25px;
            background: linear-gradient(135deg, var(--black-lighter), var(--black));
            border: 3px solid var(--gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 40px rgba(212, 175, 55, 0.3);
            position: relative;
            overflow: hidden;
            padding: 5px;
        }
        
        .logo-wrapper::before {
            content: '';
            position: absolute;
            width: 150%;
            height: 150%;
            background: radial-gradient(circle, rgba(212,175,55,0.15) 0%, transparent 70%);
            animation: pulse 3s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }
        
        .logo-wrapper img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--gold);
            box-shadow: 0 0 30px rgba(212,175,55,0.4);
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }
        
        .logo-wrapper img:hover {
            transform: scale(1.05);
            box-shadow: 0 0 40px rgba(212,175,55,0.6);
        }
        
        .login-header h1 {
            color: var(--white);
            font-size: 2.5rem;
            margin-bottom: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            text-shadow: 0 0 30px rgba(212,175,55,0.4);
        }
        
        .login-header p {
            color: var(--gold);
            font-size: 1.1rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-weight: 500;
            position: relative;
            display: inline-block;
            padding: 0 20px;
        }
        
        .login-header p::before,
        .login-header p::after {
            content: '✦';
            color: var(--gold);
            margin: 0 10px;
            font-size: 1rem;
        }
        
        .login-form .form-group {
            margin-bottom: 30px;
            position: relative;
        }
        
        .login-form label {
            display: block;
            margin-bottom: 10px;
            color: var(--cream);
            font-weight: 600;
            font-size: 0.95rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        
        .login-form label i {
            color: var(--gold);
            margin-right: 8px;
        }
        
        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }
        
        .input-icon {
            position: absolute;
            left: 18px;
            color: var(--gold);
            font-size: 1.1rem;
            opacity: 0.8;
            transition: all 0.3s ease;
            z-index: 1;
        }
        
        .login-form input {
            width: 100%;
            padding: 18px 20px 18px 55px;
            background: var(--black-light);
            border: 1.5px solid var(--black-lighter);
            border-radius: var(--radius-sm);
            font-size: 1.1rem;
            color: var(--white);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            letter-spacing: 0.5px;
        }
        
        .login-form input::placeholder {
            color: rgba(255, 255, 255, 0.25);
            font-weight: 300;
            font-size: 1rem;
        }
        
        .login-form input:focus {
            border-color: var(--gold);
            background: var(--black);
            outline: none;
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.15);
            padding-left: 60px;
        }
        
        .login-form input:focus + .input-icon {
            opacity: 1;
            transform: scale(1.15);
            color: var(--gold-light);
        }
        
        /* Password visibility toggle */
        .password-toggle {
            position: absolute;
            right: 18px;
            color: var(--gray);
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.2rem;
            z-index: 2;
        }
        
        .password-toggle:hover {
            color: var(--gold);
        }
        
        .login-btn {
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
            color: var(--black);
            border: none;
            padding: 18px 30px;
            border-radius: var(--radius-sm);
            font-size: 1.2rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            width: 100%;
            margin-top: 20px;
            text-transform: uppercase;
            letter-spacing: 3px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(212, 175, 55, 0.4);
        }
        
        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s ease;
        }
        
        .login-btn:hover {
            background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold) 100%);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.6);
            letter-spacing: 4px;
        }
        
        .login-btn:hover::before {
            left: 100%;
        }
        
        .login-btn i {
            margin-right: 12px;
            transition: transform 0.3s ease;
        }
        
        .login-btn:hover i {
            transform: translateX(8px);
        }
        
        .error-message {
            background: rgba(212, 175, 55, 0.12);
            color: var(--gold-light);
            padding: 18px 25px;
            border-radius: var(--radius-sm);
            margin-bottom: 30px;
            text-align: center;
            border-left: 5px solid var(--gold);
            backdrop-filter: blur(5px);
            font-weight: 600;
            animation: shake 0.5s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            font-size: 1rem;
        }
        
        @keyframes shake {
            10%, 90% { transform: translateX(-1px); }
            20%, 80% { transform: translateX(2px); }
            30%, 50%, 70% { transform: translateX(-4px); }
            40%, 60% { transform: translateX(4px); }
        }
        
        .error-message i {
            color: var(--gold);
            font-size: 1.2rem;
        }
        
        .back-link {
            text-align: center;
            margin-top: 35px;
            position: relative;
        }
        
        .back-link a {
            color: var(--gray);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            font-size: 1rem;
            padding: 12px 25px;
            border-radius: 30px;
            border: 1.5px solid rgba(212, 175, 55, 0.25);
            background: rgba(10, 10, 10, 0.5);
        }
        
        .back-link a:hover {
            color: var(--gold);
            border-color: var(--gold);
            background: rgba(212, 175, 55, 0.08);
            transform: translateX(-5px);
        }
        
        .back-link a i {
            transition: transform 0.3s ease;
        }
        
        .back-link a:hover i {
            transform: translateX(-5px);
        }
        
        /* Loading State */
        .login-btn.loading {
            pointer-events: none;
            opacity: 0.9;
        }
        
        .login-btn.loading i {
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        /* Footer Note */
        .login-footer {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid rgba(212, 175, 55, 0.2);
            text-align: center;
        }
        
        .login-footer span {
            color: var(--gray);
            font-size: 0.8rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .login-footer span i {
            color: var(--gold);
            font-size: 0.8rem;
        }
        
        /* Responsive Design */
        @media (max-width: 600px) {
            body {
                padding: 20px 15px;
            }
            
            .login-container {
                padding: 45px 30px;
            }
            
            .login-header h1 {
                font-size: 2rem;
            }
            
            .logo-wrapper {
                width: 110px;
                height: 110px;
            }
            
            .logo-wrapper img {
                width: 100px;
                height: 100px;
            }
            
            .login-header p {
                font-size: 0.95rem;
                letter-spacing: 2px;
            }
            
            .login-form input {
                padding: 16px 20px 16px 50px;
                font-size: 1rem;
            }
            
            .login-btn {
                padding: 16px 25px;
                font-size: 1.1rem;
            }
        }
        
        @media (max-height: 800px) {
            .login-container {
                padding: 40px 45px;
            }
            
            .login-header {
                margin-bottom: 35px;
            }
            
            .logo-wrapper {
                width: 110px;
                height: 110px;
                margin-bottom: 20px;
            }
            
            .logo-wrapper img {
                width: 100px;
                height: 100px;
            }
            
            .login-header h1 {
                font-size: 2.2rem;
                margin-bottom: 8px;
            }
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--black);
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--gold-dark);
            border-radius: 5px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--gold);
        }
    </style>
</head>
<body>
    <!-- Floating particles for luxury effect -->
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    
    <div class="login-container">
        <!-- Logo Area with Actual Logo -->
        <div class="login-header">
            <div class="logo-wrapper">
                <img src="img/logo.png" alt="Hope Account Specialist">
            </div>
            <h1>Admin Login</h1>
            <p>Hope Account Specialist</p>
        </div>
        
        <?php if (isset($error)): ?>
            <div class="error-message">
                <i class="fas fa-exclamation-triangle"></i>
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <form class="login-form" method="POST" action="" id="loginForm">
            <div class="form-group">
                <label for="username">
                    <i class="fas fa-user-circle"></i> Username
                </label>
                <div class="input-wrapper">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" id="username" name="username" 
                           placeholder="Enter your username" required 
                           value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="password">
                    <i class="fas fa-lock"></i> Password
                </label>
                <div class="input-wrapper">
                    <i class="fas fa-key input-icon"></i>
                    <input type="password" id="password" name="password" 
                           placeholder="Enter your password" required>
                    <i class="fas fa-eye password-toggle" onclick="togglePassword()"></i>
                </div>
            </div>
            
            <button type="submit" class="login-btn" id="loginBtn">
                <i class="fas fa-sign-in-alt"></i> Access Dashboard
            </button>
        </form>
        
        <div class="back-link">
            <a href="index.php">
                <i class="fas fa-arrow-left"></i> Return to Website
            </a>
        </div>
        
        <div class="login-footer">
            <span>
                <i class="fas fa-shield-alt"></i>
                Secure Admin Access
                <i class="fas fa-shield-alt"></i>
            </span>
        </div>
    </div>
    
    <script>
        // Password visibility toggle
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.password-toggle');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
        
        // Loading state on form submit
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const loginBtn = document.getElementById('loginBtn');
            loginBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Authenticating...';
            loginBtn.classList.add('loading');
        });
        
        // Smooth fade in for error message
        document.addEventListener('DOMContentLoaded', function() {
            const errorMsg = document.querySelector('.error-message');
            if (errorMsg) {
                setTimeout(() => {
                    errorMsg.style.opacity = '0';
                    setTimeout(() => errorMsg.remove(), 500);
                }, 5000);
            }
        });
        
        // Add floating effect to particles
        document.addEventListener('mousemove', function(e) {
            const particles = document.querySelectorAll('.particle');
            particles.forEach((particle, index) => {
                const speed = index * 0.015;
                const x = (window.innerWidth / 2 - e.pageX) * speed;
                const y = (window.innerHeight / 2 - e.pageY) * speed;
                particle.style.transform = `translate(${x}px, ${y}px)`;
            });
        });
    </script>
</body>
</html>