<?php


// function to create loan

function create($conn, $param)
{

    extract($param);

    ## Validation start
    if (empty($title)) {
        $result = array("error" => "Title is required");
        return $result;
    } else if (empty($duration)) {
        $result = array("error" => "Duration is required");
        return $result;
    } else if (empty($amount)) {
        $result = array("error" => "Amount is required");
        return $result;
    }
    ## Validation end

    $datetime = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `subscription_plans`(`title`, `amount`, `duration`, `created_at`) VALUES ('$title','$amount','$duration','$datetime')";

    $result["success"] = $conn->query($sql);
    return $result;
}





// function to update student

function update($conn, $param)
{

    extract($param);

    ## Validation start
    if (empty($title)) {
        $result = array("error" => "Title is required");
        return $result;
    } else if (empty($duration)) {
        $result = array("error" => "Duration is required");
        return $result;
    } else if (empty($amount)) {
        $result = array("error" => "Amount is required");
        return $result;
    }
    ## Validation end

    $datetime = date("Y-m-d H:i:s");



    $sql = "UPDATE `subscription_plans` SET `title`='$title',`amount`='$amount',`duration`='$duration',`updated_at`='$datetime' WHERE id = $id";


    $result["success"] = $conn->query($sql);
    return $result;
}

// function to delete the student
function delete($conn, $id)
{
    $sql = "DELETE FROM `subscription_plans` WHERE id = $id";
    $result = $conn->query($sql);
    return $result;
}

// function to update the student status
function updateStatus($conn, $id, $status)
{
    $sql = "UPDATE `subscription_plans` SET `status`='$status' WHERE id = $id";
    $result = $conn->query($sql);
    return $result;
}


// function to get the loans
function getPlans($conn)
{
    $sql = "SELECT * FROM `subscription_plans`";
    $result = $conn->query($sql);
    return $result;
}

// function to get the plan details
function getPlanById($conn, $id)
{
    $sql = "SELECT * FROM `subscription_plans` WHERE id = $id";
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


// function to get books

function getActivePlans($conn)
{
    $sql = "select id, title from subscription_plans where status = 1";
    $result = $conn->query($sql);
    return $result;
}


// function to create Subscriptions

function createSubscriptions($conn, $param)
{

    extract($param);

    ## Validation start
    if (empty($student_id)) {
        $result = array("error" => "Student selection is required");
        return $result;
    } else if (empty($plan_id)) {
        $result = array("error" => "Plan selection is required");
        return $result;
    }

    ## Validation end

    $datetime = date("Y-m-d H:i:s");
    $start_date = date("Y-m-d");
    $end_date = date("Y-m-d");

    ## get plan

    $plan = getPlanById($conn, $plan_id);

    if ($plan->num_rows > 0) {
        $plan = mysqli_fetch_assoc($plan);
        $duration = $plan["duration"];


        ## start date - end date calculation
        $start_date = date("Y-m-d");
        $start_time = strtotime($start_date);
        $end_date = date("Y-m-d", strtotime("+$duration month", $start_time));
        $amount = $plan['amount'];


        $sql = "INSERT INTO `subscriptions`(`student_id`, `plan_id`, `start_date`, `end_date`, `amount`, `created_at`) VALUES ('$student_id','$plan_id','$start_date','$end_date', $amount,'$datetime')";

        $result["success"] = $conn->query($sql);
        return $result;
    } else {
        $result = array("error" => "Invalid plan selection");
        return $result;
    }
}



// function to get the loans
function getPurchaseHistory($conn, $from, $to)
{


    $sql =  $sql = "select s.*, p.title as plan_name, st.name as student_name 
    from subscriptions s
    inner join subscription_plans p on p.id = s.plan_id
    inner join students st on st.id = s.student_id where s.id != 0";

    if (!empty($from)) {
        $sql .= " AND s.start_date >= '$from'";
    }

    if (!empty($to)) {
        $sql .= " AND s.end_date <= '$to'";
    }

    $sql .= " order by s.id desc";


    $result = $conn->query($sql);
    return $result;
}
