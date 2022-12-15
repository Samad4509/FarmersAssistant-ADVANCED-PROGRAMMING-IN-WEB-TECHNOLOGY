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

<h1>Replies Box</h1>

<table border="1">
    @csrf
    <tr>
        <th>ID</th>
        <th>created_at</th>
        <th>tittle</th>
        <th>body</th>
        <th>mails_id</th>
        <th>advisor_id</th>
        <th>Action</th>
    </tr>

    @foreach ($replie as  $q )

    <tr>
        <td>{{$q['id']}}</td>
        <td>{{$q['created_at']}}</td>
        <td>{{$q['tittle']}}</th>
        <td>{{$q['body']}}</td>
        <td>{{$q['mails_id']}}</td>
        <td>{{$q['advisor_id']}}</td>
        <td><a href={{url('edit2/'. $q ->id)}}>Update</a> <a href={{url('delete/'. $q ->id)}}>Delete</a></td>
    </tr>

    @endforeach
    <button type="submit" class=""><a href="/show">Back to dashboard</a></button>
</table>
