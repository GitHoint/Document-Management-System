(function () {

  let currentImageIndex = 0;
  let sliderImageDiv = document.querySelector(".sliderImage");
  let sliderImage = document.querySelector(".sliderImage > img");
  let images = [];

  for (let i = 0; i < 8; i++){
    images.push("images/slider/"+i+".webp");
  }
  function nextImage(){
    prevImage = "images/slider/"+ currentImageIndex +".webp";
    currentImageIndex = currentImageIndex === 7 ? 0 : currentImageIndex + 1;
    sliderImageDiv.style.background = sliderImageDiv.style.background.replace(prevImage, images[currentImageIndex]);
    sliderImage.src = images[currentImageIndex];
    sliderImageDiv.style.backgroundSize = "cover"
  }
  setInterval(() => {
    nextImage();
  }, 4000)
})();