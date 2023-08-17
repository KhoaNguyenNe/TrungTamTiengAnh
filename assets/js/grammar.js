// Hàm để tạo HTML cho mỗi grammar
function taoKhoaHoc(khoaHoc) {
    return `
    <div class="item">
        <div class="item-left">
            <div class="item-icon-grammar">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAdtJREFUaEPtWFluwyAQJSdre7K2J2t7s+pJmYhgZmVccEWkfCTG8LYZsG/l4p/bxfGXTWC2g9uB7cCgAleI0Med40sp5bOU8l1zXpkAgL93DHrCvBoBUrsHnLgsSYBTuzUA8XlbJUIAjVy/Oup4OgFLRCQ+UH9KEVsjQl3mi2HxpwS8agM87gF4LlaHpnNGF7KqTSITcPyWwB/yjxuyCHjVxtoUFwCD4lxsiGg6ASyKr9SzuYKsVbeAxzyH/Ecd8EakJlEDx/+euYYIRCLSqj8CnhVbqwGPQpa40BjvvN38SxHyLtADj0V/7jGpr0fmbt17zNdzQGpl1l2fWzACni1gzoHoItQaqV5asiPCsFGXaoBapPWwxdqsbFCaq2z+PW1UIiMBt/Z4iUQKgXqBevPqFSmNzQCvxTLtKNEqOFJH7VzdDYwGafuAls/e9UzwasyzCWTFRjzA1aptAk2GsuMj5l/NV6AA/i0BemjxaqJGXB3gXLF3XKCNzuuOuIGd1UZbAu0u7TmeTCcgHTEsbqgFfEYRkwMSeOtDzRQCUBbWP709E+pIipSpPk2DnIUcGd5GypT/MyIUAV+fXvGKRjrhHuZfxYEw8U0gLF3SjduBJCHD02wHwtIl3fgLtFNlMeuotM0AAAAASUVORK5CYII="/>
            </div>
            <div class="item-name">${khoaHoc.desc}</div>
        </div>
    </div>
  `;
}

// Hàm để tạo HTML cho mỗi practice
function taoPractices(practice) {
    return `
    <a href="#">
        <div class="list-item">
            <div class="list-item-name">${practice.desc}</div>
            <div class="list-item-icon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAOZJREFUaEPtmEsOwjAUA92bcTPgZHA0lEU2iE8kv3koyF110aQeT6Q0PbT5dWyeXwH4tcEYiAGzgSwhs0B7eAzYFZoTxMCbAk+S7ma5S8MJAxdJZ0lXSeMevaoBZvgZGoeoBBjL5vaibhSiEmBkfzaAm6gGaIcgAFohKIA2CBKgBYIGwCE6AFCILgAMIgCLHzrYBtdhAAs/yqMB0PA0AB6eBGgJTwG0hScAWsNXA/zlgQY9jVUbmHva1of6CbH1b5XFr4uax+iduCblh1kCgFf85QUxEANmA1lCZoH28BiwKzQn2N7AAwEtLjELaN2HAAAAAElFTkSuQmCC"/></div>
        </div>
    </a>
  `;
}

// Thêm các đánh giá vào trong list
function themKhoaHoc(nhieuKhoaHoc, id) {
    const formList = document.getElementById(id);
    formList.innerHTML = nhieuKhoaHoc.map(taoKhoaHoc).join("");
}

function themPractices(nhieuKhoaHoc, id) {
    const formList = document.getElementById(id);
    formList.innerHTML = nhieuKhoaHoc.map(taoPractices).join("");
}
const Grammarleft = [
    {
        desc: "NOUNS ",
    },
    {
        desc: "ADJECTIVES",
    },
    {
        desc: "ADVERBS",
    },
    {
        desc: "NOUN, ADJECTIVE, ADVERB EXCERCISES",
    },
    {
        desc: "PRONOUNS",
    },
    {
        desc: "PREPOSITIONS",
    },
    {
        desc: "CONJUNCTIONS",
    },
    {
        desc: "NUMERIC EXPRESSIONS BEFORE NOUNS",
    },
    {
        desc: "RELATIVE CLAUSES",
    },
    {
        desc: "TO INFINITIVES AND GERUNDS",
    },
    {
        desc: "PRESENT SIMPLE TENSE ",
    },
    {
        desc: "PRESENT CONTINUOUS TENSE ",
    },
    {
        desc: "PRESENT PERFECT TENSE ",
    },
    {
        desc: "PRESENT PERFECT CONTINUOUS TENSE ",
    },
    {
        desc: "PAST SIMPLE TENSE ",
    },
    {
        desc: "PAST CONTINUOUS TENSE ",
    },
    {
        desc: "PAST PERFECT TENSE ",
    },
    {
        desc: "PAST PERFECT CONTINUOUS TENSE ",
    },
    {
        desc: "FUTURE SIMPLE TENSE ",
    },
];


// Thêm các đánh giá vào form-List
themKhoaHoc(Grammarleft, "grammar-items-left");

const Grammarright = [
    {
        desc: "FUTURE CONTINUOUS TENSE ",
    },
    {
        desc: "FUTURE PERFECT TENSE ",
    },
    {
        desc: "FUTURE PERFECT CONTINUOUS TENSE ",
    },
    {
        desc: "NEAR FUTURE TENSE ",
    },
    {
        desc: "MIXED TENSE EXERCISES",
    },
    {
        desc: "PASSIVE VOICE ",
    },
    {
        desc: "IMPERATIVE PASSIVE AND SPECIAL PASSIVE CASES",
    },
    {
        desc: "MODAL VERBS",
    },
    {
        desc: "CONDITIONAL SENTENCES",
    },
    {
        desc: "REDUCING RELATIVE CLAUSES ",
    },
    {
        desc: "VERBS",
    },
    {
        desc: "SENTENCE ELEMENTS ",
    },
    {
        desc: "ADVERBIAL CLAUSES OF TIME",
    },
    {
        desc: "ADVERBIAL CLAUSES OF TIME",
    },
    {
        desc: "PHRASES & CLAUSES",
    },
    {
        desc: "PHRASES & CLAUSES OF CONCESSION",
    },
    {
        desc: "PHRASES & CLAUSES OF EFFECT",
    },
    {
        desc: "PHRASES & CLAUSES OF PURPOSE",
    },
    {
        desc: "PHRASES & CLAUSES OF REASON",
    },
];

// Thêm các đánh giá vào form-List
themKhoaHoc(Grammarright, "grammar-items-right");

const Practices = [
    {
        desc: "Phần 1: Mô tả tranh",
    },
    {
        desc: "Phần 2: Hỏi - Đáp",
    },
    {
        desc: "Phần 3: Đoạn hội thoại",
    },
    {
        desc: "Phần 4: Bài nói ngắn",
    },
    {
        desc: "Phần 5: Hoàn thành câu",
    },
    {
        desc: "Phần 6: Hoàn thành đoạn văn",
    },
    {
        desc: "Phần 7: Đoạn đơn",
    },
    {
        desc: "Phần 7: Đoạn kép",
    },
    {
        desc: "Phần 7: Đoạn ba",
    },
];

themPractices(Practices, "list-practices");