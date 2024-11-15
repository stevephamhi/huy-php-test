function giohang() {
    var cartBox = document.querySelector('.cart-product-box');
    var display = window.getComputedStyle(cartBox).display;

    if (display === "none") {
        cartBox.style.display = "block";
    } else {
        cartBox.style.display = "none";
    }
}
function incartClose() {
    var cartBox = document.querySelector('.cart-product-box');
    var display = window.getComputedStyle(cartBox).display;


    if (display === "none") {
        cartBox.style.display = "block";
    } else {
        cartBox.style.display = "none";
    }
}

function expandProductDescription() {
    var prodDescContent = document.querySelector(".prod-desc-content");
    var readM = document.querySelector(".read-more");

    var computedStyle = window.getComputedStyle(prodDescContent);
    var height = parseFloat(computedStyle.height);

    if (height === 900) {
        readM.innerHTML = "<span>Thu gọn nội dung</span> <span><i class='fa-solid fa-sort-up'></i></span>";
        prodDescContent.style.height = "3620px";
    } else {
        prodDescContent.style.height = "900px";
        readM.innerHTML = "<span>Xem toàn bộ nội dung</span> <span><i class='fa-solid fa-caret-down'></i></span>";
    }
}

const text = document.querySelector(".sec__text");
const load = () => {
    setTimeout(() => {
        text.textContent = "Tặng 1kg túi hút chân không mặt trơn B1D (24cm x 36cm)";
    }, 0);
    setTimeout(() => {
        text.textContent = "Tặng 5 lưỡi cắt bê tông khi mua máy cắt đá Makita 4100NH3";
    }, 4000);
    setTimeout(() => {
        text.textContent = "Mua bếp từ Nagakawa NK2C26MB tặng bộ nồi Nagakawa NAG1352 và chảo đáy ";
    }, 8000);
}
load();
setInterval(load, 12000);

function validatePass() {
    var pass = document.querySelector('#pass');
    var showPass = document.querySelector('.showPass');
    if (pass.type === "password") {
        pass.type = "text";
        showPass.innerHTML = "<i class='fa-regular fa-eye'></i>";
    } else {
        pass.type = "password";
        showPass.innerHTML = "<i class='fa-regular fa-eye-slash'></i>";
    }
}
