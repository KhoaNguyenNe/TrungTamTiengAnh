
<?php

    
    //Kiểm tra đăng nhập
    include 'checkRole.php';




    //Xét user_type của user
    // phân quyền giảng viên và quản trị ở nút xóa tất cả
     // Kiểm tra và phân quyền
     function checkPermission($lecture_teacher_id, $user_role, $user_id) {
        if ($user_role == 'Admin') {
            return true; // Quản trị viên có quyền sửa và xóa tất cả
        }
        if ($user_role == 'Giảng viên' && $lecture_teacher_id == $user_id) {
            return true; // Giảng viên chỉ có thể sửa và xóa bài giảng của mình
        }
        return false; // Không có quyền
    }

    include 'connect.php';

    $sql = "SELECT * FROM lectures";
    $result = $conn->query($sql);

    // Lưu kết quả vào biến $listLectures dưới dạng một mảng
    $listLectures = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $listLectures[] = $row;  // Lưu từng dòng kết quả vào mảng
        }
    } else {
        echo "0 results";
    }

    // Đóng kết nối
    $conn->close();

?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Favicon -->
        <link
            rel="shortcut icon"
            href="./assets/favicon/favicon.ico"
            type="image/x-icon"
        />
        
        <!-- Nhúng CDN Font Awesome -->
        <link rel="preconnect" href="https://cdnjs.cloudflare.com" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <!-- Font  -->
        <link rel="stylesheet" href="./assets/font/stylesheet.css" />
        <!-- Reset CSS -->
        <link rel="stylesheet" href="./assets/css/reset.css" />
        <!-- Responsive -->
        <link rel="stylesheet" href="./assets/css/responsive.css" />
        <!-- Style CSS -->
        <link rel="stylesheet" href="./assets/css/style.css" />
        <!-- L_R CSS -->
        <link rel="stylesheet" href="./assets/css/lectures.css" />
        
        <title>Listen and Reading</title>
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
                            <li>
                                <a href="./login.php" class="item-nav-mobile"
                                    >Đăng&nbsp;nhập</a
                                >
                            </li>
                            
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
                        <a href="./login.php" class="log btn" id="log">
                            <p class="text">Đăng&nbsp;nhập</p>
                        </a>
                    </div>
                </nav>
            </div>
        </header>

        <main>
            <div class="container">
                <hr>
                <h2>Quản lí bài giảng</h2>
                <p>
                    <button class="add-button"><a href="/TrungTamTiengAnh/Lectures/addlecture.php"><i class="fa-solid fa-plus"></i>Thêm bài giảng</a></button>
                </p>
                <table class="table table-bordered">
                    <thead>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Mô tả</th>
                        <th>Nội dung</th>
                        <th>Giảng Viên</th>
                        <th>Trạng Thái</th>
                        <th width = "5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </thead>
                    <tbody>
                    <?php
                        $count = 0;
                        foreach($listLectures as $item):
                                $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $item['title']; ?></td>
                        <td><?php echo $item['description']; ?></td>
                        <td><?php echo $item['content']; ?></td>
                        <td><?php echo $item['teacher_id']; ?></td>
                        <td><?php echo $item['status']; ?></td>
                        <td><button class="fix-button"><a href=""><i class="fa-solid fa-pen-to-square"></i></a></button></td>
                        <td><button class="delete-button""><a href=""onclick = "return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a></button></td>
                    </tr>
                    <?php
                        endforeach;
                        
                    ?>
                    
                        </tbody>
                </table>
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
        <script src="./assets/js/khoaHoc.js"></script>
        <script src="./assets/js/go-top.js"></script>
        <script src="./assets/js/if_log.js"></script>
    </body>
</html>
