<?php


// function to create student

function create($conn, $param)
{

    extract($param);

    ## validation start

    if (empty($name)) {
        $result = array("error" => "Name is required");
        return $result;
    } else if (empty($email)) {
        $result = array("error" => "Email is required");
        return $result;
    } else if (isEmailUnique($conn, $email)) {
        $result = array("error" => "Email is already registered");
        return $result;
    } else if (empty($phone_no)) {
        $result = array("error" => "Phone Number is required");
        return $result;
    } else if (isPhoneUnique($conn, $phone_no)) {
        $result = array("error" => "Phone Number is already registered");
        return $result;
    } else if (empty($address)) {
        $result = array("error" => "address is required");
        return $result;
    } else if (isPhoneValid($phone_no)) {
        $result = array("error" => "Phone Number is not valid");
        return $result;
    }

    ## validation end

    $datetime = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `students`(`name`, `phone_no`, `email`, `address`, `created_at`) VALUES ('$name','$phone_no','$email','$address','$datetime')";

    $result["success"] = $conn->query($sql);
    return $result;
}


// function to update student

function update($conn, $param)
{

    extract($param);
    ## validation start

    if (empty($name)) {
        $result = array("error" => "Name is required");
        return $result;
    } else if (empty($email)) {
        $result = array("error" => "Email is required");
        return $result;
    } else if (isEmailUnique($conn, $email, $id)) {
        $result = array("error" => "Email is already registered");
        return $result;
    } else if (empty($phone_no)) {
        $result = array("error" => "Phone Number is required");
        return $result;
    } else if (isPhoneUnique($conn, $phone_no, $id)) {
        $result = array("error" => "Phone Number is already registered");
        return $result;
    } else if (empty($address)) {
        $result = array("error" => "address is required");
        return $result;
    } else if (isPhoneValid($phone_no)) {
        $result = array("error" => "Phone Number is not valid");
        return $result;
    }

    ## validation end

    $datetime = date("Y-m-d H:i:s");

    $sql = "UPDATE `students` SET `name`='$name',`phone_no`='$phone_no',`email`='$email',`address`='$address',`updated_at`='$datetime' WHERE id = $id";

    $result["success"] = $conn->query($sql);
    return $result;
}

// function to delete the student
function delete($conn, $id)
{
    $sql = "DELETE FROM `students` WHERE id = $id";
    $result = $conn->query($sql);
    return $result;
}

// function to update the student status
function updateStatus($conn, $id, $status)
{
    $sql = "UPDATE `students` SET `status`='$status' WHERE id = $id";
    $result = $conn->query($sql);
    return $result;
}


// function to get the students
function getStudents($conn)
{
    $sql = "SELECT * FROM `students` order by id desc";
    $result = $conn->query($sql);
    return $result;
}

// function to get the student details
function getStudentById($conn, $id)
{
    $sql = "SELECT * FROM `students` WHERE id = $id";
    $result = $conn->query($sql);
    return $result;
}

// function to get categories

function getCategories($conn)
{
    $sql = "select id, name from categories";
    $result = $conn->query($sql);
    return $result;
}


// function to check email no
function isEmailUnique($conn, $email, $id = NULL)
{
    $sql = "select id from students where email = '$email'";
    if ($id) {
        $sql .= " and id != $id";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
        return true;
    else return false;
}


// function to check phone no
function isPhoneUnique($conn, $phone_no, $id = NULL)
{
    $sql = "select id from students where phone_no = '$phone_no'";
    if ($id) {
        $sql .= " and id != $id";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
        return true;
    else return false;
}


// function to check valid phone no
function isPhoneValid($phone_no)
{
    if (is_numeric($phone_no) && strlen($phone_no) == 11) {
        return false;
    } else {
        return true;
    }
}
