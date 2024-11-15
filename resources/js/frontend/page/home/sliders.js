const listimg = document.querySelector('.list-img');
const imgs= document.getElementsByTagName('img');
const left = document.querySelector(".left");
const right = document.querySelector(".right");

const length = imgs.length;
let i=0 ;//i là hiện tại

const rightChangeSlide= () =>{
    if(i== length - 3){
        i= 0;
        let width = imgs[0].offsetWidth;
        listimg.style.transform = `translateX(0px)`
    }else{

        i ++;
        let width = imgs[0].offsetWidth;
        listimg.style.transform = `translateX(${width * -4.8 * i}px)`
    }
}
let eventChangeSlide = setInterval(rightChangeSlide,3000)

right.addEventListener('click', ()=>{
    clearInterval(eventChangeSlide);
    rightChangeSlide();
    eventChangeSlide = setInterval(rightChangeSlide,3000);

});

left.addEventListener('click', ()=>{
    clearInterval(eventChangeSlide);

    if(i== 0){
        i= length - 3;
        let width = imgs[0].offsetWidth;
        listimg.style.transform = `translateX(${width * -4.8 * i}px)`
    }else{

        i --;
        let width = imgs[0].offsetWidth;
        listimg.style.transform = `translateX(${width * -4.8 * i}px)`
    }
    eventChangeSlide = setInterval(rightChangeSlide,3000);

})