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
<h1>Update Education Qualification</h1>
<form action="/edit" method="Post">
    @csrf
    <input type="hidden"name="id" value="{{$data ['id']}}"> <br> <br>
    <input type="text"name="institution" value="{{$data ['institution']}}"> <br> <br>
    <input type="text"name="graduate_at"value="{{$data ['graduate_at']}}"> <br> <br>
    <input type="text"name="added_at"value="{{$data ['added_at']}}"> <br> <br>
    <input type="text"name="advisor_id"value="{{$data ['advisor_id']}}"> <br> <br>
    <button type="submit" >Uptate</button>
\</form>
