<?php

  $con=mysqli_connect("localhost","root","","db_sample");
  
  $action=$_POST["action"];
  if($action=="Insert"){
    $name=mysqli_real_escape_string($con,$_POST["name"]);
    $gender=mysqli_real_escape_string($con,$_POST["gender"]);
    $debartname=mysqli_real_escape_string($con,$_POST["debartname"]);
    $sql="insert into data (NAME,GENDER,debartname) values ('{$name}','{$gender}','{$debartname}') ";
    if($con->query($sql)){
      $id=$con->insert_id;
      echo "
        <tr uid='{$id}'>
          <td>{$name}</td>
          <td>{$gender}</td>
          <td>{$debartname}</td>
          <td><a href='#' class='btn btn-primary edit'>Edit</a></td>
          <td><a href='#' class='btn btn-danger delete'>Delete</a></td>
        </tr>";
    }else{
      echo false;
    }
  }else if($action=="Update"){
    $id=mysqli_real_escape_string($con,$_POST["id"]);
    $name=mysqli_real_escape_string($con,$_POST["name"]);
    $gender=mysqli_real_escape_string($con,$_POST["gender"]);
    $debartname=mysqli_real_escape_string($con,$_POST["debartname"]);
    $sql="update data SET NAME='{$name}',GENDER='{$gender}',debartname='{$debartname}' where ID='{$id}'";
    if($con->query($sql)){
      echo "
        <td>{$name}</td>
        <td>{$gender}</td>
        <td>{$debartname}</td>
        <td><a href='#' class='btn btn-primary edit'>Edit</a></td>
        <td><a href='#' class='btn btn-danger delete'>Delete</a></td>";
        
    }else{
      echo false;
    }
  }else if($action=="Delete"){
    $id=$_POST["uid"];
    $sql="delete from data where ID='{$id}'";
    if($con->query($sql)){
      echo true;
    }else{
      echo false;
    }
  }
?>