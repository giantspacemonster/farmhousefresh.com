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
    var dots = document.getElementsByClassName("dot");
    if(n > slides.length){
	slideIndex = 1;
    }
    if(n < 1) {
	slideIndex = slides.length;
    }
    for(i = 0; i < slides.length; i++) {
	slides[i].style.display = "none";
    }
    for(i = 0; i < dots.length; i++) {
	dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}

function showSlides2() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for(i = 0; i< slides.length; i++) {
	slides[i].style.display = "none";
    }
    slideIndex2++;
    if(slideIndex2 > slides.length) {
	slideIndex2 = 1;
    }
    for( i = 0; i<dots.length; i++) {
	dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex2 - 1].style.display = "block";
    dots[slideIndex2 - 1].className += " active";
    setTimeout(showSlides2, 4000); //change image every 2 seconds.
}
