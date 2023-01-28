// new password
function showp() {
    const opassword = document.getElementById('password');
    if (opassword.type ==="password") {
        opassword.type = "text";
        document.getElementById('img1').style.display="none";
        document.getElementById('img1a').style.display="inline";
    } 
    else {
        opassword.type ="password";
        document.getElementById('img1').style.display="inline";
        document.getElementById('img1a').style.display="none";
    }
}

function hidep() {
    const opassword = document.getElementById('password');
    if (opassword.type ==="text") {
        opassword.type = "password";
        document.getElementById('img1').style.display="inline";
        document.getElementById('img1a').style.display="none";
    } 
    else {
        opassword.type ="text";
        document.getElementById('img1').style.display="none";
        document.getElementById('img1a').style.display="inline";
    }
}

//auto random member_id on page reload
var member_id = document.getElementById("member_id");
function randomstring(string_length) {
    var random_string ='';
    var characters = 'DEGMS0123456789'

    for (let i = 0; i < string_length; i++) {
        random_string += characters.charAt(Math.floor(Math.random() * characters.length))
    }

    member_id.value = random_string;
}
randomstring(6);