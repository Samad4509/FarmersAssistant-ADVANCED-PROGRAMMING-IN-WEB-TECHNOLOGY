<!DOCTYPE html>
<html>
<head>
<style>
<style>
    .center{
        margin: auto;
        width: 600px;
        border: 3px solid #15c8eb;
        padding: 10px;
    }
    span{
        display: inline-block;
        width: 80px;
    }
    body {background-color: rgb(31, 41, 55);}
    </style>

</style>
<h1>Update Profile</h1>
<form action="/edit3" method="Post">
    @csrf
    <input type="hidden"name="id" value="{{$data ['id']}}"> <br> <br>
    <input type="text"name="firstname"value="{{$data ['firstname']}}"> <br> <br>
    <input type="text"name="lastname" value="{{$data ['lastname']}}"> <br> <br>
    <input type="text"name="username" value="{{$data ['username']}}"> <br> <br>
    <input type="text"name="email"value="{{$data ['email']}}"> <br> <br>
    <input type="text"name="dob"value="{{$data ['dob']}}"> <br> <br>
    <input type="text"name="gender"value="{{$data ['gender']}}"> <br> <br>
    <input type="text"name="city"value="{{$data ['city']}}"> <br> <br>
    <input type="text"name="postalcode" value="{{$data ['postalCode']}}"> <br> <br>
    <input type="text"name="address"value="{{$data ['address']}}"> <br> <br>
    <input type="text"name="phone" value="{{$data ['phone']}}"> <br> <br>
    <input type="date"name="created_at" value="{{$data ['phone']}}"> <br> <br>





    <button type="submit" >Uptate</button>
\</form>
