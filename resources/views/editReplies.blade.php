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
<h1>Update Replies Box</h1>
<form action="/edit2" method="Post">
    @csrf
    <input type="hidden"name="id" value="{{$data ['id']}}"> <br> <br>
    <input type="text"name="created_at" value="{{$data ['created_at']}}"> <br> <br>
    <input type="text"name="tittle"value="{{$data ['tittle']}}"> <br> <br>
    <input type="text"name="body"value="{{$data ['body']}}"> <br> <br>
    <input type="text"name="mails_id"value="{{$data ['mails_id']}}"> <br> <br>
    <input type="text"name="advisor_id"value="{{$data ['advisor_id']}}"> <br> <br>
    <button type="submit" >Uptate</button>
</form>
