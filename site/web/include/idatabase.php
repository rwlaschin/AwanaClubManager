<?php

include "dbconfig.php";

// {"cb":"1375678736135",
/* "formData":"{\\\"Guardian1_Guardian\\\":\\\"Father\\\",
			    \\\"Guardian1_FirstName\\\":\\\"Robert\\\",
			    \\\"Guardian1_LastName\\\":\\\"Wlaschin\\\",
			    \\\"Guardian1_HomePhone\\\":\\\"408.621.0106\\\",
			    \\\"Guardian1_Email\\\":\\\"raw77_m@yahoo.com\\\",
			    \\\"Guardian1_Voluenteer\\\":\\\"yes\\\",
			    \\\"Address1_Street\\\":\\\"\\\",
			    \\\"Address1_City\\\":\\\"\\\",
			    \\\"Address1_State\\\":\\\"\\\",
			    \\\"Address1_Zipcode\\\":\\\"\\\",
			    \\\"Address2_Street\\\":\\\"\\\",
			    \\\"Address2_City\\\":\\\"\\\",
			    \\\"Address2_State\\\":\\\"\\\",
			    \\\"Address2_Zipcode\\\":\\\"\\\",
			    \\\"Address3_HomeChurchName\\\":\\\"\\\",
			    \\\"Address3_HomeChurchCity\\\":\\\"\\\",
			    \\\"EmergencyContact1_FirstName\\\":\\\"\\\",
			    \\\"EmergencyContact1_LastName\\\":\\\"\\\",
			    \\\"EmergencyContact1_Relationship\\\":\\\"\\\",
			    \\\"EmergencyContact1_HomePhone\\\":\\\"\\\",
			    \\\"EmergencyContact1_CellPhone\\\":\\\"\\\"}",
*/



/*
1 2013-08-05 05:12:35 address {"street":"/.+/","city":"/\w+/","state":"/\w+/","zip":"/\d+(-\d+)?/"}
2 2013-08-05 05:12:57 phone {"phone":"/\d{3}.\d{3}.\d{4}/"}
3 2013-08-05 05:27:45 club {"club":"/Nursery|Cubbies|Sparkies|T&T|Journey/"}
4 2013-08-05 05:27:45 books {"book":"/AppleSeed|HoneyComb|Flight 3:16|HangGlider|WingRunner|SkyStormer|Ultimate Adventure 1|Ultimate Adventure 2|Ultimate Challenge 1|Ultimate Challenge 2/"}
5 2013-08-05 05:27:45 staff {"staff":"/Pastor|Commander|Director|Leader|Security|Store|Secretary/"}
6 2013-08-05 05:27:45 siblings {"sibling":"/brother|sister/"}
7 2013-08-05 05:43:56 children {"child":"/son|daughter/"}
8 2013-08-05 05:27:45 guardians {"guardian":"/father|mother|friend|aunt|uncle|grandpa|grandma/"}
9 2013-08-05 05:27:45 shares {"share":"/\d+/"}
10 2013-08-05 05:27:45 awards {"award":"/[\w\s]+/"}
11 2013-08-05 05:27:45 sections {"section":"/%d|silver|gold/"}
12 2013-08-05 05:27:45 chapters {"chapter":"/%d/"}
13 2013-08-05 05:27:45 teams {"team":"/Red|Green|Blue|Yellow/"}
14 2013-08-05 05:27:45 gender {"gender":"/male|female/"}
15 2013-08-05 05:27:45 email {"email":"/[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/"}
16 2013-08-05 10:21:42 cellphone {"cellphone":"/\d{3}.\d{3}.\d{4}/"}
*/

class CDatabase {
	
	private static $queries = array (
		'InsertPersonnel' => "INSERT INTO \`Personnel\` (first_name,last_name) VALUES (?,?)",
		'InsertAddress' => "INSERT INTO \`AssociationInformation\` (association_type,data) VALUES ('1',?)",
		'InsertPhone' => "INSERT INTO \`AssociationInformation\` (association_type,data) VALUES ('1',?)",
		'InsertCell' => "INSERT INTO \`AssociationInformation\` (association_type,data) VALUES ('16',?)",
	);

	private	static $host = dbconfig::$host;
	private	static $database = dbconfig::$database;
	private	$username = dbconfig::$username;
	private	$password = dbconfig::$password;
	private	$connection = null;

	public function __construct() {
			$this->connection = new PDO("mssql:host={self::$host};dbname={self::$database}", 
							$this->username,
							$this->password);
		}

};

$dbconn = new CDatabase();

function addPersonnel() {
	// create a new entry in the Personnel
	// get the id for the new entry
	

	// Add the appropriate information to the Association table
	//  Address
	//  phone/cell
	//  staff ... position

}


?>