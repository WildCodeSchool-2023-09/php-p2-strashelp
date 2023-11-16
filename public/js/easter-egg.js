function easterEgg() {
    alert('Disponible chez vous a tout moment!');
 changeImage();
setTimeout(changeLogo, 5000)
}
function changeImage(){
let easterImage = document.getElementById('logo-image')
easterImage.src ="/assets/images/22395288.jpg"; 
}
function changeLogo(){
    let easterImage = document.getElementById('logo-image')
    easterImage.src ="/assets/images/logo-strashelp-300px.png"; 
}