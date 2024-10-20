<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Favicon -->
        <link
            rel="shortcut icon"
            href="../assets/favicon/favicon.ico"
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
        <!-- Style CSS -->
        <link rel="stylesheet" href="../assets/font/stylesheet.css" />
        <!-- Responsive -->
        <link rel="stylesheet" href="../assets/css/responsive.css" />
        <!-- Reset CSS -->
        <link rel="stylesheet" href="../assets/css/reset.css" />
        <!-- Font  -->
        <link rel="stylesheet" href="../assets/css/style.css" />
        <!-- Term CSS -->
        <link rel="stylesheet" href="../assets/css/term.css" />
        <title>Điều khoản - Web luyện thi TOEIC</title>
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
                                <a href="./index.html" class="item-nav-mobile"
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
                                <a href="./blog.php" class="item-nav-mobile">Blog</a>
                            </li>
                            <li>
                                <a href="./toeic-tip.php" class="item-nav-mobile"
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
                        <a href="./index.html" class="Logo">
                            <img
                                src="../assets/img/Logo.svg"
                                alt="Logo"
                                class="lg"
                            />
                            <p class="desc-Logo">TOEIC</p>
                        </a>
                    </div>

                    <!-- Navigation pc-->
                    <ul class="nav-items">
                        <li>
                            <a href="./index.html" class="item"
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
                            <a href="./toeic-tip.php" class="item">TOEIC&nbsp;Tips</a>
                        </li>
                    </ul>

                    <!-- Button -->
                    <div class="actions">
                        <a href="./prenium.php" class="pro btn" id="log">
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
                        <a href="./login.php" class="log btn">
                            <p class="text">Đăng&nbsp;nhập</p>
                        </a>
                    </div>
                </nav>
            </div>
        </header>

        <div class="phara">
            <div class="paper">
                <p>
                    <a class="indam"
                        >Để hoạt động của
                        website:&nbsp;toeic-testpro.com&nbsp;được thuận lợi và
                        chấp hành tốt chủ trương của Đảng và nhà nước. Ban quản
                        trị Website:&nbsp;toeic-testpro.com&nbsp;xin thông báo
                        về Chính sách hoạt động và quy định chung của
                        website&nbsp;toeic-testpro.com. Cụ thể như sau:</a
                    >
                </p>
                <h3><a class="indam">I. HƯỚNG DẪN SỬ DỤNG WEBSITE</a></h3>
                <p>
                    - Nghiêm cấm sử dụng bất kỳ phần nào của trang web này với
                    mục đích thương mại nếu không được chúng tôi cho phép bằng
                    văn bản. Nếu vi phạm bất cứ điều nào trong đây, chúng tôi sẽ
                    hủy giấy phép của bạn mà không cần báo trước.
                </p>
                <p>
                    - Quý khách phải đăng ký tài khoản với thông tin xác thực về
                    bản thân và phải cập nhật nếu có bất kỳ thay đổi nào. Mỗi
                    người truy cập phải có trách nhiệm với mật khẩu, tài khoản
                    và hoạt động của mình trên web. Hơn nữa, quý khách phải
                    thông báo cho chúng tôi biết khi tài khoản bị truy cập trái
                    phép. Chúng tôi không chịu bất kỳ trách nhiệm nào, dù trực
                    tiếp hay gián tiếp, đối với những thiệt hại hoặc mất mát gây
                    ra do quý khách không tuân thủ quy định.
                </p>
                <p>
                    - Trong suốt quá trình đăng ký, quý khách đồng ý nhận email
                    quảng cáo từ website. Sau đó, nếu không muốn tiếp tục nhận
                    mail, quý khách có thể từ chối bằng cách nhấp vào đường link
                    ở dưới cùng trong mọi email quảng cáo.
                </p>
                <h3><a class="indam">II. Ý KIẾN KHÁCH HÀNG</a></h3>
                <p>
                    - Tất cả nội dung trang web và ý kiến phê bình của quý khách
                    đều là tài sản của chúng tôi. Nếu chúng tôi phát hiện bất kỳ
                    thông tin giả mạo nào, chúng tôi sẽ khóa tài khoản của quý
                    khách ngay lập tức hoặc áp dụng các biện pháp khác theo quy
                    định của pháp luật Việt Nam.
                </p>
                <h3><a class="indam">III. THÔNG TIN SẢN PHẨM</a></h3>
                <p>
                    - Sản phẩm cung cấp tại Website&nbsp;<a class="indam"
                        >toeic-testpro.com</a
                    >
                    là các bài luyện tập online.
                </p>
                <p>&nbsp;</p>
                <h3>
                    <a class="indam"
                        >IV. GIAO KẾT GIAO DỊCH TẠI WEBSITE toeic-testpro.com</a
                    >
                </h3>
                <p>
                    Khách hàng khi sử dụng dịch vụ tại&nbsp;<a class="indam"
                        >toeic-testpro.com</a
                    >&nbsp;phải thực hiện các thao tác đăng ký theo trình tự
                    sau:
                </p>
                <ul>
                    <li>Bước 1: Kích vào đăng ký</li>
                    <li>Bước 2: Tạo tài khoản đăng nhập</li>
                    <li>Bước 3: Tạo mật khẩu đăng nhập</li>
                    <li>Bước 4: Nhập các thông tin theo yêu cầu</li>
                    <li>
                        Bước 7: Khi bạn đăng ký thì đã đồng ý với những điều
                        khoản của chúng tôi
                    </li>
                </ul>
                <h3>
                    <a class="indam"
                        >V. GIẢI QUYẾT HẬU QUẢ DO LỖI NHẬP SAI THÔNG TIN THƯƠNG
                        MẠI TẠI toeic-testpro.com</a
                    >
                </h3>
                <p>
                    - Khách hàng có trách nhiệm cung cấp thông tin đầy đủ và
                    chính xác khi tham gia giao dịch tại&nbsp;<a class="indam"
                        >toeic-testpro.com</a
                    >. Trong trường hợp khách hàng nhập sai thông tin gửi vào
                    trang web&nbsp;<a class="indam">toeic-testpro.com</a
                    >,&nbsp;<a class="indam">toeic-testpro.com</a> có quyền từ
                    chối thực hiện giao dịch.
                </p>
                <h3><a class="indam">VI. GIẢI QUYẾT TRANH CHẤP</a></h3>
                <p>
                    - Bất kỳ tranh cãi, khiếu nại hoặc tranh chấp phát sinh từ
                    giao dịch hoặc liên quan đến giao dịch tại&nbsp;<a
                        class="indam"
                        >toeic-testpro.com</a
                    >&nbsp;hoặc các Quy định và Điều kiện này đều sẽ được giải
                    quyết bằng hình thức thương lượng, hòa giải, trọng tài
                    và/hoặc Tòa án.
                </p>
                <h3><a class="indam">VII. QUY ĐỊNH CHẤM DỨT THỎA THUẬN</a></h3>
                <p>
                    - Trong trường hợp có bất kỳ thiệt hại nào phát sinh do việc
                    vi phạm Quy Định sử dụng trang web, chúng tôi có quyền đình
                    chỉ hoặc khóa tài khoản của quý khách vĩnh viễn. Nếu quý
                    khách không hài lòng với trang web hoặc bất kỳ điều khoản,
                    điều kiện, quy tắc, chính sách, hướng dẫn, hoặc cách thức
                    vận hành của&nbsp;<a class="indam">toeic-testpro.com</a
                    >&nbsp;thì biện pháp khắc phục duy nhất là ngưng làm việc
                    với chúng tôi.
                </p>
                <h3><a class="indam">VIII. MỤC ĐÍCH VÀ PHẠM VI THU THẬP</a></h3>
                <p>
                    Việc thu thập dữ liệu chủ yếu trên website&nbsp;<a
                        class="indam"
                        >toeic-testpro.com</a
                    >
                    bao gồm: họ tên, email, tên đăng nhập, mật khẩu đăng nhập.
                    Đây là các thông tin mà
                    <a class="indam">toeic-testpro.com</a>&nbsp;yêu cầu thành
                    viên cung cấp bắt buộc khi đăng ký sử dụng dịch vụ và
                    để&nbsp;<a class="indam">toeic-testpro.com</a>&nbsp;liên hệ
                    xác nhận khi khách hàng đăng ký sử dụng dịch vụ trên website
                    nhằm đảm bảo quyền lợi cho khách hàng. Trong quá trình giao
                    dịch thanh toán tại website&nbsp;<a class="indam"
                        >toeic-testpro.com</a
                    >, Chúng tôi chỉ lưu giữ thông tin chi tiết về đơn hàng đã
                    thanh toán của thành viên. Chúng tôi cũng sẽ sử dụng cả
                    thông tin nhận diện cá nhân của thành viên để gia tăng khả
                    năng đáp ứng của Chúng tôi về phương diện các Trang và Dịch
                    Vụ, cũng như về phát triển những chức năng, tính năng và các
                    dịch vụ mới theo những xu hướng và sở thích đang diễn tiến.
                    Các thành viên sẽ tự chịu trách nhiệm về bảo mật và lưu giữ
                    mọi hoạt động sử dụng dịch vụ dưới tên đăng ký, mật khẩu và
                    hộp thư điện tử của mình. Ngoài ra, thành viên có trách
                    nhiệm thông báo kịp thời cho website&nbsp;<a class="indam"
                        >toeic-testpro.com</a
                    >&nbsp;về những hành vi sử dụng trái phép, lạm dụng, vi phạm
                    bảo mật, lưu giữ tên đăng ký và mật khẩu của bên thứ ba để
                    có biện pháp giải quyết phù hợp.
                </p>
                <h3><a class="indam">IX. PHẠM VI SỬ DỤNG THÔNG TIN</a></h3>
                <p>
                    Website&nbsp;<a class="indam">toeic-testpro.com</a>&nbsp;sử
                    dụng thông tin thành viên cung cấp để:
                </p>
                <ul>
                    <li>Cung cấp các dịch vụ đến thành viên;</li>
                    <li>
                        Gửi các thông báo về các hoạt động trao đổi thông tin
                        giữa thành viên và website&nbsp;<a class="indam"
                            >toeic-testpro.com</a
                        >
                    </li>
                    <li>
                        Ngăn ngừa các hoạt động phá hủy tài khoản người dùng của
                        thành viên hoặc các hoạt động giả mạo thành viên;
                    </li>
                    <li>
                        Liên lạc và giải quyết với thành viên trong những trường
                        hợp đặc biệt.
                    </li>
                    <li>
                        Không sử dụng thông tin cá nhân của thành viên ngoài mục
                        đích xác nhận và liên hệ có liên quan đến giao dịch
                        tại&nbsp;<a class="indam">toeic-testpro.com</a>
                    </li>
                    <li>
                        Trong trường hợp có yêu cầu của pháp luật:
                        website&nbsp;<a class="indam">toeic-testpro.com</a
                        >&nbsp;có trách nhiệm hợp tác cung cấp thông tin cá nhân
                        thành viên khi có yêu cầu từ cơ quan tư pháp bao gồm:
                        Viện kiểm sát, tòa án, cơ quan công an điều tra liên
                        quan đến hành vi vi phạm pháp luật nào đó của khách
                        hàng. Ngoài ra, không ai có quyền xâm phạm vào thông tin
                        cá nhân của thành viên.
                    </li>
                </ul>
                <h3><a class="indam">X. THỜI GIAN LƯU TRỮ THÔNG TIN</a></h3>
                <p>
                    Dữ liệu cá nhân của thành viên sẽ được lưu trữ cho đến khi
                    có yêu cầu hủy bỏ hoặc tự thành viên đăng nhập và thực hiện
                    hủy bỏ. Còn lại trong mọi trường hợp thông tin cá nhân thành
                    viên sẽ được bảo mật trên máy chủ của&nbsp;<a class="indam"
                        >toeic-testpro.com</a
                    >
                </p>
                <h3><a class="indam">XI. Chính sách hoàn tiền:</a></h3>
                <p>
                    Khách hàng có thể hoàn trả lại tiền nếu khách hàng không hài
                    lòng trong vòng <a class="indam">24h</a> kể từ lúc tài khoản
                    được kích hoạt. Vì bất cứ lý do gì quá thời gian trên TOEIC
                    TEST PRO sẽ không chấp nhận hoàn trả học phí.<br /><br />-
                    Số tiền hoàn = Số tiền TOEIC TEST PRO thực nhận ( sau khi
                    trừ đi phí phát sinh - nếu có )
                </p>
                <p>
                    Email:
                    <a class="indam"
                        ><a href="abc@gmail.com" class="indam">abc@gmail.com</a
                        ><br /></a
                    >Chúng tôi sẽ liên hệ trả lời bạn trong thời gian làm việc.
                </p>
                <h3><a class="indam">XII. NHỮNG QUY ĐỊNH KHÁC</a></h3>
                <p>
                    - Tất cả các Điều Khoản và Điều Kiện (và tất cả nghĩa vụ
                    phát sinh ngoài Điều khoản và Điều kiện này hoặc có liên
                    quan) sẽ bị chi phối và được hiểu theo luật pháp Việt Nam.
                </p>
            </div>
        </div>

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
                        <a href="./index.html" class="Logo">
                            <img
                                src="../assets/img/Logo.svg"
                                alt="Logo"
                                class="lg"
                            />
                            <p class="desc-Logo">TOEIC</p>
                        </a>
                    </div>

                    <!-- Bank -->
                    <div class="footer-bank">
                        <img
                            src="../assets/img/Bank.svg"
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
        <script src="../assets/js/go-top.js"></script>
    </body>
</html>
