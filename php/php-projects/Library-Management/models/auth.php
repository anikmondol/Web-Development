<?php

// function to login

function login($conn, $param)
{

    extract($param);

    ## validation start

    if (empty($email)) {
        $result = array("error" => "Email is required");
        return $result;
    } else if (empty($password)) {
        $result = array("error" => "Password is required");
        return $result;
    }

    ## validation end

    $sql = "select * from users where email = '$email'";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $user = mysqli_fetch_assoc($res);

        $hash = $user["password"];

        if (password_verify($password, $hash)) {
            $result = array("status" => true, "user" => $user);
        } else {
            $result = array("status" => false);
        }
    } else {
        $result = array("status" => false);
    }

    return $result;
}



// function to forgot password

function forgotPassword($conn, $param)
{

    extract($param);

    ## validation start
    if (empty($email)) {
        $result = array("error" => "Email is required");
        return $result;
    }
    ## validation end

    $sql = "select * from users where email = '$email'";
    $res = $conn->query($sql);


    //    send reset password email
    if ($res->num_rows > 0) {
        $user = mysqli_fetch_assoc($res);
        $user_id = $user["id"];
        $datetime = date("Y-m-d H:i:s");

        // generate otp
        $otp = rand(1111, 9999);
        $message = "Please use this OTP <b>$otp</b> to reset your password";

        // send reset password email

        $to = $email;
        $subject = "Forget password Request";
        $headers = "From: webmaster@lms.com" . "\r\n";


        $res = mail($to, $subject, $message, $headers);

        if ($res) {
            $sql = "INSERT INTO `forgot_password`(`user_id`, `reset_code`, `created_at`) VALUES ('$user_id',' $otp','$datetime')";
            $conn->query($sql);
            $result = array("status" => true);
        } else {
            $result = array("status" => false);
        }
    } else {
        $result = array("status" => false);
    }

    return $result;
}



// function to reset password

function resetPassword($conn, $param)
{

    extract($param);

    ## validation start
    if (empty($reset_code)) {
        $result = array("error" => "Reset Code is required");
        return $result;
    } elseif (empty($password)) {
        $result = array("error" => "Password is required");
        return $result;
    } elseif (empty($conf_pass)) {
        $result = array("error" => "Confirm is required");
        return $result;
    }
    ## validation end


    extract($param);


    $sql = "select * from forgot_password where reset_code = " . $reset_code;
    $res = $conn->query($sql);


    if ($res->num_rows > 0) {
        $code = mysqli_fetch_assoc($res);

        if ($password == $conf_pass) {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // update password
            $sql = "UPDATE users SET password = '$hash' where id = " . $code['user_id'];
            $conn->query($sql);


            // delete reset password
            $sql = "DELETE FROM `forgot_password` WHERE id = " . $code["id"];
            $conn->query($sql);


            $result = array("status" => true, "message" => "Password has been reset successfully");
        } else {
            $result = array("status" => false, "message" => "Confirm password doesn't match");
        }
    } else {
        $result = array("status" => false, "message" => "Invalid reset code");
    }

    return $result;
}




// function to change password

function changePassword($conn, $param)
{

    extract($param);

    ## validation start
    if (empty($param)) {
        $result = array("error" => "Selected the filed");
        return $result;
    }
    elseif (empty($current_pass)) {
        $result = array("error" => "Current password is required");
        return $result;
    } elseif (empty($new_pass)) {
        $result = array("error" => "New password is required");
        return $result;
    } elseif (empty($conf_pass)) {
        $result = array("error" => "Confirm is required");
        return $result;
    }
    ## validation end


    $loginUserPass = $_SESSION["user"]["password"];

    if (password_verify($current_pass, $loginUserPass)) {

        if ($new_pass == $conf_pass) {

            $hash = password_hash($new_pass, PASSWORD_DEFAULT);

            // update password
            $sql = "UPDATE users SET password = '$hash' where id = " . $_SESSION["user"]["id"];
            $conn->query($sql);


            $result = array("status" => true, "message" => "Password has been change successfully");
        } else {
            $result = array("status" => false, "message" => "Confirm password doesn't match");
        }
    } else {
        $result = array("status" => false,  "message" => "Invalid current password");
    }

    return $result;
}



// function to change password

function updateProfile($conn, $param)
{

    extract($param);


    ## upload image start

    $uploadTo = "assets/uploads/";
    $allowedFileTypes = array("jpg", "png", "jpeg", "gif");
    $fileName = rand(1111, 9999).$_FILES["profile_pic"]["name"];
    $temPath = $_FILES["profile_pic"]["tmp_name"];


    $originalPath = $uploadTo . $fileName;

    $fileType = pathinfo($originalPath, PATHINFO_EXTENSION);


    if (!empty($fileName)) {
       if (in_array($fileType, $allowedFileTypes)) {
       $upload = move_uploaded_file($temPath, $originalPath);
       }else{
         $result = array("status" => false, "message" => "Invalid File formate");
         return $result;
       }
    }

    ## upload image end



    $user_id = $_SESSION["user"]["id"];

    ## validation start
    if (empty($name)) {
        $result = array("error" => "Name is required");
        return $result;
    } elseif (empty($email)) {
        $result = array("error" => "Email is required");
        return $result;
    } elseif (empty($phone_no)) {
        $result = array("error" => "Phone number required");
        return $result;
    }
    ## validation end

    $datetime = date("Y-m-d H:i:s");

    $sql = "UPDATE `users` SET `name`='$name',`email`='$email',`phone`='$phone_no',`updated_at`='$datetime'";

    if (isset($upload)) {
        $sql .= " ,profile_pic = '$fileName' ";
        $_SESSION["user"]["profile_pic"] = $fileName;
    }

    $sql .= " WHERE id =". $user_id;
    $conn->query($sql);

    // update session user date
    $_SESSION["user"]["name"] = $name;
    $_SESSION["user"]["email"] = $email;
    $_SESSION["user"]["phone"] = $phone_no;


    $result = array("status" => true, "message" => "Profile has been update successfully");
    return $result;

}
