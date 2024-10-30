//phần slider main
const img1 = document.querySelector('.img_slide');
let i = 1;
let arr = ["https://toquoc.mediacdn.vn/280518851207290880/2022/10/24/photo-1666605209337-1666605209433251738388.jpg",
           "https://cdnmedia.baotintuc.vn/Upload/XjfgEPYM30O8z6jY3MHxSw/files/2019/10/310/Anh%201_Cau%20Vang%20-%20Sun%20World%20Ba%20Na%20Hills.jpg",
           "https://sodulich.hanoi.gov.vn/storage/z3526392176033575aab3c103c2245e2350aee991cd064.jpg",
           "https://cdn.thoibaonganhang.vn/stores/news_dataimages/canhnq/042023/13/20/1419_du-lich-ninh-binh-721.jpg"
];
let chay = function(){
    img1.src = arr[i];
    i++;
    if(i == 4){
        i = 0;
    }
}
setInterval(chay,2000);

//phần slider city
const list_city_main = document.querySelector('.list_img_city');
const citys = document.querySelectorAll('.city_tt');
let width_img_city = citys[0].offsetWidth;
let dichChuyen_img_city = 0;
let index = 1;
// citys.forEach(element => {
//     console.log(element);
// });
let chay_slide_city = function(){
    // console.log(index);
    dichChuyen_img_city = width_img_city * (-1) * index;
    // console.log(dichChuyen_img_city);
    list_city_main.style = `transform: translateX(${dichChuyen_img_city}px)`;
    index++;
    if(index > citys.length - 3){
        index = 0;
    }
}
setInterval(chay_slide_city,3000);







