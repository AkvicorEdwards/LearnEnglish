<?php
/**
 * Created by PhpStorm.
 * User: AkvicorEdwards
 * Date: 2018/10/13
 * Time: 19:29
 */

/**
 * Class EnterWords
 *
 * public __construct()
 *
 * public enterWords($list,$content)   return
 * protected makeArray($str)   return
 * protected create_connection()   return
 * protected execute_sql($link, $database, $sql)   return
 */
class EnterWords
{
    // Define the application version
    const VERSION = '2.3';

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
     * Write data to the database
     *
     * @param $list
     * @param $content
     * @return bool
     */
    public function enterWords($list,$content)
    {
        $tag = $this->makeArray($content);
        $tagCount = count($tag);//Array
        $link = $this->create_connection();//Create database connection
        for($i=0;$i<$tagCount;$i=$i+2){
            $word = $this->trim_merge_spaces($tag[$i]);
            $translate = $this->trim_merge_spaces($tag[$i+1]);
            $sql = "insert into words ( lists, word, translate) values ('$list', '$word','$translate')";
            $result = $this->execute_sql($link, $this->_config['mysql_project_database'], $sql);//Write words into database

            $sql = "SELECT * FROM list_index WHERE list_name = '$list'";//Record list name and number of words
            $result2 = $this->execute_sql($link, $this->_config['mysql_project_database'], $sql);
            if($row = mysqli_fetch_assoc($result2)){//if list name already exist
                $list_name = $row['list_name'];
                $total = $row['total']+1;
                $sql = "UPDATE list_index SET total='$total' WHERE list_name='$list_name'";
                $this->execute_sql($link, $this->_config['mysql_project_database'], $sql);
            }else{//If list name does not exist
                $sql = "insert into list_index (list_name,total) values ('$list','1')";
                $this->execute_sql($link, $this->_config['mysql_project_database'], $sql);
            }
        }
        if(!$result){
            return false;//Enter failure
        }else{
            return true;//Enter success
        }
    }

    public function delete_list($list)
    {
        $link = $this -> create_connection();  //Create Mysql connection
        $sql = "DELETE FROM words WHERE lists='$list'";
        $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);  //Run SQL query
        $sql = "DELETE FROM list_index WHERE list_name='$list'";
        $this -> execute_sql($link, $this->_config['mysql_project_database'], $sql);  //Run SQL query

    }

    /**
     * Cut a string into an array with a space as the key
     *
     * @param $str
     * @return array
     */
   protected function makeArray($str)
    {
        $arr = explode("&", $str);  //Cut
        $arr = array_filter($arr);  // Delete void
        foreach($arr as $value)  //Format
        {
            $newArr[] = $value;
        }
        return $newArr; //return array
    }

    /**
     * Merge spaces in string and trim
     *
     * @param $str
     * @return null|string|string[]
     */
    protected function trim_merge_spaces($str)
    {
        $str = trim($str);
        $str = preg_replace("/\s(?=\s)/","\\1",$str);
        return $str;
    }

    /**
     * Create Mysql connection
     *
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
        or die("Failed to open Database" . mysqli_error($link));

        $result = mysqli_query($link, $sql);

        return $result;
    }

}
