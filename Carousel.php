<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

#images-carousel-slider{
  float: left;
}

.mySlides {display:none}

/* Slideshow container */
.slideshow-container {
  margin-top: 25px;
  max-width: 600px;
  position: relative;
  margin-bottom: -45px;
}

#left{
  float: left;
  margin-top: -185px ;
}

#right{
  float: right;
  margin-top: -185px ;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: relative;
  top: 50%;
  width: auto;
  padding: 12px;
  margin-top: -28px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
}


/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  position: absolute;
  bottom: -375px;
  width: 100%;
  text-align: center;
}

#dots{
  height: 25px;
  width: 600px;
  margin-top: 370px;
  background-color: #ffffff;
}

/* The dots/bullets/indicators */
.dot {
  cursor:pointer;
  height: 13px;
  width: 13px;
  margin-left: 2px;
  margin-right: 2px;
  margin-top: 5px;
  background-color: #eeeeee;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
<body>

<div id="images-carousel-slider">
<div class="slideshow-container">

<div id="sliders">

  <div class="mySlides fade">
    <img src="../images/1.png" style="width:100%">
    <div class="text">The students visit a friend at Tebow Hospital</div>
  </div>

  <div class="mySlides fade">
    <img src="../images/2.png" style="width:100%">
    <div class="text">Craft session for thanksgiving day</div>
  </div>

  <div class="mySlides fade">
    <img src="../images/3.png" style="width:100%">
    <div class="text">The teachers, students, and faculty celebrates foundation day</div>
  </div>

</div>

<a class="prev" onclick="plusSlides(-1)" id="left">❮</a>
<a class="next" onclick="plusSlides(1)" id="right">❯</a>

</div>

<br>

<div style="text-align:center" id="dots">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

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
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

</body>
</html> 
