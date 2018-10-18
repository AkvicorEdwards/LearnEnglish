<?php
/**
 * Created by PhpStorm.
 * User: AkvicorEdwards
 * Date: 2018/7/3
 * Time: 13:51
 */

/**
 * Class FunctionLib
 *
 * public __construct()
 *
 * protected _getAppUrl()   return
 * public getThemePath($absolute = false)   return
 * protected _getRelativePath($fromPath, $toPath)   return
 * protected _getWebUrl()
 * public create_connection()   return
 * public execute_sql($link, $database, $sql)   return
 * public checkLogin()
 * public function makeArray($str)  return
 * public function checkPermit($permit,$allow)  return
 *
 */

class FunctionLib
{
    // Define the application version
    const VERSION = '6.1';

    // Reserve some variables
    protected $_appDir = null;
    protected $_appURL = null;
    protected $_config = null;
    protected $_themeName = null;
    protected $_webURL = null;


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

        //Set theme name
        $this->_themeName = $this->_config['theme_name'];

        //Set webURL
        $this -> _getWebUrl();
    }

    /**
     * @return mixed|null
     */
    public function getConfig()
    {
        return $this->_config;
    }

    public function getWebURL()
    {
        return $this->_webURL;
    }

    /**
     * Get application url
     * @return string
     */
    protected function _getAppUrl()
    {
        // Get the server protocol
        if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
            $protocol = 'https://';
        } else {
            $protocol = 'http://';
        }

        // Get the server hostname
        $host = $_SERVER['HTTP_HOST'];

        // Get the URL path
        $pathParts = pathinfo($_SERVER['PHP_SELF']);
        $path      = $pathParts['dirname'];

        // Remove backslash from path (Windows fix)
        if (substr($path, -1) == '\\') {
            $path = substr($path, 0, -1);
        }

        // Ensure the path ends with a forward slash
        if (substr($path, -1) != '/') {
            $path = $path . '/';
        }

        // Build the application URL
        $appUrl = $protocol . $host . $path;

        // Return the URL
        return $appUrl;
    }

    /**
     * Returns the path to the chosen theme directory
     *
     * @param bool $absolute
     * @return string
     */
    public function getThemePath($absolute = false)
    {
        if ($absolute) {
            // Set the theme path
            $themePath = $this->_appDir . '/themes/' . $this->_themeName;
        } else {
            // Get relative path to application dir
            $realtivePath = $this->_getRelativePath(getcwd(), $this->_appDir);

            // Set the theme path
            $themePath = $realtivePath . '/themes/' . $this->_themeName;
        }

        return $themePath;
    }

    /**
     * Compares two paths and returns the relative path from one to the other
     *
     * @param string $fromPath Starting path
     * @param string $toPath Ending path
     * @return string $relativePath Relative path from $fromPath to $toPath
     * @access protected
     */
    protected function _getRelativePath($fromPath, $toPath)
    {

        // Define the OS specific directory separator
        if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

        // Remove double slashes from path strings
        $fromPath = str_replace(DS . DS, DS, $fromPath);
        $toPath = str_replace(DS . DS, DS, $toPath);

        // Explode working dir and cache dir into arrays
        $fromPathArray = explode(DS, $fromPath);
        $toPathArray = explode(DS, $toPath);

        // Remove last fromPath array element if it's empty
        $x = count($fromPathArray) - 1;

        if(!trim($fromPathArray[$x])) {
            array_pop($fromPathArray);
        }

        // Remove last toPath array element if it's empty
        $x = count($toPathArray) - 1;

        if(!trim($toPathArray[$x])) {
            array_pop($toPathArray);
        }

        // Get largest array count
        $arrayMax = max(count($fromPathArray), count($toPathArray));

        // Set some default variables
        $diffArray = array();
        $samePath = true;
        $key = 1;

        // Generate array of the path differences
        while ($key <= $arrayMax) {

            // Get to path variable
            $toPath = isset($toPathArray[$key]) ? $toPathArray[$key] : null;

            // Get from path variable
            $fromPath = isset($fromPathArray[$key]) ? $fromPathArray[$key] : null;

            if ($toPath !== $fromPath || $samePath !== true) {

                // Prepend '..' for every level up that must be traversed
                if (isset($fromPathArray[$key])) {
                    array_unshift($diffArray, '..');
                }

                // Append directory name for every directory that must be traversed
                if (isset($toPathArray[$key])) {
                    $diffArray[] = $toPathArray[$key];
                }

                // Directory paths have diverged
                $samePath = false;
            }

            // Increment key
            $key++;
        }

        // Set the relative thumbnail directory path
        $relativePath = implode('/', $diffArray);

        // Return the relative path
        return $relativePath;

    }

    /**
     * Get root dictionary
     */
    protected function _getWebUrl()
    {

        if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') //HTTP or HTTPS
        {
            $protocol = 'https://';
        } else {
            $protocol = 'http://';
        }
        $this -> _webURL = $protocol.$_SERVER['HTTP_HOST']."/";// Set Website root address
    }

    /**
     * Create mysql connection
     *
     * @return mysqli
     */
    public function create_connection()
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
    public function execute_sql($link, $database, $sql)
    {
        mysqli_select_db($link, $database)
        or die("Failed to open Database" . mysqli_error($link));

        $result = mysqli_query($link, $sql);

        return $result;
    }

    /**
     * Check login
     */
    public function checkLogin()
    {
        if($this->_config['check_login']==false)
            return true;
        session_start();
        $permit = $this->_config['permission'];//Required permissions
        $allow = $this->makeArray($_SESSION['permissions']);//Make user's permissions array

        $checkResult = $this->checkPermit($permit,$allow);//Check $permit in $allow ???
        if(!$checkResult){
            return false;
        }
        return true;
    }

    /**
     * Cut a string into an array with a space as the key
     *
     * @param $str
     * @return array
     */
    public function makeArray($str)
    {
        $arr = explode(" ", $str);  //Cut
        $arr = array_filter($arr);  // Delete void
        foreach($arr as $value)  //Format
        {
            $newArr[] = $value;
        }
        return $newArr;
    }

    /**
     * Check one in another
     *
     * @param $permit
     * @param $allow
     * @return bool
     */
    public function checkPermit($permit,$allow)
    {
        if(in_array($permit,$allow)){
            return true;
        }else{
            return false;
        }
    }

    public function checkPassword($user,$password){
        $link = $this -> create_connection();
        $sql = "SELECT * FROM users WHERE username = '$user'";
        $result = $this -> execute_sql($link, $this->_config['mysql_user_database'], $sql);
        $row = mysqli_fetch_object($result);
        $userPassword = $row->password;//Get password from database

        if (password_verify($password , $userPassword))
        {
            //Set session
            session_start();
            $_SESSION['id'] = $row->id;
//            $_SESSION['name'] = $row->name;
            $_SESSION['userName'] = $row->username;
            $_SESSION['password'] = $row->password;
//            $_SESSION['birthday'] = $row->birthday;
            $_SESSION['permissions'] = $row->permissions;
//            $_SESSION['userNickName'] = $row->userNickName;
//            $_SESSION['profilePicture'] = $row->profilePicture;
//            $_SESSION['NumberChangePassword'] = $row->NumberChangePassword;

            return true;

        } else {
            return false;
        }
    }

    public function registerUser($regCode,$user,$password,$permissions){
        if($regCode!=$this->_config['registration_code'])//Check registration code
            return 3;
        //Check if the user exist
        $link = $this -> create_connection();
        $sql = "SELECT * FROM users WHERE username = '$user'";
        $result = $this -> execute_sql($link, $this->_config['mysql_user_database'], $sql);
        if (mysqli_num_rows($result) == 0){//If it does not exist
            $password = password_hash($password, PASSWORD_BCRYPT);
            $sql = "insert into users(username, password, permissions) values ('$user', '$password','$permissions')";
            $result = $this -> execute_sql($link, $this->_config['mysql_user_database'], $sql);
            if(!$result){
                return 0;//Register failure
            }else{
                return 1;//Register success
            }
        }else{
            return 2;//User already exist
        }


    }

}