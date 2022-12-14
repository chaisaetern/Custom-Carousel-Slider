// Custom Slider created for carousel

const slider = document.querySelector('.slider');
const prev = document.querySelector('.prev');
const next = document.querySelector('.next');
const controls = document.querySelector('.controls');
const indicatorParents = document.querySelector('.controls ul');

let sectionIndex = 0;

const slidesCount = slider.childElementCount;
const slidesTranslateSize = -100 / slidesCount;
const slidesCountIndex = slider.childElementCount - 1;


// Set appropriate size for slider
slider.style.width = slidesCount * 100 + '%';


// Remove selected class from all but first child
for (let i = 2; i < slidesCount+1; i++) {
    document.querySelector('.controls ul li:nth-child(n + ' + i + ')').classList.remove('selected');
}


// If only 1 or less post exist, hide controls
if (slidesCount <= 1) {
    controls.style.display = 'none';
}


// Selected element radio btns
document.querySelectorAll('.controls li').forEach(function(indicator, ind) {
    indicator.addEventListener('click', function() {
        sectionIndex = ind;
        document.querySelector('.controls .selected').classList.remove('selected');
        indicator.classList.add('selected');
        slider.style.transform = 'translate(' + (sectionIndex) * slidesTranslateSize + '%)';
    });
});


// Add control btns
prev.addEventListener('click', function() {
    sectionIndex = (sectionIndex > 0) ? sectionIndex + -1 : slidesCountIndex;
    document.querySelector('.controls .selected').classList.remove('selected');
    indicatorParents.children[sectionIndex].classList.add('selected');
    slider.style.transform = 'translate(' + (sectionIndex) * slidesTranslateSize + '%)';
});

next.addEventListener('click', function() {
    sectionIndex = (sectionIndex < slidesCountIndex) ? sectionIndex + 1 : 0;
    document.querySelector('.controls .selected').classList.remove('selected');
    indicatorParents.children[sectionIndex].classList.add('selected');
    slider.style.transform = 'translate(' + (sectionIndex) * slidesTranslateSize + '%)';
});


// Used to autoplay
function autoSlider() {
    sectionIndex = (sectionIndex < slidesCountIndex) ? sectionIndex + 1 : 0;
    document.querySelector('.controls .selected').classList.remove('selected');
    indicatorParents.children[sectionIndex].classList.add('selected');
    slider.style.transform = 'translate(' + (sectionIndex) * slidesTranslateSize + '%)';
}


// Automatically scrolls horizontally every 5s
let autoPlay;
let intTimer = 5000;

// Set slider to automatically play when loaded
autoPlay = setInterval(() => {
    autoSlider();
}, intTimer);


// Play and Pause slider
const play = document.querySelector('.play');
const pause = document.querySelector('.pause');

pause.addEventListener('click', function() {
    pause.style.display = 'none';
    play.style.display = 'flex';
    window.clearInterval(autoPlay);
});

play.addEventListener('click', function() {
    play.style.display = 'none';
    pause.style.display = 'flex';
    autoPlay = setInterval(() => {
        autoSlider();
    }, intTimer);
});