// Hàm để tạo HTML cho mỗi đánh giá
function taoKhoaHoc(khoaHoc) {
    return `
    <a class="course" href="" title = "${khoaHoc.part} - ${khoaHoc.title_img}: ${khoaHoc.desc}">
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
            <p class="desc dots">
                ${khoaHoc.desc}
            </p>
        </div>
    </a>
  `;
}

// Thêm các đánh giá vào trong list
function themKhoaHoc(nhieuKhoaHoc, id) {
    const formList = document.getElementById(id);
    formList.innerHTML = nhieuKhoaHoc.map(taoKhoaHoc).join("");
}

const khoaHocSpeaking = [
    {
        img: "Speaking1.jpg",
        part: "Câu 1-2",
        title_img: "Đọc một đoạn văn",
        desc: "Ở phần thi này, thí sinh sẽ đọc thành tiếng một đoạn văn trên màn hình. Thí sinh có 45s để chuẩn bị và 45s để đọc thành tiếng đoạn văn.",
    },
    {
        img: "Speaking2.jpg",
        part: "Câu 3-4",
        title_img: "Miêu tả tranh",
        desc: "Trong phần thi này, thí sinh sẽ miêu tả một bức tranh càng chi tiết càng tốt. Thí sinh có 45s để chuẩn bị và 30s để miêu tả bức tranh.",
    },
    {
        img: "Speaking3.jpg",
        part: "Câu 5-7",
        title_img: "Trả lời câu hỏi",
        desc: "Ở phần thi này, thí sinh sẽ trả lời ba câu hỏi. Thí sinh có 3s để chuẩn bị sau khi nghe mỗi câu hỏi. Thí sinh có 15s để trả lời câu 5 và 6 và 30s để trả lời câu 7.",
    },
    {
        img: "Speaking4.jpg",
        part: "Câu 8-10",
        title_img: "Trả lời câu hỏi dựa vào thông tin cho sẵn",
        desc: "Trong phần này, thí sinh sẽ trả lời ba câu hỏi dựa trên thông tin cho sẵn. Thí sinh có 45s để đọc thông tin trước khi trả lời câu hỏi. Thí sinh có 3s để chuẩn bị và 15s để trả lời câu 8 và 9. Câu 10 thí sinh được nghe hai lần, có 3s để chuẩn bị và 30s để nói.",
    },
    {
        img: "Speaking5.jpg",
        part: "Câu 11",
        title_img: "Trình bày quan điểm",
        desc: "Trong phần thi này, thí sinh sẽ đưa ra ý kiến của mình về một chủ đề cụ thể. Thí sinh có 45s để chuẩn bị và và 60s để nói.",
    }
]

themKhoaHoc(khoaHocSpeaking, "list_speaking");

const khoaHocWriting = [
    {
        img: "Writing1.jpg",
        part: "Câu 1-2",
        title_img: "Đọc một đoạn văn",
        desc: "Ở phần thi này, thí sinh sẽ đọc thành tiếng một đoạn văn trên màn hình. Thí sinh có 45s để chuẩn bị và 45s để đọc thành tiếng đoạn văn.",
    },
    {
        img: "Writing2.jpg",
        part: "Câu 3-4",
        title_img: "Miêu tả tranh",
        desc: "Trong phần thi này, thí sinh sẽ miêu tả một bức tranh càng chi tiết càng tốt. Thí sinh có 45s để chuẩn bị và 30s để miêu tả bức tranh.",
    },
    {
        img: "Writing3.jpg",
        part: "Câu 5-7",
        title_img: "Trả lời câu hỏi",
        desc: "Ở phần thi này, thí sinh sẽ trả lời ba câu hỏi. Thí sinh có 3s để chuẩn bị sau khi nghe mỗi câu hỏi. Thí sinh có 15s để trả lời câu 5 và 6 và 30s để trả lời câu 7.",
    },
];

themKhoaHoc(khoaHocWriting, "list_writing");

