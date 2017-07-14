<?php
////////////////////////////////////////////////////////////////////////////////////////
// Class: DbConnector
// Purpose: Connect to a database, MySQL version
///////////////////////////////////////////////////////////////////////////////////////
//$incdir='/home/sites/cashcab/dev/include/';
//ini_set('include_path', '.:' . $incdir . ':/usr/share/pear:/usr/lib/php');

/* save our errors to a special log */
ini_set('error_log', '/mnt/tmp/paternitycourt.Errors.log');

class SystemComponent {
  var $settings;
  function getSettings() {
    // Database variables
    //$settings['dbhost'] = 'mgmhddatabase.cc9mrfactrwl.us-east-1.rds.amazonaws.com';
    $settings['dbhost'] = 'new-mgmhd-db.cc9mrfactrwl.us-east-1.rds.amazonaws.com';
    $settings['dbusername'] = 'paternitycourt';
    $settings['dbpassword'] = 'DfnT2GXfK2KMscVC';
    $settings['dbname'] = 'paternitycourt';

    return $settings;
  }
}

class DbConnector extends SystemComponent {

var $theQuery;
var $link;

function DbConnector(){
  // Load settings from parent class
  $settings = SystemComponent::getSettings();

  // Get the main settings from the array we just loaded
  $host = $settings['dbhost'];
  $db = $settings['dbname'];
  $user = $settings['dbusername'];
  $pass = $settings['dbpassword'];

  // Connect to the database
  $this->link = mysql_connect($host, $user, $pass);
  mysql_select_db($db);
  register_shutdown_function(array(&$this, 'close'));
}

//*** Function: query, Purpose: Execute a database query ***
function query($query) {
  $this->theQuery = $query;
  return mysql_query($query, $this->link);
}

//*** Function: getQuery, Purpose: Returns the last database query, for debugging ***
function getQuery() {
  return $this->theQuery;
}

//*** Function: getNumRows, Purpose: Return row count, MySQL version ***
function getNumRows($result){
  return mysql_num_rows($result);
}

//*** Function: fetchArray, Purpose: Get array of query results ***
function fetchArray($result) {
  return mysql_fetch_array($result);
}

//*** Function: close, Purpose: Close the connection ***
function close() {
  mysql_close($this->link);
}


}

//Need this on all the pages:
function GetField($input) {
    $input=strip_tags($input);
    $input=str_replace("<","<",$input);
    $input=str_replace(">",">",$input);
    $input=str_replace("#","%23",$input);
//    $input=str_replace("'","''",$input);
    $input=str_replace(";","%3B",$input);
    $input=str_replace("script","",$input);
    $input=str_replace("%3c","",$input);
    $input=str_replace("%3e","",$input);
    $input=str_replace("null","",$input);
    $input=str_replace("NULL","",$input);
    $input=str_replace("SELECT","",$input);
    $input=str_replace("select","",$input);
    $input=str_replace("%","",$input);
    $input=str_replace("DELETE","",$input);
    $input=str_replace("delete","",$input);
    $input=str_replace("UPDATE","",$input);
    $input=str_replace("update","",$input);
    $input=str_replace("DROP","",$input);
    $input=trim($input);
    return $input;
}


function getFileSizeW($filePath){
  $blah = getimagesize($filePath);
  $type = $blah['mime'];
  $width = $blah[0];
  return $width;
}

function getFileSizeH($filePath){
  $blah = getimagesize($filePath);
  $type = $blah['mime'];
  $height = $blah[1];
  return $height;
}

function titleCase($string)     {
   return ucwords(strtolower($string));
}
$us_states = array ("AL" => "Alabama",
          "AK" => "Alaska",
          "AZ" => "Arizona",
          "AR" => "Arkansas",
          "CA" => "California",
          "CO" => "Colorado",
          "CT" => "Connecticut",
          "DE" => "Delaware",
          "DC" => "District of Columbia",
          "FL" => "Florida",
          "GA" => "Georgia",
          "HI" => "Hawaii",
          "ID" => "Idaho",
          "IL" => "Illinois",
          "IN" => "Indiana",
          "IA" => "Iowa",
          "KS" => "Kansas",
          "KY" => "Kentucky",
          "LA" => "Louisiana",
          "ME" => "Maine",
          "MD" => "Maryland",
          "MA" => "Massachusetts",
          "MI" => "Michigan",
          "MN" => "Minnesota",
          "MS" => "Mississippi",
          "MO" => "Missouri",
          "MT" => "Montana",
          "NE" => "Nebraska",
          "NV" => "Nevada",
          "NH" => "New Hampshire",
          "NJ" => "New Jersey",
          "NM" => "New Mexico",
          "NY" => "New York",
          "NC" => "North Carolina",
          "ND" => "North Dakota",
          "OH" => "Ohio",
          "OK" => "Oklahoma",
          "OR" => "Oregon",
          "PA" => "Pennsylvania",
          "RI" => "Rhode Island",
          "SC" => "South Carolina",
          "SD" => "South Dakota",
          "TN" => "Tennessee",
          "TX" => "Texas",
          "UT" => "Utah",
          "VT" => "Vermont",
          "VA" => "Virginia",
          "WA" => "Washington",
          "WV" => "West Virginia",
          "WI" => "Wisconsin",
          "WY" => "Wyoming"
);

$themonths=array(
	"01"=>"January",
	"02"=>"February",
        "03"=>"March",
        "04"=>"April",
        "05"=>"May",
        "06"=>"June",
        "07"=>"July",
        "08"=>"August",
        "09"=>"September",
        "10"=>"October",
        "11"=>"November",
        "12"=>"December"
);

    function thelog($msg) {
    //    if (1 == 1) {
 //           $s = (isset($_SESSION['sid'])) ? $_SESSION['sid'] : '';
 //           $l = (isset($_SESSION['lastName'])) ? $_SESSION['lastName'] : '';
 //           error_log("\nPROCESSING: $s: $l: $msg", 0);
            error_log("\nPROCESSING: $msg", 0);
    //    }
    }

