<?php


// function to create loan

function create($conn, $param)
{

    extract($param);

    ## Validation start
    if (empty($book_id)) {
        $result = array("error" => "Book selection is required");
        return $result;
    } else if (empty($student_id)) {
        $result = array("error" => "Student selection is required");
        return $result;
    } else if (empty($loan_date)) {
        $result = array("error" => "Loan date selection is required");
        return $result;
    } else if (empty($return_date)) {
        $result = array("error" => "Return date selection is required");
        return $result;
    }
    ## Validation end

    $datetime = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `books_loans`(`book_id`, `student_id`, `loan_date`, `return_date`, `created_at`) VALUES ('$book_id','$student_id','$loan_date','$return_date','$datetime')";

    $result["success"] = $conn->query($sql);
    return $result;
}


// function to update student

function update($conn, $param)
{

    extract($param);

    ## Validation start
    if (empty($book_id)) {
        $result = array("error" => "Book selection is required");
        return $result;
    } else if (empty($student_id)) {
        $result = array("error" => "Student selection is required");
        return $result;
    } else if (empty($loan_date)) {
        $result = array("error" => "Loan date selection is required");
        return $result;
    } else if (empty($return_date)) {
        $result = array("error" => "Return date selection is required");
        return $result;
    }
    ## Validation end

    $datetime = date("Y-m-d H:i:s");



    $sql = "UPDATE `books_loans` SET `book_id`='$book_id',`student_id`='$student_id',`loan_date`='$loan_date',`return_date`='$return_date',`updated_at`='$datetime' WHERE id = $id";
   

    $result["success"] = $conn->query($sql);
    return $result;
}

// function to delete the student
function delete($conn, $id)
{
    $sql = "DELETE FROM `books_loans` WHERE id = $id";
    $result = $conn->query($sql);
    return $result;
}

// function to update the student status
function updateStatus($conn, $id, $is_return)
{
    $sql = "UPDATE `books_loans` SET `is_return`='$is_return' WHERE id = $id";
    $result = $conn->query($sql);
    return $result;
}


// function to get the loans
function getLoans($conn)
{
    $sql = "select l.*, b.title as book_title, s.name as student_name 
        from books_loans l
        inner join books b on b.id = l.book_id
        inner join students s on s.id = l.student_id
        order by l.id desc";
    $result = $conn->query($sql);
    return $result;
}

// function to get the student details
function getLoanById($conn, $id)
{
    $sql = "SELECT * FROM `books_loans` WHERE id = $id";
    $result = $conn->query($sql);
    return $result;
}

// function to get students

function getStudents($conn)
{
    $sql = "select id, name from students";
    $result = $conn->query($sql);
    return $result;
}

// function to get books

function getBooks($conn)
{
    $sql = "select id, title from books";
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
