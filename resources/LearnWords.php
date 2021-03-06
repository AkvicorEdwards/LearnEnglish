<?php
/**
 * Created by PhpStorm.
 * User: AkvicorEdwards
 * Date: 2018/10/13
 * Time: 19:41
 */

/**
 * Class LearnWords
 *
 * public __construct()
 *
 * protected makeArray($str)   return
 * protected create_connection()   return
 * protected execute_sql($link, $database, $sql)   return
 * public method_1()
 * public method_2()
 * public method_3()
 * public method_4()
 * public method_5()
 * public method_6()
 * public method_7()
 * public method_8()
 * public list_list($list) return
 *  public setIsTrue()
 *  public setIsFalse()
 * public get_list()    return
 */

class LearnWords
{
    // Define the application version
    const VERSION = '3.0';

    // Reserve some variables
    protected $_appDir = null;
    protected $_config = null;

    /**
     * Login construct function. Run on object creation.
     */
    public function __construct()
    {
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
        return $newArr; //return array
    }

    /**
     * @return mysqli
     */
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
     * Single List random
     */
    public function method_1()
    {
        session_start();
        $list = $_COOKIE["sel_list"];//Get selected list
        $link = $this -> create_connection();  //Create Mysql connection

        $sql = "SELECT * FROM words WHERE lists='$list' ORDER BY RAND() LIMIT 1";
        $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);  //Run SQL query
        $row = mysqli_fetch_object($result);//Get result

        //Set cookie ,to show information in page
        if(mysqli_num_rows($result) == 0){  //if result does not exist
            die("List does not exist!");
        }

        //Write the result to the session
        $_SESSION['id'] = $row->id;
        $_SESSION['words'] = $row->word;
        $_SESSION['translate'] = $row->translate;
        $_SESSION['r_count'] = $row->r_count;
        $_SESSION['f_count'] = $row->f_count;
        $_SESSION['a_count'] = $row->a_count;
        $_SESSION['rate'] = $row->rate;

    }

    /**
     * Single List in order
     */
    public function method_2()
    {
        session_start();
        $list = $_COOKIE["sel_list"];//Get selected list
        $link = $this -> create_connection();//Create Mysql connection

        //Set begin id
        if(!isset($_SESSION['BeginID2'])||$_SESSION['BeginID2']>$_SESSION['EndID2']){   //Set BeginID2
            $sql = "SELECT * FROM words WHERE lists='$list' ORDER BY id ASC LIMIT 1";
            $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
            $row = mysqli_fetch_object($result);    //Get result
            $_SESSION['BeginID2']=$row->id;
        }

        //Set end id
        if(!isset($_SESSION['EndID2'])){    //Set EndID2
            $sql = "SELECT * FROM words WHERE lists='$list' ORDER BY id DESC LIMIT 1";
            $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
            $row = mysqli_fetch_object($result);   //Get result
            $_SESSION['EndID2']=$row->id;
        }

        //Get current word content
        $beginId2 = $_SESSION['BeginID2'];
        $sql = "SELECT * FROM words WHERE id='$beginId2'";
        $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
        //Set cookie ,to show information in page
        if(mysqli_num_rows($result) == 0){
            die("List does not exist!");
        }
        $row = mysqli_fetch_object($result);   //Get result

        //Write the result to the session
        $_SESSION['BeginID2'] = $row->id+1;
        $_SESSION['id'] = $row->id;
        $_SESSION['words'] = $row->word;
        $_SESSION['translate'] = $row->translate;
        $_SESSION['r_count'] = $row->r_count;
        $_SESSION['f_count'] = $row->f_count;
        $_SESSION['a_count'] = $row->a_count;
        $_SESSION['rate'] = $row->rate;
    }

    /**
     * All List random
     */
    public function method_3()
    {
        session_start();
        $link = $this -> create_connection();  //Create Mysql connection

        $sql = "SELECT * FROM words ORDER BY RAND() LIMIT 1";
        $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);  //Run SQL query
        $row = mysqli_fetch_object($result);//Get result

        //Set cookie ,to show information in page
        if(mysqli_num_rows($result) == 0){  //if result does not exist
            die("List does not exist!");
        }

        //Write the result to the session
        $_SESSION['id'] = $row->id;
        $_SESSION['words'] = $row->word;
        $_SESSION['translate'] = $row->translate;
        $_SESSION['r_count'] = $row->r_count;
        $_SESSION['f_count'] = $row->f_count;
        $_SESSION['a_count'] = $row->a_count;
        $_SESSION['rate'] = $row->rate;
    }

    /**
     * All List in order
     */
    public function method_4()
    {
        session_start();
        $link = $this -> create_connection();//Create Mysql connection

        //Set BeginID
        if(!isset($_SESSION['BeginID4'])||$_SESSION['BeginID4']>$_SESSION['EndID4']){   //Set BeginID4
            $sql = "SELECT * FROM words ORDER BY id ASC LIMIT 1";
            $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
            $row = mysqli_fetch_object($result);    //Get result
            $_SESSION['BeginID4']=$row->id;
        }

        //Set EndID
        if(!isset($_SESSION['EndID4'])){    //Set EndID2
            $sql = "SELECT * FROM words ORDER BY id DESC LIMIT 1";
            $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
            $row = mysqli_fetch_object($result);   //Get result
            $_SESSION['EndID4']=$row->id;
        }

        //Get current word content
        $beginId4 = $_SESSION['BeginID4'];
        $sql = "SELECT * FROM words WHERE id='$beginId4'";
        $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
        //Set cookie ,to show information in page
        if(mysqli_num_rows($result) == 0){
            die("List does not exist!");
        }
        $row = mysqli_fetch_object($result);   //Get result

        //Write the result to the session
        $_SESSION['BeginID4'] = $row->id+1;
        $_SESSION['id'] = $row->id;
        $_SESSION['words'] = $row->word;
        $_SESSION['translate'] = $row->translate;
        $_SESSION['r_count'] = $row->r_count;
        $_SESSION['f_count'] = $row->f_count;
        $_SESSION['a_count'] = $row->a_count;
        $_SESSION['rate'] = $row->rate;
    }
    public function method_5()
    {
        session_start();
        $list = $_COOKIE["sel_list"];//Get selected list
        $link = $this -> create_connection();  //Create Mysql connection

        $sql = "SELECT * FROM words WHERE (rate<0.5) And (lists='$list') ORDER BY RAND() LIMIT 1";
        $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);  //Run SQL query
        $row = mysqli_fetch_object($result);//Get result

        //Set cookie ,to show information in page
        if(mysqli_num_rows($result) == 0){  //if result does not exist
            die("List does not exist!");
        }

        //Write the result to the session
        $_SESSION['id'] = $row->id;
        $_SESSION['words'] = $row->word;
        $_SESSION['translate'] = $row->translate;
        $_SESSION['r_count'] = $row->r_count;
        $_SESSION['f_count'] = $row->f_count;
        $_SESSION['a_count'] = $row->a_count;
        $_SESSION['rate'] = $row->rate;
    }
    public function method_6()
    {
        session_start();
        $list = $_COOKIE["sel_list"];//Get selected list
        $link = $this -> create_connection();//Create Mysql connection

        //Set begin id
        if(!isset($_SESSION['BeginID6'])||$_SESSION['BeginID6']>$_SESSION['EndID6']){   //Set BeginID6
            $sql = "SELECT * FROM words WHERE (rate<0.5) And (lists='$list') ORDER BY id ASC LIMIT 1";
            $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
            $row = mysqli_fetch_object($result);    //Get result
            $_SESSION['BeginID6']=$row->id-0.5;
        }

        //Set end id
        if(!isset($_SESSION['EndID6'])){    //Set EndID2
            $sql = "SELECT * FROM words WHERE (rate<0.5) And (lists='$list') ORDER BY id DESC LIMIT 1";
            $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
            $row = mysqli_fetch_object($result);   //Get result
            $_SESSION['EndID6']=$row->id;
        }

        //Get current word content
        $beginId6 = $_SESSION['BeginID6'];

        $sql = "SELECT * FROM words WHERE (id>'$beginId6') AND (rate<0.5) AND (lists='$list') LIMIT 1";
        $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
        //Set cookie ,to show information in page
        if(mysqli_num_rows($result) == 0){
            die("List does not exist!");
        }
        $row = mysqli_fetch_object($result);   //Get result

        //Write the result to the session
        $_SESSION['BeginID6'] = $row->id+0.5;
        $_SESSION['id'] = $row->id;
        $_SESSION['words'] = $row->word;
        $_SESSION['translate'] = $row->translate;
        $_SESSION['r_count'] = $row->r_count;
        $_SESSION['f_count'] = $row->f_count;
        $_SESSION['a_count'] = $row->a_count;
        $_SESSION['rate'] = $row->rate;
    }
    public function method_7()
    {
        session_start();
        $link = $this -> create_connection();  //Create Mysql connection

        $sql = "SELECT * FROM words WHERE rate<0.5 ORDER BY RAND() LIMIT 1";
        $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);  //Run SQL query
        $row = mysqli_fetch_object($result);//Get result

        //Set cookie ,to show information in page
        if(mysqli_num_rows($result) == 0){  //if result does not exist
            die("List does not exist!");
        }

        //Write the result to the session
        $_SESSION['id'] = $row->id;
        $_SESSION['words'] = $row->word;
        $_SESSION['translate'] = $row->translate;
        $_SESSION['r_count'] = $row->r_count;
        $_SESSION['f_count'] = $row->f_count;
        $_SESSION['a_count'] = $row->a_count;
        $_SESSION['rate'] = $row->rate;
    }

    public function method_8()
    {
        session_start();
        $link = $this -> create_connection();//Create Mysql connection

        //Set begin id
        if(!isset($_SESSION['BeginID8'])||$_SESSION['BeginID8']>$_SESSION['EndID8']){   //Set BeginID8
            $sql = "SELECT * FROM words WHERE (rate<0.5) ORDER BY id ASC LIMIT 1";
            $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
            $row = mysqli_fetch_object($result);    //Get result
            $_SESSION['BeginID8']=$row->id-0.5;
        }

        //Set end id
        if(!isset($_SESSION['EndID8'])){    //Set EndID2
            $sql = "SELECT * FROM words WHERE (rate<0.5) ORDER BY id DESC LIMIT 1";
            $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
            $row = mysqli_fetch_object($result);   //Get result
            $_SESSION['EndID8']=$row->id;
        }

        //Get current word content
        $beginId8 = $_SESSION['BeginID8'];

        $sql = "SELECT * FROM words WHERE (id>'$beginId8') AND (rate<0.5) LIMIT 1";
        $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
        //Set cookie ,to show information in page
        if(mysqli_num_rows($result) == 0){
            die("List does not exist!");
        }
        $row = mysqli_fetch_object($result);   //Get result

        //Write the result to the session
        $_SESSION['BeginID8'] = $row->id+0.5;
        $_SESSION['id'] = $row->id;
        $_SESSION['words'] = $row->word;
        $_SESSION['translate'] = $row->translate;
        $_SESSION['r_count'] = $row->r_count;
        $_SESSION['f_count'] = $row->f_count;
        $_SESSION['a_count'] = $row->a_count;
        $_SESSION['rate'] = $row->rate;
    }

    public function list_list($list)
    {
        $link = $this -> create_connection();  //Create Mysql connection
        $sql = "SELECT * FROM words WHERE lists='$list'";
        $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);  //Run SQL query
        //Set cookie ,to show information in page
        if(mysqli_num_rows($result) == 0){  //if result does not exist
            die("List does not exist!");
        }
        return $result;
    }

    /**
     * Update the database when user enters the correct word
     */
    public function setIsTrue()
    {
        /*
         * When user choose Correct
         * Add the correct number of times
         * Total plus one
         * Update correct rate
         */
        session_start();
        $link = $this -> create_connection();
        $id = $_SESSION['id'];
        $r_count = $_SESSION['r_count'] + 1;
        $a_count = $_SESSION['a_count'] + 1;
        $rate = $r_count/$a_count;
        $sql = "UPDATE words SET r_count = '$r_count', a_count = '$a_count', rate = '$rate' WHERE id = '$id' ";
        $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
    }

    /**
     * Update the database when user enters a word error
     */
    public function setIsFalse()
    {
        /*
         * When user choose Wrong
         * Add the wrong number of times
         * Total plus one
         * Update correct rate
         */
        session_start();
        $link = $this -> create_connection();
        $id = $_SESSION['id'];
        $f_count = $_SESSION['f_count'] + 1;
        $a_count = $_SESSION['a_count'] + 1;
        $rate = $_SESSION['r_count']/$a_count;
        $sql = "UPDATE words SET f_count = '$f_count', a_count = '$a_count', rate = '$rate' WHERE id = '$id' ";
        $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
    }

    /**
     * Get all words from a list
     *
     * @return bool|mysqli_result
     */
    public function get_list()
    {
        $link = $this -> create_connection();
        $sql = "SELECT * FROM list_index";
        $result = $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);
        return $result;
    }

}