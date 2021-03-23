let cardBodies = document.getElementsByClassName("card-body");
for (let i = 0; i < cardBodies.length; i++) {
    let height = cardBodies[i].clientHeight;
    if(height < 140){
        cardBodies[i].style.height = "140px";
    }
}
let contactInfo = document.getElementsByClassName("contact");
for (let i = 0; i < contactInfo.length; i++) {
    let textLength = contactInfo[i].childNodes[0].textContent.length;
    if (textLength < 36 && 27 < textLength &&  contactInfo[i].childNodes[1]){
        contactInfo[i].style.marginBottom = "2.5rem";
    }
}
let cardHeader = document.getElementsByClassName("card-header");
for (let i = 0; i < cardHeader.length; i++) {
    if(cardHeader[i].childNodes[0].clientHeight >23){
        cardHeader[i].style.paddingBottom = "0";
        cardHeader[i].childNodes[0].style.marginBottom = "0";
        cardHeader[i].style.paddingTop = "0.3rem";
    }
}