<?php

// function to get system counts
function getCounts($conn)
{

    ## global array
    $counts = array(
        "total_books" => 0,
        "total_students" => 0,
        "total_loans" => 0,
        "total_amount" => 0,
    );

    ## get books counts
    $sql = "select count(id) as total_books from books";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        $books = mysqli_fetch_assoc($res);
        $counts["total_books"] = $books['total_books'];
    }

    ## get books counts
    $sql = "select count(id) as total_students from students";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        $books = mysqli_fetch_assoc($res);
        $counts["total_students"] = $books['total_students'];
    }

    ## get loans counts
    $sql = "select count(id) as total_loans from books_loans";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        $books = mysqli_fetch_assoc($res);
        $counts["total_loans"] = $books['total_loans'];
    }

    ## get loans counts
    $sql = "select sum(amount) as total_amount from subscriptions";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        $books = mysqli_fetch_assoc($res);
        $counts["total_amount"] = $books['total_amount'];
    }


    return $counts;
}


// function to get system counts
function getTabsDate($conn)
{

    ## global array
    $tabs = array(
        'students' => array(),
        'loans' => array(),
        'subscriptions' => array(),
    );


    ## get recent top books 
    $sql = "SELECT * FROM `students` order by id desc limit 6";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $tabs['students'][] = $row;
        }
    }

    ## get recent top loans 
    $sql = "SELECT l.*, b.title as book_title, s.name as student_name  FROM `books_loans` l
     inner join books b on b.id = l.book_id
     inner join students s on s.id = l.student_id
      order by l.id desc limit 6";



    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $tabs['loans'][] = $row;
        }
    }

    ## get recent top subscriptions 
      $sql = "select s.*, p.title as plan_name, st.name as student_name from subscriptions s
      inner join subscription_plans p on p.id = s.plan_id
      inner join students st on st.id = s.student_id 
      order by s.id desc limit 6";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $tabs['subscriptions'][] = $row;
        }
    }


    return $tabs;
}
