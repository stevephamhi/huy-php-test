var arr_img = [
    'https://st.meta.vn/img/thumb.ashx/0x0x95/Data/image/2022/03/22/Banner-tu-lanh-970x270.png',
    'https://st.meta.vn/img/thumb.ashx/0x0x95/Data/image/2023/05/04/dieu-hoa-may-lanh-970x270.png',
    'https://st.meta.vn/img/thumb.ashx/0x0x95/Data/image/2024/03/15/Banner-dien-may-970x270.png',
    'https://st.meta.vn/img/thumb.ashx/0x0x95/Data/image/2024/03/21/Banner-chao-he-970x270.png',
];

var i = 0;

function left() {
    if (i === 0) {
        i = arr_img.length - 1;
    } else {
        i--;
    }
    document.querySelector("#banner").src = arr_img[i];
}

function right() {
    if (i === arr_img.length - 1) {
        i = 0;
    } else {
        i++;
    }
    document.querySelector("#banner").src = arr_img[i];
}

setInterval(right, 10000);