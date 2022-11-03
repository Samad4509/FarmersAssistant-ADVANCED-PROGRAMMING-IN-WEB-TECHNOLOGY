
<!DOCTYPE html>
<html>
<head>
<style>
.center{
        margin: auto;
        height: 300px;
        width: 600px;
        border: 3px solid #15c8eb;
        padding: 10px;
    }
    span{
        display: inline-block;
        width: 80px;
        text-align: 3px solid #fdffff;
    }

    body {background-color: rgba(147, 244, 11, 0.3);}


h2 {
    text-align: center;
  }

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #04aa33;
  color: white;
}

li a:hover:not(.active) {
  background-color: rgb(19, 1, 1);
  color: white;
}
body {
  background-color: #333396;
}

</style>
</head>
<body>

    <h2 style="color:rgb(248, 248, 248)">Admin Dashboard</h2>
    <h4 style="border: 2px solid rgb(0, 187, 255)"></h4>
    <p style="color: #f1f1f1">Welcome {{ Auth::user()->getFullName() }}</p>
    <ul>
        <li><a href="#news"class="active">Work</a></li>
        <li><a href="#">News</a></li>
        <li><a href="plan_create">Plan Create</a></li>
        <li><a href="#">See All Plans</a></li>
        <li><a href="#">Create Product List</a></li>
        <li><a href="#">Delete Product List</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="/logout">Logout</a></li>
      </ul>

    <div class="center">
    <span style="color:rgb(248, 248, 248)" style="text-align: center"><b>Profile</b></span><br>
    <span style="color:rgb(248, 248, 248)"><b>Username</b></span> <input type="text" name="username" value="{{ Auth::user()->username}}"readonly><br><br>
    <span style="color:rgb(248, 248, 248)"><b>Email</b></span> <input type="text" name="email" value="{{ Auth::user()->email}}"readonly><br><br>
    <span style="color:rgb(248, 248, 248)"><b>Dob</b></span> <input type="text" name="dob" value="{{ Auth::user()->dob}}"readonly><br><br>
    <span style="color:rgb(248, 248, 248)"><b>Gender</b></span> <input type="text" name="gender" value="{{ Auth::user()->gender}}"readonly><br><br>
    <span style="color:rgb(248, 248, 248)"><b>City</b></span> <input type="text" name="city" value="{{ Auth::user()->city}}"readonly><br><br>
    <span style="color:rgb(248, 248, 248)"><b>Zip-code</b></span> <input type="text" name="postalCode" value="{{ Auth::user()->postalCode}}"readonly><br><br>
    <button><a href="/logout">Logout</a></button>
    <button><a href="/update">update</a></button>
</div>


</body>
</html>
