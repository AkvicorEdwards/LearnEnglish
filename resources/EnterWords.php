<?php
/**
 * Created by PhpStorm.
 * User: AkvicorEdwards
 * Date: 2018/10/13
 * Time: 19:29
 */

class EnterWords
{
    // Define the application version
    const VERSION = '1.1';

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

    public function enterWords($list,$content){
        $tag = $this->makeArray($content);
        $tagCount = count($tag);//Array
        $link = $this->create_connection();
        for($i=0;$i<$tagCount;$i=$i+2){
            $word = $tag[$i];
            $translate = $tag[$i+1];
            $sql = "insert into english( list, word, translate) values ('$list', '$word','$translate')";
            $result = $this->execute_sql($link, $this->_config['mysql_project_database'], $sql);
        }
        if(!$result){
            return false;//Enter failure
        }else{
            return true;//Enter success
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
        or die("Failed to open Database" . mysqli_error($link));

        $result = mysqli_query($link, $sql);

        return $result;
    }
}
