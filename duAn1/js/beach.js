//
var img_beachs = document.querySelectorAll('.img_beach');
// img_beachs.forEach(beach =>{
//     console.log(beach);
// })
var list_img_beach = document.querySelector('.list_img_beach');
var left_beach = document.querySelector('.left_beach');
var right_beach = document.querySelector('.right_beach');
// console.log(left_beach);
// console.log(right_beach);


let width = img_beachs[0].clientWidth;
let i2 = 0;
let position = 0;

left_beach.addEventListener("click", function(){
    slide_beach(-1);
})
right_beach.addEventListener("click", function(){
    slide_beach(1);
})

function slide_beach(value){
    if(value == -1){
        i2++;
        console.log(i2);
        if(i2 > 5){
            i2 = 5;
        }
        console.log("bạn đã nhấn nút trái");
        position = (width * i2 * -1);
        console.log("left "+position);
        list_img_beach.style = `transform: translateX(${position}px)`;
    }else if(value == 1){
        i2--;
        console.log(i2);
        console.log("bạn đã nhấn nút phải");
        if(i2 < 0){
            i2 = 0;
        }
        position = (width * i2 * -1);
        console.log("right "+position);
        list_img_beach.style = `transform: translateX(${position}px)`;
    }

};