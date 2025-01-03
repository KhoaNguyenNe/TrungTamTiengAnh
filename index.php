<?php
session_start();

// Kết nối đến cơ sở dữ liệu
include "connect.php"; // Đảm bảo kết nối đã được thiết lập trong file này

header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

$isLoggedIn = isset($_SESSION['user_id']); // Kiểm tra nếu người dùng đã đăng nhập
if(isset($_SESSION['user_name'])) {
    $usernameindex = $_SESSION['user_name'];
    $role = $_SESSION['role'];
}

?>


<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Favicon -->
        <link
            rel="shortcut icon"
            href="./assets/favicon/favicon.ico"
            type="image/x-icon"
        />
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- Nhúng CDN Font Awesome -->
        <link rel="preconnect" href="https://cdnjs.cloudflare.com" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <!-- Font -->
        <link rel="stylesheet" href="./assets/font/stylesheet.css" />
        <!-- Reset CSS -->
        <link rel="stylesheet" href="./assets/css/reset.css" />
        <!-- Style CSS  -->
        <link rel="stylesheet" href="./assets/css/style.css" />
        <!-- Responsive -->
        <link rel="stylesheet" href="./assets/css/responsive.css" />
        <title>Web luyện thi TOEIC</title>
    </head>
    <body>
        <header class="header">
            <div class="content nav-content">
                <nav class="navbar">
                    <!--nav mobile-->
                    <label for="nav-mobile-input" class="nav_bars-btn">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"
                        >
                            <!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"
                            />
                        </svg>
                    </label>

                    <input
                        type="checkbox"
                        id="nav-mobile-input"
                        class="nav-input"
                        value=""
                    />

                    <!--Nav_overlay-->
                    <label for="nav-mobile-input" class="nav_overlay"></label>

                    <nav class="nav-mobile">
                        <label for="nav-mobile-input" class="nav-mobile-close">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 352 512"
                            >
                                <!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
                                <path
                                    d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"
                                />
                            </svg>
                        </label>
                        <ul class="nav-mobile-list">
                            <li>
                                <a href="./index.php" class="item-nav-mobile"
                                    >Trang&nbsp;chủ</a
                                >
                            </li>
                            <li>
                                <a
                                    href="./Listen_Reading.php"
                                    class="item-nav-mobile"
                                    >Luyện&nbsp;L&R</a
                                >
                            </li>
                            <li>
                                <a
                                    href="./Speaking_Writing.php"
                                    class="item-nav-mobile"
                                    >Luyện&nbsp;S&W</a
                                >
                            </li>
                            <li>
                                <a
                                    href="./Mock_exams.php"
                                    class="item-nav-mobile"
                                    >Đề&nbsp;thi&nbsp;thử</a
                                >
                            </li>
                            <li>
                                <a href="./grammar.php" class="item-nav-mobile"
                                    >Ngữ&nbsp;pháp</a
                                >
                            </li>
                            <li>
                                <a href="./voca.php" class="item-nav-mobile"
                                    >Từ&nbsp;vựng</a
                                >
                            </li>
                            <li>
                                <a href="./blog.php" class="item-nav-mobile"
                                    >Blog</a
                                >
                            </li>
                            <li>
                                <a
                                    href="./toeic-tip.php"
                                    class="item-nav-mobile"
                                    >TOEIC&nbsp;Tips</a
                                >
                            </li>
                            <?php if (!$isLoggedIn): ?>
                                <li>
                                    <a href="./login.php" class="item-nav-mobile">Đăng&nbsp;nhập</a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="./information.php" class="item-nav-mobile">Cài&nbsp;đặt</a>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </nav>
                    <!-- Logo -->
                    <div class="Logo-nav">
                        <a href="./index.php" class="Logo">
                            <img
                                src="./assets/img/Logo.svg"
                                alt="Logo"
                                class="lg"
                            />
                            <p class="desc-Logo">TOEIC</p>
                        </a>
                    </div>

                    <!-- Navigation pc-->
                    <ul class="nav-items">
                        <li>
                            <a href="./index.php" class="item"
                                >Trang&nbsp;chủ</a
                            >
                        </li>
                        <li>
                            <a href="./Listen_Reading.php" class="item"
                                >Luyện&nbsp;L&R</a
                            >
                        </li>
                        <li>
                            <a href="./Speaking_Writing.php" class="item"
                                >Luyện&nbsp;S&W</a
                            >
                        </li>
                        <li>
                            <a href="./Mock_exams.php" class="item"
                                >Đề&nbsp;thi&nbsp;thử</a
                            >
                        </li>
                        <li>
                            <a href="./grammar.php" class="item"
                                >Ngữ&nbsp;pháp</a
                            >
                        </li>
                        <li>
                            <a href="./voca.php" class="item">Từ&nbsp;vựng</a>
                        </li>
                        <li>
                            <a href="./blog.php" class="item">Blog</a>
                        </li>
                        <li>
                            <a href="./toeic-tip.php" class="item"
                                >TOEIC&nbsp;Tips</a
                            >
                        </li>
                    </ul>

                    <!-- Button -->
                    <div class="actions">
                        <a href="./prenium.php" class="pro btn">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 36 24"
                            >
                                <path
                                    d="m18 0 8 12 10-8-4 20H4L0 4l10 8 8-12z"
                                ></path>
                            </svg>
                            <p>Unlock&nbsp;Pro</p>
                        </a>
                        <?php if (!isset($_SESSION['user_id'])): ?>
                        <a href="./login.php" class="log btn" id="log">
                            <p class="text">Đăng&nbsp;nhập</p>
                        </a>
                        <?php else: ?>
                            <li class="nav-item dropdown btn">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><?php echo $usernameindex ?></a>
                            <ul class="dropdown-menu dropmn">
                                <li><a class="dropdown-item" href="/TRUNGTAMTIENGANH/verify_password.php">Thay đổi thông tin</a></li>
                                <?php
                                    // Giả sử biến $role được lấy từ session hoặc cơ sở dữ liệu
                                    if ($role == 'Admin') {
                                        echo '<li><a class="dropdown-item" href="/TRUNGTAMTIENGANH/quan_ly.php">Trang quản lý</a></li>';
                                    }
                                    if ($role == 'Giảng viên') {
                                        echo '<li><a class="dropdown-item" href="/TrungTamTiengAnh/lectures.php">Quản lý bài giảng</a></li>';
                                    }
                                ?>
                                <li><a class="dropdown-item" href="/TrungTamTiengAnh/LOGCODE/logout.php">Đăng xuất</a></li>
                            </ul>
                            </li>
                        <?php endif; ?>
                    </div>
                </nav>
            </div>
        </header>

        <main class="main">
            <!-- Phần đầu web -->
            <div class="head">
                <div class="content">
                    <!-- Nội dung -->
                    <div class="info">
                        <h1 class="title">
                            Luyện thi
                            <strong class="highlight">TOEIC</strong> online 2023
                        </h1>
                        <p class="desc">
                            Chào mừng đến với TOEIC Test Pro, trang web/ ứng
                            dụng TOEIC cung cấp cho người học các bài luyện tập
                            theo từng part, đề thi thử cũng như các bài&nbsp;tập
                            về từ vựng và ngữ pháp. Bắt đầu hành trình chinh
                            phục chứng chỉ TOEIC với các bài luyện tập trên
                            trang web/ứng dụng của chúng tôi ngay hôm nay!
                        </p>
                        <div class="head-actions">
                            <a class="log btn head-btn hoc-ngay" href="./my_course.php?id=<?= $usernameid ?>">
                                <p class="text">Học&nbsp;ngay</p>
                            </a>

                            <a href="prenium.php" class="pro btn head-btn">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 36 24"
                                >
                                    <path
                                        d="m18 0 8 12 10-8-4 20H4L0 4l10 8 8-12z"
                                    ></path>
                                </svg>
                                Đăng&nbsp;ký&nbsp;khóa&nbsp;học&nbsp;Pro
                            </a>
                        </div>

                        <!-- Đánh giá -->
                        <div class="access">
                            <img src="./assets/img/5Stars.svg" alt="Stars" />
                            <h2 class="number-review">10000+</h2>
                            <p class="result-review">
                                Clients reviews (5 of 5)
                            </p>
                            <h5 class="desc-review">All Review</h5>
                            <img
                                src="./assets/img/Book.png"
                                alt="Book"
                                class="book"
                            />
                        </div>
                    </div>

                    <div class="photo">
                        <div class="row-1">
                            <div class="photo1">
                                <img
                                    src="./assets/img/Photo1.svg"
                                    alt="Photo1"
                                />
                            </div>
                            <div class="photo2">
                                <img
                                    src="./assets/img/Photo2.svg"
                                    alt="Photo2"
                                    class="photo2"
                                />
                            </div>
                        </div>

                        <div class="row-2">
                            <div class="photo3">
                                <img
                                    src="./assets/img/Photo3.svg"
                                    alt="Photo3"
                                    class="photo3"
                                />
                            </div>
                            <div class="photo4">
                                <img
                                    src="./assets/img/Photo4.svg"
                                    alt="Photo4"
                                    class="photo4"
                                />
                            </div>
                            <div class="scoll-down">
                                <img
                                    src="./assets/img/Mouse.svg"
                                    alt="Mouse"
                                    class="mouse"
                                />
                                <p class="desc">Scroll Down</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Why Choose Us -->
            <div class="why_choose">
                <div class="content">
                    <div class="infos">
                        <div class="info">
                            <h3
                                class="num"
                                id="daily-count"
                                data-final-number="5000"
                            >
                                5000
                            </h3>
                            <p class="desc">Daily&nbsp;Active&nbsp;Users</p>
                        </div>
                        <div class="info">
                            <h3
                                class="num"
                                id="star-count"
                                data-final-number="120"
                            >
                                120
                            </h3>
                            <p class="desc">5-Star Ratings</p>
                        </div>
                        <div class="info">
                            <h3
                                class="num"
                                id="app-count"
                                data-final-number="20000"
                            >
                                20000
                            </h3>
                            <p class="desc">App Downloads</p>
                        </div>
                        <div class="info">
                            <h3
                                class="num"
                                id="sub-count"
                                data-final-number="30000"
                            >
                                30000
                            </h3>
                            <p class="desc">Subjects</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Test TOEIC -->
            <div class="test">
                <div class="content">
                    <h2 class="title">Mô phỏng bài thi TOEIC</h2>
                    <div class="test-item">
                        <div class="img">
                            <img
                                src="./assets/img/pc_test.webp"
                                alt=""
                                class="img-test"
                            />
                        </div>

                        <div class="info">
                            <h2 class="title-item">Thi&nbsp;Mô&nbsp;Phỏng</h2>
                            <p class="desc">
                                Luyện thi mô phỏng trên máy tính như thi thật
                                giúp bạn làm quen khi bước vào kì thi chính thức
                            </p>
                        </div>

                        <div class="to-test-btn">
                            <a href="" class="btn log">
                                <p class="text">Luyện tập</p>
                            </a>
                        </div>
                    </div>

                    <div class="test-item">
                        <div class="img">
                            <img
                                src="./assets/img/mini-test.webp"
                                alt=""
                                class="img-test"
                            />
                        </div>

                        <div class="info">
                            <h2 class="title-item">MINI TEST</h2>
                            <p class="desc">
                                Làm bài mini test với số lượng câu hỏi và thời
                                gian giảm một nửa so với bài thi thật.
                            </p>
                        </div>

                        <div class="to-test-btn">
                            <a href="" class="btn log">
                                <p class="text">Luyện tập</p>
                            </a>
                        </div>
                    </div>

                    <div class="test-item">
                        <div class="img">
                            <img
                                src="./assets/img/full-test.webp"
                                alt=""
                                class="img-test"
                            />
                        </div>

                        <div class="info">
                            <h2 class="title-item">FULL TEST</h2>
                            <p class="desc">
                                Làm bài full test với số lượng câu hỏi và thời
                                gian giống như bài thi thật
                            </p>
                        </div>

                        <div class="to-test-btn">
                            <a href="" class="btn log">
                                <p class="text">Luyện tập</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Function  -->
            <div class="function_web">
                <div class="content">
                    <h1 class="heading">Chức năng</h1>

                    <div class="group-info">
                        <div class="photo-left">
                            <img
                                src="./assets/img/iMac_web.png"
                                alt="web"
                                class="web"
                            />
                        </div>
                        <div class="parent-info">
                            <div class="info">
                                <div class="icon">
                                    <img
                                        src="./assets/img/func_web-1.svg"
                                        alt=""
                                        class="icon"
                                    />
                                </div>
                                <h2 class="title">Ngân hàng đề thi</h2>
                                <p class="desc">
                                    Ngân hàng đề thi đa dạng với nhiều chủ đề
                                    khác nhau sẽ giúp bạn chuẩn bị tốt nhất cho
                                    kỳ thi của mình
                                </p>
                            </div>
                            <div class="info">
                                <div class="icon">
                                    <img
                                        src="./assets/img/func_web-2.svg"
                                        alt=""
                                        class="icon"
                                    />
                                </div>
                                <h2 class="title">Mô phỏng bài thi thật</h2>
                                <p class="desc">
                                    Các bài thi thử có cấu trúc giống như bài
                                    thi thật sẽ giúp bạn vượt qua kỳ thi một
                                    cách thành công
                                </p>
                            </div>
                            <div class="info">
                                <div class="icon">
                                    <img
                                        src="./assets/img/func_web-3.svg"
                                        alt=""
                                    />
                                </div>
                                <h2 class="title">
                                    Không cần đăng nhập hoặc đăng ký
                                </h2>
                                <p class="desc">
                                    Không cần đăng nhập hoặc đăng ký, tiến trình
                                    học tập của bạn vẫn sẽ được lưu lại.
                                </p>
                            </div>
                            <div class="info">
                                <div class="icon">
                                    <img
                                        src="./assets/img/func_web-4.svg"
                                        alt=""
                                        class="icon"
                                    />
                                </div>
                                <h2 class="title">Thống kê kết quả chi tiết</h2>
                                <p class="desc">
                                    Sau khi hoàn thành mỗi bài luyện tập, bạn có
                                    thể xem thống kê chi tiết kết quả bài làm
                                    của mình
                                </p>
                            </div>
                        </div>
                    </div>

                    <a href="./Mock_exams.php" class="btn log func-btn"
                        ><p class="text">Làm bài thi thử ngay</p></a
                    >
                </div>
            </div>

            <!-- Comments -->
            <div class="comments">
                <div class="content">
                    <div class="comments_title">
                        <h2 class="title">Mọi người nghĩ gì về chúng tôi</h2>
                        <p class="desc">
                            Cảm ơn những lời nhận xét của mọi người
                        </p>
                    </div>

                    <div id="form-List">
                        <div id="list"></div>
                    </div>

                    <div class="direction">
                        <button id="prev" class="button">
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>
                        <button id="next" class="button">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Subscribe -->
            <div class="subcribe">
                <div class="content">
                    <div class="info">
                        <h1 class="heading-sub">
                            Đăng ký để nhận cập nhật mọi khóa học mới
                        </h1>
                        <p class="desc-sub">
                            Đăng ký ngay để có thể truy cập vào các bài học chất
                            lượng nhất đến từ khóa học Pro của chúng tôi giúp
                            bạn nâng tâm tiếng Anh của bản thân
                        </p>

                        <form
                            autocomplete="off"
                            method="post"
                            action="https://api-gateway.fullstack.edu.vn/action_page.php"
                            class="form-group"
                        >
                            <div class="form-label">
                                <input
                                    type="email"
                                    id="mail"
                                    class="email-input"
                                    name="email"
                                    placeholder="Enter your email address"
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                    required
                                />
                                <p class="form-error">
                                    Vui lòng nhập đúng email
                                </p>
                            </div>
                            <button type="submit" class="log btn sub-btn">
                                <span class="text">Đăng ký</span>
                            </button>
                        </form>

                        <img
                            src="./assets/img/Book.svg"
                            alt="Book"
                            class="sub-book1"
                        />
                        <img
                            src="./assets/img/Book.svg"
                            alt="Book"
                            class="sub-book2"
                        />
                    </div>
                </div>
            </div>

            <div class="more-inf">
                <div class="content" id="inf">
                    <h2 class="title">1. Tổng quan về bài thi TOEIC</h2>
                    <div class="first">
                        <h3 class="mini-title">1.1. TOEIC là gì?</h3>
                        <p class="desc">
                            TOEIC (the Test of English for International
                            Communication) là bài kiểm tra đánh giá khả năng sử
                            dụng tiếng Anh trong môi trường giao tiếp quốc tế.
                            Kỳ thi thuộc bản quyền của Viện Khảo thí giáo dục
                            Hoa Kỳ.
                        </p>
                        <p class="desc">
                            Các câu hỏi trong đề thi TOEIC® liên quan đến các
                            chủ đề như hội họp, du lịch, thông báo, email.
                        </p>
                    </div>
                    <div class="not-first none">
                        <h3 class="mini-title">1.2. Cấu trúc bài thi TOEIC</h3>
                        <p class="desc">
                            Bài thi TOEIC bao gồm hai phần: Đọc và Nghe. Các thí
                            sinh sẽ thi phần Đọc hiểu trong thời gian 75 phút và
                            phần nghe trong thời gian 45 phút. Tổng thời gian
                            cho một bài thi TOEIC là 120 phút.
                        </p>
                        <p class="desc">
                            Mỗi phần gồm 100 câu hỏi trắc nghiệm.
                        </p>
                        <p class="desc">
                            Đây là định dạng mới của kỳ thi. Giống như định dạng
                            trước, định dạng mới bao gồm 7 phần; tuy nhiên, số
                            lượng câu hỏi trong một số phần đã được thay đổi.
                        </p>
                        <table class="desc table">
                            <thead class="title-tb">
                                <tr>
                                    <th>Kỹ năng</th>
                                    <th>Phần</th>
                                    <th>Số lượng câu hỏi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="4" class="merge">Nghe</td>
                                    <td>Phần 1: Mô tả tranh</td>
                                    <td>6</td>
                                </tr>
                                <tr>
                                    <td>Phần 2: Hỏi – Đáp</td>
                                    <td>25</td>
                                </tr>
                                <tr>
                                    <td>Phần 3: Đoạn hội thoại</td>
                                    <td>
                                        39 (13 đoạn hội thoại, 3 câu hỏi mỗi
                                        đoạn)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phần 4: Bài nói ngắn</td>
                                    <td>
                                        30 (10 bài nói, 3 câu hỏi mỗi bài nói)
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="4" class="merge">Đọc</td>
                                    <td>Phần 5: Hoàn thành câu</td>
                                    <td>30</td>
                                </tr>
                                <tr>
                                    <td>Phần 6: Hoàn thành đoạn văn</td>
                                    <td>30</td>
                                </tr>
                                <tr>
                                    <td
                                        rowspan="2"
                                        style="vertical-align: middle"
                                    >
                                        Phần 7: Đọc hiểu
                                    </td>
                                    <td>
                                        Đoạn đơn : 29 ( 10 đoạn đơn, 2-4 câu hỏi
                                        mỗi đoạn đơn)
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Đoạn đa: 25 (2 đoạn kép + 3 đoạn ba , 5
                                        câu hỏi mỗi đoạn kép và mỗi đoạn ba)
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="not-first none">
                        <h3 class="mini-title">
                            1.3. Cách tính điểm bài thi TOEIC
                        </h3>
                        <p class="desc">
                            TOEIC không phải là một kỳ thi đạt hoặc không đạt.
                            TOEIC đánh giá năng lực tiếng Anh của bạn trong các
                            kỹ năng Đọc và Nghe.
                        </p>
                        <p class="desc">
                            Trong bài thi TOEIC Reading và Listening, điểm số
                            của thí sinh được xác định dựa trên số câu hỏi mà họ
                            trả lời đúng, sau đó được chuyển thành thang điểm.
                            Bạn sẽ nhìn thấy điểm từng phần đọc, phần nghe đã
                            được quy đổi cũng như điểm tổng của 2 kỹ năng này
                            trên chứng chỉ TOEIC của bạn.
                        </p>
                        <p class="desc">
                            Bài thi TOEIC Nghe và Đọc có thang điểm từ 10 đến
                            990. Vì vậy, điểm tối đa cho mỗi kỹ năng là 495.
                        </p>
                        <table class="desc table">
                            <tbody>
                                <tr>
                                    <td class="text-center">10 - 250</td>
                                    <td>Mức độ cơ bản</td>
                                </tr>
                                <tr>
                                    <td class="text-center">255 - 400</td>
                                    <td>Mức độ sơ cấp</td>
                                </tr>
                                <tr>
                                    <td class="text-center">405 - 600</td>
                                    <td>Mức độ trên sơ cấp</td>
                                </tr>
                                <tr>
                                    <td class="text-center">605 - 780</td>
                                    <td>
                                        Khả năng sử dụng tiếng Anh trong công
                                        việc còn hạn chế
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">785 - 900</td>
                                    <td>
                                        Đủ năng lực dùng trong môi trường làm
                                        việc
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">905 - 990</td>
                                    <td>Năng lực giao tiếp quốc tế</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="continute">Xem thêm</button>
                </div>
            </div>
        </main>

        <footer class="footer">
            <div class="content">
                <div class="row row-top">
                    <div class="column-1">
                        <h2 class="heading">Luyện&nbsp;thi</h2>
                        <ul class="list">
                            <li class="item">
                                <a href="./Listen_Reading.php"
                                    >Luyện&nbsp;L&R</a
                                >
                            </li>
                            <li class="item">
                                <a href="./Speaking_Writing.php"
                                    >Luyện&nbsp;S&W</a
                                >
                            </li>
                            <li class="item">
                                <a href="./Mock_exams.php"
                                    >Đề&nbsp;thi&nbsp;thử</a
                                >
                            </li>
                            <li class="item">
                                <a href="./grammar.php">Ngữ&nbsp;pháp</a>
                            </li>
                            <li class="item">
                                <a href="./voca.php">Từ&nbsp;vựng</a>
                            </li>
                        </ul>
                    </div>

                    <div class="column-2">
                        <h2 class="heading">Hỗ&nbsp;trợ</h2>
                        <ul class="list">
                            <li class="item">
                                <a href="./aboutus.php">Giới&nbsp;thiệu</a>
                            </li>
                            <li class="item">
                                <a href="./contact.php">Liên&nbsp;hệ</a>
                            </li>
                            <li class="item">
                                <a href="./term.php">Điều&nbsp;khoản</a>
                            </li>
                        </ul>
                    </div>

                    <div class="column-3">
                        <div class="email-call mail">
                            <p class="desc-email-call">Email us</p>
                            <a href="mailto:email@gmail.com" class="mail-call"
                                >email@gmail.com</a
                            >
                            <div class="social-media">
                                <div class="card">
                                    <a
                                        href="https://www.instagram.com/xuanchinhhuynh/"
                                        class="socialContainer containerOne"
                                    >
                                        <svg
                                            class="socialSvg instagramSvg"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
                                            ></path>
                                        </svg>
                                    </a>

                                    <a
                                        href="https://www.facebook.com/xuanchinhhuynh"
                                        class="socialContainer containerTwo"
                                    >
                                        <svg
                                            class="fb socialSvg icon flat-color"
                                            fill="#000000"
                                            width="800px"
                                            height="800px"
                                            viewBox="0 0 24 24"
                                            id="facebook"
                                            data-name="Flat Color"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                id="primary"
                                                d="M14,6h3a1,1,0,0,0,1-1V3a1,1,0,0,0-1-1H14A5,5,0,0,0,9,7v3H7a1,1,0,0,0-1,1v2a1,1,0,0,0,1,1H9v7a1,1,0,0,0,1,1h2a1,1,0,0,0,1-1V14h2.22a1,1,0,0,0,1-.76l.5-2a1,1,0,0,0-1-1.24H13V7A1,1,0,0,1,14,6Z"
                                                style="fill: rgb(0, 0, 0)"
                                            ></path>
                                        </svg>
                                    </a>

                                    <a
                                        href="https://www.linkedin.com/in/hu%E1%BB%B3nh-xu%C3%A2n-ch%C3%ADnh-302715244/"
                                        class="socialContainer containerThree"
                                    >
                                        <svg
                                            class="socialSvg linkdinSvg"
                                            viewBox="0 0 448 512"
                                        >
                                            <path
                                                d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"
                                            ></path>
                                        </svg>
                                    </a>

                                    <a
                                        href="#!"
                                        class="socialContainer containerFour"
                                    >
                                        <svg
                                            class="socialSvg whatsappSvg"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"
                                            ></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column-4">
                        <div class="email-call call">
                            <p class="desc-email-call">Call&nbsp;us</p>
                            <a href="tel:00012345678" class="mail-call"
                                >000&nbsp;1234&nbsp;5678</a
                            >
                        </div>
                    </div>
                </div>
                <div class="row row-bottom">
                    <!-- Logo -->
                    <div class="footer-Logo">
                        <a href="./index.php" class="Logo">
                            <img
                                src="./assets/img/Logo.svg"
                                alt="Logo"
                                class="lg"
                            />
                            <p class="desc-Logo">TOEIC</p>
                        </a>
                    </div>

                    <!-- Bank -->
                    <div class="footer-bank">
                        <img
                            src="./assets/img/Bank.svg"
                            alt="Bank"
                            class="bank"
                        />
                    </div>

                    <div class="footer-copyright">
                        <p class="copy-right">
                            Copyright&nbsp;©&nbsp;2023&nbsp;BY&nbsp;TOEIC.
                        </p>
                    </div>
                </div>
            </div>
        </footer>

        <a href="#" class="btn-to-top">
            <i class="fa-solid fa-jet-fighter-up"></i>
        </a>

        <!-- Nhúng Javascript -->
        <script src="./assets/js/index.js"></script>
        <script src="./assets/js/go-top.js"></script>
        <script src="./assets/js/if_log.js"></script>
    </body>
</html>
