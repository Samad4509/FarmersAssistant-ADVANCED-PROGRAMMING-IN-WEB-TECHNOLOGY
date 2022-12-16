<html>
<h1>Plans</h1>
<p id="demo"></p>
Id:<span id="id"></span></span><br>
firstname:<span id="firstname"></span><br>
lastname:<span id="lastname"></span><br>
username:<span id="username"></span><br>
email:<span id="email"></span><br>
password:<span id="password"></span><br>
gender:<span id="gender"></span><br>
city:<span id="city"></span><br>
postalCode:<span id="postalCode"></span><br>
address:<span id="address"></span><br>
phone:<span id="phone"></span><br>
dob:<span id="dob"></span><br>
<script>
function loadDoc() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    console.log("response"+this.responseText);
    var myobj=JSON.parse(this.responseText);
        document.getElementById("id").innerHTML = myobj[0].id;
        document.getElementById("firstname").innerHTML = myobj[1].firstname;
        document.getElementById("lastname").innerHTML = myobj[2].lastname;
        document.getElementById("username").innerHTML = myobj[3].username;
        document.getElementById("email").innerHTML = myobj[4].email;
        document.getElementById("password").innerHTML = myobj[5].password;
        document.getElementById("gender").innerHTML = myobj[6].gender;
        document.getElementById("city").innerHTML = myobj[7].city;
        document.getElementById("postalCode").innerHTML = myobj[8].postalCode;
        document.getElementById("address").innerHTML = myobj[9].address;
        document.getElementById("phone").innerHTML = myobj[10].phone;
        document.getElementById("dob").innerHTML = myobj[11].dob;
    }
  xhttp.open("GET", "http://127.0.0.1:8000/api/users", true);
  xhttp.send();
}
loadDoc();
</script>
</html>
