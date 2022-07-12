var images = [
]

const myDynamicImage = document.getElementById("dynamicImage");
const myDynamicImageTwo = document.getElementById("dynamicImageTwo");
const myDynamicImageThree = document.getElementById("dynamicImageThree");

function randomSrcIndex() {
    return Math.floor(Math.random() * images.length);
};

const setRandomImageSrc = () => {
  
    myDynamicImage.src = images[randomSrcIndex()];
    myDynamicImageTwo.src = images[randomSrcIndex()];
    myDynamicImageThree.src = images[randomSrcIndex()];
};

function changeImg() {
    setRandomImageSrc();
};





