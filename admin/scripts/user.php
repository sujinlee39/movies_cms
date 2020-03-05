<?php

function creataUser($fname, $username, $password, $email){
    $pdo = Database::getInstance()->getConnection();

    //TODO: build the proper SQL query with the infomation above
    // executes it to create a user in tbl_user;
    $create_user_query = 'INSERT INTO tbl_user(user_fname, user_name, user_pass, user_email)';
    $create_user_query .= ' VALUES(:fname, :username, :password, :email)';
    $create_user_set = $pdo->prepare($create_user_query);
    $create_user_result = $create_user_set->execute(
        array(
            ':fname'=>$fname,
            ':username'=>$username,
            ':password'=>$password,
            ':email'=>$email
        )
    );


    //TODO: based on the execution result, if everthing goes through
    // redirect to the index.php
    // Otherwise, return a error message

    if($create_user_result){
        redirect_to('index.php');
    }else{
        return 'This individual sucks!';
    }
}



