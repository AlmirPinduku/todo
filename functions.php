<?php
require 'db.php';
function createTodo($request){
    global $con;
    $todo = mysqli_real_escape_string($con, $request['todo']);
    $todo_time = mysqli_real_escape_string($con, $request['todo_time']);

    $query = "INSERT INTO `todo`(`todo`,`todo_time`) VALUES('$todo','$todo_time')";
    $execute_query = mysqli_query($con, $query);
    if($execute_query){
        header('location:index.php');
    }
}

function getTodo(){
    global $con;
    $query = "SELECT * FROM `todo`";
    $execute_query = mysqli_query($con, $query);
    return $execute_query;
}

function compitedTodo(){
    global $con;
    $query = "SELECT * FROM `todo` WHERE `status`= 1";
    $execute_query = mysqli_query($con, $query);
    return $execute_query;
}

function incompitedTodo(){
    global $con;
    $query = "SELECT * FROM `todo` WHERE `status`= 0";
    $execute_query = mysqli_query($con, $query);
    return $execute_query;
}

function selectTODOfinished($id) {

    global $con;
    $sql = "SELECT * FROM `todo` WHERE id = '".$id."' && status";
    
    $result = mysqli_query($con, $sql);

    echo "<form method='POST'>";
    echo "<pre>";
    if ($result and mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {

            spaces(15);
            if($row['done']) {
                echo "<input type='checkbox' checked class='largerCheckbox' name='check_list[]' value='".$row["taskid"] ."'>";
            }
            else {
                echo "<input type='checkbox' class='largerCheckbox' name='check_list[]' value='".$row["taskid"] ."'>";
            }
            echo "<td> " . $row["task"] . "</td>";
            echo "<br>";
        }
    }
    mysqli_close($con);
}

function changeStatus($id, $status){
    global $con;
    if($status === 'undone'){
        $query = "UPDATE `todo` SET `status`= 0 WHERE `id` = $id";
        $execute_query = mysqli_query($con, $query);
        if($execute_query){
            header('location: index.php');
        }
    }
    if($status === 'done'){
        $query = "UPDATE `todo` SET `status`= 1 WHERE `id` = $id";
        $execute_query = mysqli_query($con, $query);
        if($execute_query){
            header('location: index.php');
        }
    }


}

function delete($id){
    global $con;
    $query = "DELETE FROM `todo` WHERE `id` = '$id'";
    $execute_query = mysqli_query($con, $query);

    if($execute_query){
        header('location: index.php');
    }
}

function getSingleTodo($id){
    global $con;
    $query = "SELECT * FROM `todo` WHERE `id` = '$id'";
    $execute_query = mysqli_query($con, $query);
    $get_todo = mysqli_fetch_assoc($execute_query);
    return $get_todo;
}
function updateTodo($request){
    global $con;
    $id = mysqli_real_escape_string($con,$request['id']);
    $todo = mysqli_real_escape_string($con,$request['todo']);
    $todo_time = mysqli_real_escape_string($con,$request['todo_time']);

    $query = "UPDATE `todo` SET `todo` = '$todo', `todo_time` = '$todo_time' WHERE `id` = '$id'";
    $execute_query = mysqli_query($con, $query);
    if($execute_query){
        header('location: index.php');
    }
}

?>