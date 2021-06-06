<?php
//delet function
    function delete($table,$colName, $id) {
        global $connection;
        $query = mysqli_query($connection, "DELETE FROM $table WHERE $colName = $id");
        if($query) {
            return true;
        } else {
            return false;
        }
    }

    //approve or unapprove

    function confirm($id) {
        global $connection;
        $query = mysqli_query($connection, "SELECT status FROM comments WHERE id='$id'");
        if(mysqli_num_rows($query) > 0) {
            $result = mysqli_fetch_array($query);
            $status = $result['status'];

            //check the value of status
            if($status == 'Unapproved') {
                $sql = mysqli_query($connection, "UPDATE comments SET status='Approved' WHERE id='$id'");
            } else {
                $sql = mysqli_query($connection, "UPDATE comments SET status='Unapproved' WHERE id='$id'");
            }

            return true;
        }
        else {
            return false;
        }
    }

    //redirect helper
    function redirect($page = 'index.php') {
        header("Location:".$page."");
    }