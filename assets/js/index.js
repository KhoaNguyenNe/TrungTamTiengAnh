// Tạo một mảng các đánh giá
const comments = [
    {
        name: "Anh Tú",
        content:
            "Khóa học luyện thi TOEIC cung cấp một loạt các bài học và tài liệu hữu ích, từ ngữ pháp, từ vựng," +
            " đọc hiểu đến luyện nghe, giúp học viên đạt được sự đa dạng và phong phú trong việc nâng cao kỹ năng tiếng Anh.",
        avatar: "Anh_Tu.svg",
    },
    {
        name: "Hải Quân",
        content:
            "Khóa học được dẫn dắt bởi những giáo viên có kinh nghiệm và chuyên môn trong lĩnh vực luyện thi TOEIC," +
            " giúp học viên hiểu rõ yêu cầu và phong cách kiểm tra của bài thi, từ đó tăng cơ hội thành công trong kỳ thi thực tế.",
        avatar: "Hai_Quan.jpg",
    },
    {
        name: "Kai Trần",
        content:
            "Khóa học thông thường sẽ phân chia học viên vào các nhóm dựa trên trình độ tiếng Anh của họ." +
            " Điều này giúp học viên dễ dàng hòa nhập vào lớp học và tập trung vào việc phát triển kỹ năng của mình một cách hiệu quả.",
        avatar: "Kai_Tran.svg",
    },
    {
        name: "Xuân Chính",
        content:
            "Khóa học thông thường sẽ phân chia học viên vào các nhóm dựa trên trình độ tiếng Anh của họ." +
            " Điều này giúp học viên dễ dàng hòa nhập vào lớp học và tập trung vào việc phát triển kỹ năng của mình một cách hiệu quả.",
        avatar: "Xuan_Chinh.jpg",
    },
    {
        name: "Nhật Minh",
        content:
            "Ngoài các bài giảng trực tiếp, khóa học luyện thi TOEIC thường cung cấp tài liệu bổ trợ như sách giáo khoa," +
            " đề thi mẫu và các nguồn tài liệu tham khảo khác để học viên có thể tự học và rèn luyện nâng cao kỹ năng tiếng Anh.",
        avatar: "Nhat_Minh.svg",
    },
    {
        name: "Chris Haroun",
        content:
            "Circuit has helped me expand my knowledge through several important courses that are extremely impactful and helpful." +
            "  For the first time, finishing my degree seemed realistic. It was online with a flexible schedule.",
        avatar: "Chris_Haroun.png",
    },
    {
        name: "Vĩ Khang",
        content:
            "Chương trình phân nhóm theo trình độ tiếng Anh rất linh hoạt và đáng khen ngợi, " +
            "tạo ra môi trường học tập thoải mái và đồng đều. Giáo viên dễ dàng tập trung vào từng nhóm, tạo sự tương tác và phát triển cá nhân cho mỗi học viên.",
        avatar: "Vi_Khang.jpg",
    },
];

// Hàm để tạo HTML cho mỗi đánh giá
function createCommentHTML(comment) {
    return `
    <div class="comment">
    <div class="cmts">
        <h3 class="heading">Great platform</h3>
        <div class="observe">
            <img
                src="./assets/img/comments_open.svg"
                alt="open"
                class="open"
            />
            <div class="info">
                <p class="obs">
                    ${comment.content}
                </p>
                <div class="avatar">
                    <img
                        src="./assets/img/${comment.avatar}"
                        alt="avatar"
                        class ="avt"
                    />
                    <div class="name-stars">
                        <p class="name">
                            ${comment.name}
                        </p>
                        <img
                            src="./assets/img/5Stars.svg"
                            alt="5stars"
                            class="stars"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  `;
}

// Thêm các đánh giá vào trong list
function addCommentsToFormList(comments) {
    const formList = document.getElementById("list");
    formList.innerHTML = comments.map(createCommentHTML).join("");
}

// Gọi hàm addCommentsToFormList để thêm các đánh giá vào form-List
addCommentsToFormList(comments);

// Nút di chuyển
document.getElementById("next").onclick = function () {
    var widthcmt = document.querySelector(".comment").offsetWidth;
    document.getElementById("form-List").scrollLeft += widthcmt + 30;
};

document.getElementById("prev").onclick = function () {
    var widthcmt = document.querySelector(".comment").offsetWidth;
    document.getElementById("form-List").scrollLeft -= widthcmt + 30;
};
