var slideIndex=1;
showSlides(slideIndex);

var slideIndex2 = 0;
showSlides2();

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    if(n > slides.length){
	slideIndex = 1;
    }
    if(n < 1) {
	slideIndex = slides.length;
    }
    for(i = 0; i < slides.length; i++) {
	slides[i].style.display = "none";
    }
    
    slides[slideIndex-1].style.display = "block";
}

function showSlides2() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for(i = 0; i< slides.length; i++) {
	slides[i].style.display = "none";
    }
    slideIndex2++;
    if(slideIndex2 > slides.length) {
	slideIndex2 = 1;
    }
    slides[slideIndex2 - 1].style.display = "block";
    setTimeout(showSlides2, 8000); //change image every 4 seconds.
}
