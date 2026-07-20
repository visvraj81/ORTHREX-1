<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Work Sans', sans-serif;
            background: #15273F;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding: 20px;
        }

        /* Floating Background Icons */
        .bg-icon {
            position: absolute;
            color: rgba(255, 255, 255, 0.09);
            pointer-events: none;
            user-select: none;
            z-index: 1;
        }

        .bg-icon-1 { top: 12%; left: 6%; font-size: 110px; transform: rotate(-10deg); }
        .bg-icon-2 { top: 20%; left: 38%; font-size: 80px; transform: rotate(5deg); }
        .bg-icon-3 { top: 22%; right: 10%; font-size: 120px; transform: rotate(15deg); }
        .bg-icon-4 { bottom: 30%; left: 9%; font-size: 100px; transform: rotate(-5deg); }
        .bg-icon-5 { bottom: 10%; left: 28%; font-size: 130px; transform: rotate(-12deg); }
        .bg-icon-6 { bottom: 18%; right: 14%; font-size: 115px; transform: rotate(8deg); }

        /* Main Card Container */
        .error-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 55px 45px 45px;
            max-width: 560px;
            width: 100%;
            text-align: center;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.25);
            position: relative;
            z-index: 10;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* 404 Text */
        .error-code {
            font-size: 110px;
            font-weight: 800;
            color: #3152a3;
            line-height: 1;
            margin-bottom: 22px;
            letter-spacing: -2px;
        }

        /* Illustration Icon */
        .icon-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 24px;
        }

        .doc-icon-svg {
            width: 64px;
            height: 64px;
        }

        /* Typography */
        .error-title {
            font-size: 26px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 14px;
        }

        .error-message {
            font-size: 14.5px;
            color: #64748b;
            line-height: 1.6;
            margin: 0 auto 32px;
            max-width: 440px;
            font-weight: 400;
        }

        /* Action Button */
        .btn-home {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background-color: #3556aa;
            color: #ffffff;
            font-size: 15px;
            font-weight: 600;
            padding: 13px 30px;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.25s ease;
            box-shadow: 0 4px 12px rgba(53, 86, 170, 0.3);
        }

        .btn-home:hover {
            background-color: #27438c;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(53, 86, 170, 0.4);
        }

        .btn-home:active {
            transform: translateY(0);
        }

        .btn-home i {
            font-size: 16px;
        }

        @media (max-width: 576px) {
            .error-card {
                padding: 40px 25px 35px;
            }
            .error-code {
                font-size: 85px;
            }
            .error-title {
                font-size: 22px;
            }
            .error-message {
                font-size: 13.5px;
            }
        }
    </style>
</head>
<body>

    <!-- Background Pattern Icons matching the design -->
    <div class="bg-icon bg-icon-1"><i class="fa-solid fa-square-plus"></i></div>
    <div class="bg-icon bg-icon-2"><i class="fa-solid fa-chart-line"></i></div>
    <div class="bg-icon bg-icon-3"><i class="fa-solid fa-car"></i></div>
    <div class="bg-icon bg-icon-4"><i class="fa-solid fa-house-chimney"></i></div>
    <div class="bg-icon bg-icon-5"><i class="fa-solid fa-plane"></i></div>
    <div class="bg-icon bg-icon-6"><i class="fa-solid fa-briefcase"></i></div>

    <!-- Central 404 Container -->
    <div class="error-card">
        <div class="error-code">404</div>

        <!-- Custom Document with Question Mark Icon -->
        <div class="icon-container">
            <svg class="doc-icon-svg" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Document Body -->
                <path d="M18 8C14.6863 8 12 10.6863 12 14V50C12 53.3137 14.6863 56 18 56H46C49.3137 56 52 53.3137 52 50V22L38 8H18Z" fill="#B0C2DE" fill-opacity="0.6"/>
                <path d="M38 8V18C38 20.2091 39.7909 22 42 22H52" fill="#8FA5C9"/>
                <!-- Question mark circle overlay -->
                <circle cx="42" cy="42" r="13" fill="#3556AA"/>
                <text x="42" y="47" font-family="'Work Sans', sans-serif" font-size="15" font-weight="700" fill="#FFFFFF" text-anchor="middle">?</text>
            </svg>
        </div>

        <h1 class="error-title">Oops! Page Not Found</h1>

        <p class="error-message">
            The page you're looking for seems to have wandered off. It might have been moved, deleted, or perhaps never existed in the first place.
        </p>

        <a href="{{ url('/') }}" class="btn-home">
            <i class="fa-solid fa-house"></i> Back to Homepage
        </a>
    </div>

</body>
</html>
