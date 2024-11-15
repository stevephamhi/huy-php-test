var arr_img = [
    'https://st.meta.vn/img/thumb.ashx/Data/2023/Thang09/Banner-lo-nuong-720x445.png',
    'https://st.meta.vn/img/thumb.ashx/Data/2024/Thang03/dieu-hoa/Banner-may-lanh-720x445.png',
    'https://st.meta.vn/img/thumb.ashx/Data/2023/Thang09/Banner-tivi-thong-minh-720x445.png',
    'https://st.meta.vn/img/thumb.ashx/Data/2022/Thang03/Banner-may-xay-720x445.png',
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