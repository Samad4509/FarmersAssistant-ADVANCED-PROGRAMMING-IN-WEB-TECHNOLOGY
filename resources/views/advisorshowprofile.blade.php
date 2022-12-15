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

<h1>PROFILE</h1>

<table border="1">
    @csrf
    <tr>
        <th>ID</th>
        <th>firstName</th>
        <th>lastName</th>
        <th>username</th>
        <th>email</th>
        <th>dob</th>
        <th>gender</th>
        <th>city</th>
        <th>postalCode</th>
        <th>address</th>
        <th>phone</th>
        <th>created_at</th>

        <th>Action</th>
    </tr>

    @foreach ($User as  $q )

<tr>
        <td>{{$q['id']}}</td>
        <td>{{$q['firstname']}}</td>
        <td>{{$q['lastname']}}</td>
        <td>{{$q['username']}}</td>
        <td>{{$q['email']}}</td>
        <td>{{$q['dob']}}</td>
        <td>{{$q['gender']}}</td>
        <td>{{$q['city']}}</td>
        <td>{{$q['postalCode']}}</td>
        <td>{{$q['address']}}</th>
        <td>{{$q['phone']}}</td>
        <td>{{$q['created_at']}}</td>
        <td><a href={{url('edit3/'. $q ->id)}}>Update</a> </td>
</tr>


@endforeach
<button type="submit" class=""><a href="/show">Back to dashboard</a></button>
</table>




