<?php
/**
 * Created by PhpStorm.
 * User: AkvicorEdwards
 * Date: 2018/10/13
 * Time: 19:41
 */

class LearnWords
{
    // Define the application version
    const VERSION = '1.0';

    // Reserve some variables
    protected $_appDir = null;
    protected $_config = null;

    /**
     * Login construct function. Run on object creation.
     */
    public function __construct(){
        // Set the class directory constant
        if(!defined('__DIR__')) {
            define('__DIR__', dirname(__FILE__));
        }

        // Set the application directory
        $this -> _appDir = __DIR__;

        //Load configuration file
        $configFile = $this->_appDir . '/config.php';

        if (file_exists($configFile)) {
            $this->_config = require($configFile);
        } else {
            die('ERROR: Missing application config file at ' . $configFile);
        }
    }



    /**
     * Cut a string into an array with a space as the key
     *
     * @param $str
     * @return array
     */
    protected function makeArray($str)
    {
        $arr = explode(" ", $str);  //Cut
        $arr = array_filter($arr);  // Delete void
        foreach($arr as $value)  //Format
        {
            $newArr[] = $value;
        }
        return $newArr;
    }

    protected function create_connection()
    {
        $link = mysqli_connect($this->_config['mysql_host'], $this->_config['mysql_user'], $this->_config['mysql_password'])
        or die("Unable to connect the Database:" . mysqli_connect_error());

        mysqli_query($link, "SET NAMES utf8");

        return $link;
    }

    /**
     * Execute sql
     *
     * @param $link
     * @param $database
     * @param $sql
     * @return bool|mysqli_result
     */
    protected function execute_sql($link, $database, $sql)
    {
        mysqli_select_db($link, $database)
        or die("Failed to open Database " . mysqli_error($link));

        $result = mysqli_query($link, $sql);

        return $result;
    }



    /**
     * METHOD
     */

    public function method_1(){  //finished
        $list = $_COOKIE["sel_list"];
        $link = $this -> create_connection();
        $sql = "SELECT * FROM english WHERE list='$list' ORDER BY RAND() LIMIT 1";
        $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
        $row = mysqli_fetch_assoc($result);
        //Set cookie ,to show information in page
        if(mysqli_num_rows($result) == 0){
            die("List does not exist!");
        }
        SETCOOKIE("id",$row["id"],time()+60*60*24);
        SETCOOKIE("words",$row["word"],time()+60*60*24);
        SETCOOKIE("translate",$row["translate"],time()+60*60*24);
        SETCOOKIE("r_cont",$row["r_cont"],time()+60*60*24);
        SETCOOKIE("f_cont",$row["f_cont"],time()+60*60*24);
        SETCOOKIE("cont",$row["cont"],time()+60*60*24);
        SETCOOKIE("rate",$row["rate"],time()+60*60*24);

    }
    public function method_2(){ //finished
        $list = $_COOKIE["sel_list"];
        $link = $this -> create_connection();

        //Set begin id and end id
        if(EMPTY($_COOKIE['beginId2'])||($_COOKIE['beginId2']>$_COOKIE['endId2'])){
            $sql = "SELECT * FROM english WHERE list='$list' ORDER BY 'id' ASC LIMIT 1";
            $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
            $row = mysqli_fetch_assoc($result);
            SETCOOKIE("beginId2",$row["id"]-1,time()+60*60*24);
        }
        if(EMPTY($_COOKIE['endId2'])||($_COOKIE['beginId2']>$_COOKIE['endId2'])){
            $sql = "SELECT * FROM english WHERE list='$list' ORDER BY 'id' DESC LIMIT 1";
            $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
            $row = mysqli_fetch_assoc($result);
            SETCOOKIE("endId2",$row["id"],time()+60*60*24);
        }
        $beginId2 = $_COOKIE['beginId2']+1;


        $sql = "SELECT * FROM english WHERE id='$beginId2'";
        $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
        $row = mysqli_fetch_assoc($result);
        //Set cookie ,to show information in page
        if(mysqli_num_rows($result) == 0){
            die("List does not exist!");
        }
        SETCOOKIE("beginId2",$row["id"],time()+60*60*24);
        SETCOOKIE("id",$row["id"],time()+60*60*24);
        SETCOOKIE("words",$row["word"],time()+60*60*24);
        SETCOOKIE("translate",$row["translate"],time()+60*60*24);
        SETCOOKIE("r_cont",$row["r_cont"],time()+60*60*24);
        SETCOOKIE("f_cont",$row["f_cont"],time()+60*60*24);
        SETCOOKIE("cont",$row["cont"],time()+60*60*24);
        SETCOOKIE("rate",$row["rate"],time()+60*60*24);
    }
    public function method_3(){ //finished
        $list = $_COOKIE["sel_list"];
        $link = $this -> create_connection();
        $sql = "SELECT * FROM english ORDER BY RAND() LIMIT 1";
        $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
        $row = mysqli_fetch_assoc($result);
        //Set cookie ,to show information in page
        if(mysqli_num_rows($result) == 0){
            die("List does not exist!");
        }
        SETCOOKIE("id",$row["id"],time()+60*60*24);
        SETCOOKIE("words",$row["word"],time()+60*60*24);
        SETCOOKIE("translate",$row["translate"],time()+60*60*24);
        SETCOOKIE("r_cont",$row["r_cont"],time()+60*60*24);
        SETCOOKIE("f_cont",$row["f_cont"],time()+60*60*24);
        SETCOOKIE("cont",$row["cont"],time()+60*60*24);
        SETCOOKIE("rate",$row["rate"],time()+60*60*24);
    }
    public function method_4(){ //finished
        $list = $_COOKIE["sel_list"];
        $link = $this -> create_connection();
        //Set begin id and end id
        if(EMPTY($_COOKIE['beginId4'])||($_COOKIE['beginId4']>$_COOKIE['endId4'])){
            $sql = "SELECT * FROM english ORDER BY 'id' ASC LIMIT 1";
            $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
            $row = mysqli_fetch_assoc($result);
            SETCOOKIE("beginId4",$row["id"]-1,time()+60*60*24);
        }
        if(EMPTY($_COOKIE['endId4'])||($_COOKIE['beginId4']>$_COOKIE['endId4'])){
            $sql = "SELECT * FROM english ORDER BY 'id' DESC LIMIT 1";
            $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
            $row = mysqli_fetch_assoc($result);
            SETCOOKIE("endId4",$row["id"],time()+60*60*24);
        }
        $beginId4 = $_COOKIE['beginId4']+1;


        $sql = "SELECT * FROM english WHERE id='$beginId4'";
        $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
        $row = mysqli_fetch_assoc($result);
        //Set cookie ,to show information in page
        if(mysqli_num_rows($result) == 0){
            die("List does not exist!");
        }
        SETCOOKIE("beginId4",$row["id"],time()+60*60*24);
        SETCOOKIE("id",$row["id"],time()+60*60*24);
        SETCOOKIE("words",$row["word"],time()+60*60*24);
        SETCOOKIE("translate",$row["translate"],time()+60*60*24);
        SETCOOKIE("r_cont",$row["r_cont"],time()+60*60*24);
        SETCOOKIE("f_cont",$row["f_cont"],time()+60*60*24);
        SETCOOKIE("cont",$row["cont"],time()+60*60*24);
        SETCOOKIE("rate",$row["rate"],time()+60*60*24);
    }
    public function method_5(){ //finished
        $list = $_COOKIE["sel_list"];
        $link = $this -> create_connection();
        $sql = "SELECT * FROM english WHERE ((rate<0.5)&&(list='$list')) ORDER BY RAND() LIMIT 1";
        $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
        $row = mysqli_fetch_assoc($result);
        //Set cookie ,to show information in page
        if(mysqli_num_rows($result) == 0){
            die("List does not exist! OR No hard words!");
        }
        SETCOOKIE("id",$row["id"],time()+60*60*24);
        SETCOOKIE("words",$row["word"],time()+60*60*24);
        SETCOOKIE("translate",$row["translate"],time()+60*60*24);
        SETCOOKIE("r_cont",$row["r_cont"],time()+60*60*24);
        SETCOOKIE("f_cont",$row["f_cont"],time()+60*60*24);
        SETCOOKIE("cont",$row["cont"],time()+60*60*24);
        SETCOOKIE("rate",$row["rate"],time()+60*60*24);
    }
    public function method_6(){
        $list = $_COOKIE["sel_list"];
        $link = $this -> create_connection();
        //Set begin id and end id
        if(EMPTY($_COOKIE['beginId6'])||($_COOKIE['beginId6']>$_COOKIE['endId6'])){
            $sql = "SELECT * FROM english WHERE ((rate<0.5)&&(list='$list')) ORDER BY 'id' ASC LIMIT 1";
            $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
            $row = mysqli_fetch_assoc($result);
            SETCOOKIE("beginId6",$row["id"]-1,time()+60*60*24);
        }
        if(EMPTY($_COOKIE['endId6'])||($_COOKIE['beginId6']>$_COOKIE['endId6'])){
            $sql = "SELECT * FROM english WHERE ((rate<0.5)&&(list='$list')) ORDER BY 'id' DESC LIMIT 1";
            $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
            $row = mysqli_fetch_assoc($result);
            SETCOOKIE("endId6",$row["id"],time()+60*60*24);
        }


        $nowId = $_COOKIE['beginId6'];
        $sql = "SELECT * FROM english WHERE ((rate<0.5)&&(list='$list')&&(id>'$nowId')) ORDER BY 'id' ASC LIMIT 1";
        $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
        $row = mysqli_fetch_assoc($result);
        //Set cookie ,to show information in page
        if(mysqli_num_rows($result) == 0){
            die("List does not exist! OR No hard words!");
        }
        SETCOOKIE("beginId6",$row["id"],time()+60*60*24);
        SETCOOKIE("id",$row["id"],time()+60*60*24);
        SETCOOKIE("words",$row["word"],time()+60*60*24);
        SETCOOKIE("translate",$row["translate"],time()+60*60*24);
        SETCOOKIE("r_cont",$row["r_cont"],time()+60*60*24);
        SETCOOKIE("f_cont",$row["f_cont"],time()+60*60*24);
        SETCOOKIE("cont",$row["cont"],time()+60*60*24);
        SETCOOKIE("rate",$row["rate"],time()+60*60*24);
    }
    public function method_7(){ //finished
        $list = $_COOKIE["sel_list"];
        $link = $this -> create_connection();
        $sql = "SELECT * FROM english WHERE rate<0.5 ORDER BY RAND() LIMIT 1";
        $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
        $row = mysqli_fetch_assoc($result);
        //Set cookie ,to show information in page
        if(mysqli_num_rows($result) == 0){
            die("List does not exist! OR No hard words!");
        }
        SETCOOKIE("id",$row["id"],time()+60*60*24);
        SETCOOKIE("words",$row["word"],time()+60*60*24);
        SETCOOKIE("translate",$row["translate"],time()+60*60*24);
        SETCOOKIE("r_cont",$row["r_cont"],time()+60*60*24);
        SETCOOKIE("f_cont",$row["f_cont"],time()+60*60*24);
        SETCOOKIE("cont",$row["cont"],time()+60*60*24);
        SETCOOKIE("rate",$row["rate"],time()+60*60*24);
    }
    public function method_8(){
        $list = $_COOKIE["sel_list"];
        $link = $this -> create_connection();
        //Set begin id and end id
        if(EMPTY($_COOKIE['beginId8'])||($_COOKIE['beginId8']>$_COOKIE['endId8'])){
            $sql = "SELECT * FROM english WHERE rate<0.5 ORDER BY 'id' ASC LIMIT 1";
            $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
            $row = mysqli_fetch_assoc($result);
            SETCOOKIE("beginId8",$row["id"]-1,time()+60*60*24);
        }
        if(EMPTY($_COOKIE['endId8'])||($_COOKIE['beginId8']>$_COOKIE['endId8'])){
            $sql = "SELECT * FROM english WHERE rate<0.5 ORDER BY 'id' DESC LIMIT 1";
            $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
            $row = mysqli_fetch_assoc($result);
            SETCOOKIE("endId8",$row["id"],time()+60*60*24);
        }


        $nowId = $_COOKIE['beginId8'];
        $sql = "SELECT * FROM english WHERE ((rate<0.5)&&(id>'$nowId')) ORDER BY 'id' ASC LIMIT 1";
        $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
        $row = mysqli_fetch_assoc($result);
        //Set cookie ,to show information in page
        if(mysqli_num_rows($result) == 0){
            die("List does not exist! OR No hard words!");
        }
        SETCOOKIE("beginId8",$row["id"],time()+60*60*24);
        SETCOOKIE("id",$row["id"],time()+60*60*24);
        SETCOOKIE("words",$row["word"],time()+60*60*24);
        SETCOOKIE("translate",$row["translate"],time()+60*60*24);
        SETCOOKIE("r_cont",$row["r_cont"],time()+60*60*24);
        SETCOOKIE("f_cont",$row["f_cont"],time()+60*60*24);
        SETCOOKIE("cont",$row["cont"],time()+60*60*24);
        SETCOOKIE("rate",$row["rate"],time()+60*60*24);
    }

    public function setIsTrue(){
        $link = $this -> create_connection();
        $id = $_COOKIE['id'];
        $r_cont = $_COOKIE['r_cont'] + 1;
        $cont = $_COOKIE['cont'] + 1;
        $rate = $r_cont/$cont;
        $sql = "UPDATE english SET r_cont = '$r_cont', cont = '$cont', rate = '$rate' WHERE id = '$id' ";
        $result = $this -> execute_sql($link, $this->_config['mysql_user_database'], $sql);
    }
    public function setIsFalse(){
        $link = $this -> create_connection();
        $id = $_COOKIE['id'];
        $f_cont = $_COOKIE['f_cont'] + 1;
        $cont = $_COOKIE['cont'] + 1;
        $rate = $_COOKIE['r_cont']/$cont;
        $sql = "UPDATE english SET f_cont = '$f_cont', cont = '$cont', rate = '$rate' WHERE id = '$id' ";
        $result = $this -> execute_sql($link, $this->_config['mysql_user_database'], $sql);
    }

}