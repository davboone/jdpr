document.getElementById("deny").onclick = whyDeny;

function whyDeny(){
    document.getElementById("deniedPopUp").style.display = "block";
    document.getElementById("approve").innerHTML = "Nevermind, don't reject";
    document.getElementById("deny").innerHTML = "I'm sure, reject";
}