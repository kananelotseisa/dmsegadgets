//login
function showpp() {
    const opassword = document.getElementById('password');
    if (opassword.type === "password") {
        opassword.type = "text";
        document.getElementById('img2').style.display = "none";
        document.getElementById('img2a').style.display = "inline";
    }
    else {
        opassword.type = "password";
        document.getElementById('img2').style.display = "inline";
        document.getElementById('img2a').style.display = "none";
    }
}
function hidepp() {
    const opassword = document.getElementById('password');
    if (opassword.type === "text") {
        opassword.type = "password";
        document.getElementById('img2').style.display = "inline";
        document.getElementById('img2a').style.display = "none";
    }
    else {
        opassword.type = "text";
        document.getElementById('img2').style.display = "none";
        document.getElementById('img2a').style.display = "inline";
    }
}
