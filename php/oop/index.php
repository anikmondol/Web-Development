<?php


/* 

class Student
{

    # properties 

    public $name;


    // constructor

    function __construct($str)
    {
        $this->name = $str . "<br>";
    }


    // destructor

    function __destruct()
    {
        echo "this is student name " . $this->name ;
    }

    # method
    function set_Name($str)
    {
        $this->name = $str;
    }

    function get_name()
    {
        return $this->name;
    }



}


# objects creation
$obj = new Student("hi anik");
// $obj2 = new Student();

// $obj2->set_Name(" anik");
echo $obj->get_name();

*/


/* 

class Student{

    # properties

    public $name;


    # method

    function setName($str){
       return $this->name = $str;
    }


    function getName(){
        return $this->name;
     }
 

}

$obj = new Student();

$obj->setName("anik");

echo $obj->getName();


*/


/* 

class Student{

    # properties

    protected $name;

    function __construct($str)
    {
        $this->name = $str . "<br>";
    }

    # method

    function setName($str){
       return $this->name = $str;
    }

 

}


class ClassX extends Student{
    function getNameFromX(){
        return $this->name;
     }
}


class ClassX1 extends Student{
    function getNameFromX1(){
        return $this->name;
     }
}

$obj = new ClassX("anik");
echo "name of class x student : ". $obj->getNameFromX();

$obj2 = new ClassX1("apu");
echo "name of class x1 student : ". $obj2->getNameFromX1();

*/

/*

1. abstract class contain at least 1 abstract function
2. abstract class can not have object
3. abstract class, child class must contain abstract function
4. abstract class function: must declare but not implemented





abstract class University{

    abstract function is12thPass();

}

class College extends University{
   function is12thPass()
   {
    return "is12thPass";
   }
}


$obj = new College();

echo $obj->is12thPass();



*/


/*

1. Interface Support multiple inheritance
2. Interface can only only contain abstract function
3. In Interface we can't crate variables(properties)
4. no constrictor functions in interface
5. all functions must be public


interface AdarCard{

     function verifyAdar();

}

interface PanCard{

    function verifyPanCard();

}


class DrivingLicense implements AdarCard, PanCard{
    function verifyAdar()
    {
        echo "AdarCard";
    }

    function verifyPanCard(){
        echo "<br>PanCard";
    }

    function DrivingLicense(){
        echo "<br> DrivingLicense you got it";
    }

}


$obj = new DrivingLicense();
$obj->verifyAdar();
$obj->verifyPanCard();
$obj->DrivingLicense();


*/



/*

1. Interface Support multiple inheritance
2. Interface can only only contain abstract function
3. In Interface we can't crate variables(properties)
4. no constrictor functions in interface
5. all functions must be public


interface AdarCard{

     function verifyAdar();

}

interface PanCard{

    function verifyPanCard();

}


class DrivingLicense implements AdarCard, PanCard{
    function verifyAdar()
    {
        echo "AdarCard";
    }

    function verifyPanCard(){
        echo "<br>PanCard";
    }

    function DrivingLicense(){
        echo "<br> DrivingLicense you got it";
    }

}


$obj = new DrivingLicense();
$obj->verifyAdar();
$obj->verifyPanCard();
$obj->DrivingLicense();


*/


/*

same operation may be behave differently in different classes

 


interface AdarCard{

     function verifyAdar();

}

interface PanCard{

    function verifyPanCard();

}


class DrivingLicense implements AdarCard, PanCard{
    function verifyAdar()
    {
        echo "AdarCard";
    }

    function verifyPanCard(){
        echo "<br>PanCard";
    }

    function DrivingLicense(){
        echo "<br> DrivingLicense you got it";
    }

}


$obj = new DrivingLicense();
$obj->verifyAdar();
$obj->verifyPanCard();
$obj->DrivingLicense();



class BankAccount implements AdarCard, PanCard{
    function verifyAdar()
    {
        echo "<br> <br> AdarCard";
    }

    function verifyPanCard(){
        echo "<br>PanCard";
    }

    function bankAccount(){
        echo "<br> bankAccount you got it";
    }

}


$obj2 = new bankAccount();
$obj2->verifyAdar();
$obj2->verifyPanCard();
$obj2->BankAccount();


*/


/*

Traits



trait A{

    function fun1(){
        echo "Fun1";
    }

}

trait B{

    function fun2(){
        echo "Fun2";
    }

}

class C{

    use A;
    use B;


}

$obj = new C();

$obj->fun2();


class D extends c{

}

$obj2 = new D();

echo $obj->fun1();


*/ 


/* 


trait A{

    function fun1(){
        echo "A: Fun1";
    }

}

trait B{

    function fun1(){
        echo "<br> B: Fun2";
    }
    
}

class C{
    use A, B{
        A::fun1 insteadof B;
        B::fun1 as fun2;
    }

    function fun3(){
        echo "<br> fun3";
    }

}


$obj = new C;

$obj->fun1();
$obj->fun2();
$obj->fun3();

*/


class A{

   public static $num = 10;
   public static $n;

   public static function test(){
        echo "<br>test";
    }

    public static function setValue($no){
        self::$n = $no;
    }

    public static function getValue(){
        return self::$n;
    }
}


// $obj = new A();
// echo  $obj->num;
//  $obj->test();


echo A::$num;
A::test();
A::setValue(10);
echo "<br>". A::getValue();
