const khoaHoc = [
    {
        img: "Listen1.webp",
        part: "Phần 1",
        title_img: "Mô tả tranh",
        desc: "Thí sinh sẽ nghe 1 lần duy nhất 4 câu mô tả về một bức tranh. Sau đó chọn 1 đáp án mô tả đúng nhất bức tranh đó.",
    },
    {
        img: "Listen2.webp",
        part: "Phần 2",
        title_img: "Hỏi - Đáp",
        desc: "Thí sinh sẽ nghe 1 lần duy nhất 3 câu hồi đáp cho 1 câu hỏi hoặc 1 câu nói. Sau đó chọn câu hồi đáp phù hợp nhất.",
    },
    {
        img: "Listen3.webp",
        part: "Phần 3",
        title_img: "Đoạn hội thoại",
        desc: "Thí sinh sẽ nghe 1 lần duy nhất các đoạn hội thoại giữa 2 hoặc 3 người. Mỗi đoạn hội thoại sẽ có 3 câu hỏi, mỗi câu hỏi có 4 lựa chọn. Thí sinh đọc câu hỏi sau đó chọn câu trả lời phù hợp nhất. .",
    },
    {
        img: "Listen4.webp",
        part: "Phần 4",
        title_img: "Bài nói ngắn",
        desc: "Thí sinh sẽ nghe 1 lần duy nhất các bài nói ngắn. Mỗi bài sẽ có 3 câu hỏi, mỗi câu hỏi có 4 lựa chọn. Thí sinh đọc câu hỏi sau đó chọn câu trả lời phù hợp nhất.",
    },
    {
        img: "Listen4.webp",
        part: "Phần 4",
        title_img: "Bài nói ngắn",
        desc: "Thí sinh sẽ nghe 1 lần duy nhất các bài nói ngắn. Mỗi bài sẽ có 3 câu hỏi, mỗi câu hỏi có 4 lựa chọn. Thí sinh đọc câu hỏi sau đó chọn câu trả lời phù hợp nhất.",
    },
    {
        img: "Listen4.webp",
        part: "Phần 4",
        title_img: "Bài nói ngắn",
        desc: "Thí sinh sẽ nghe 1 lần duy nhất các bài nói ngắn. Mỗi bài sẽ có 3 câu hỏi, mỗi câu hỏi có 4 lựa chọn. Thí sinh đọc câu hỏi sau đó chọn câu trả lời phù hợp nhất.",
    },
];

function taoKhoaHoc(khoaHoc) {
    return `
    <a class="course" href="">
        <div class="subject-img">
            <img
                src="./assets/img/${khoaHoc.img}"
                alt="${khoaHoc.title_img}"
                class="img"
            />
        </div>
        <div class="doc">
            <h3 class="part">${khoaHoc.part}</h3>
            <h2 class="title-img">${khoaHoc.title_img}</h2>
            <p class="desc">
                ${khoaHoc.desc}
            </p>
        </div>
    </a>
  `;
}

// Thêm các đánh giá vào trong courses
function themKhoaHoc(nhieukhoaHoc) {
    const formList = document.getElementById("list");
    formList.innerHTML = nhieukhoaHoc.map(taoKhoaHoc).join("");
}

// Thêm các đánh giá vào html
themKhoaHoc(khoaHoc);
