function mission() {
    const show = document.getElementById("mission");
    if (show.style.display = "hidden") {
        document.getElementById("mission").style.display="flex";
        document.getElementById("mission").style.zIndex="6";
        document.getElementById("home").style.display="hidden";
        document.getElementById("earn").style.display="hidden";
        document.getElementById("services").style.display="hidden";  
    }
}

function home() {
    const show = document.getElementById("home");
    if (show.style.display = "hidden") {
        document.getElementById("mission").style.display="hidden";
        document.getElementById("home").style.display="flex";
        document.getElementById("home").style.zIndex="6";
        document.getElementById("earn").style.display="hidden";
        document.getElementById("services").style.display="hidden";  
    }
}
function earn() {
    document.getElementById("earn").style.display="hidden";
    document.getElementById("home").style.display="hidden";
    document.getElementById("mission").style.display="hidden";
    document.getElementById("services").style.display="hidden";
}
function services() {
    document.getElementById("services").style.display="hidden";
    document.getElementById("home").style.display="hidden";
    document.getElementById("earn").style.display="hidden";
    document.getElementById("mission").style.display="hidden";
}