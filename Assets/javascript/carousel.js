const prev = document.getElementById('sec_prev');       // left and right button of first carousel
const next = document.getElementById('sec_next');

const prev2 = document.getElementById('sec2_prev');   // left and right button of second carousel
const next2 = document.getElementById('sec2_next');

const prev3 = document.getElementById('sec3_prev');   // left and right button of third carousel
const next3 = document.getElementById('sec3_next');

const track = document.getElementById('sec_track');
const track2 = document.getElementById('sec2_track');
const track3 = document.getElementById('sec3_track');

const carouselwidth = document.querySelector('.carousel').offsetWidth;     //queryselector is used to select element by class
                                                                          //same carousel with is used for all carousel since it remains same


next.addEventListener('click',() =>{                                             
    track.style.transform = `translateX(-${carouselwidth}px)`;           // in the click event we move the track div to left so that elements of right are visible                                                                      //this  is done by specifying the - of carousel width to trasnform        
})

prev.addEventListener('click',() =>{
    track.style.transform = 'translateX(0px)';                  //resets the position of track 
})

next2.addEventListener('click',() =>{
    track2.style.transform = `translateX(-${carouselwidth}px)`;
})

prev2.addEventListener('click',() =>{
    track2.style.transform = 'translateX(0px)';
})

next3.addEventListener('click',() =>{
    track3.style.transform = `translateX(-${carouselwidth}px)`;
})

prev3.addEventListener('click',() =>{
    track3.style.transform = 'translateX(0px)';
})
