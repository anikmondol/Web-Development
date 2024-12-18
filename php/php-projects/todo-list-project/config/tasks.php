<?php

class Task extends Database
{


    // function to insert date

    public function executeQuery($sql)
    {
        $result = $this->connect()->query($sql);

        if ($result) {
           return true;
        } else {
            return false;
        }
    }

    // function to get all tasks

    public function getAllTasks(){
         $sql = "SELECT * FROM `todo_lists` order by id desc";
         $result = $this->connect()->query($sql);

         $date = array();

         if ($result->num_rows > 0) {
           while ($row = $result->fetch_assoc()) {
            $date[] = $row;
           }
         }

         return $date;

    }

       // function to get all tasks

       public function getTask($id){
        $sql = "SELECT * FROM `todo_lists` where id = $id";
        $result = $this->connect()->query($sql);

        $date = array();

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
           $date = $row;
          }
        }

        return $date;
        

   }

    
}
