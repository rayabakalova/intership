<?php

require_once 'dbconfig/database.php';

$myDatabase = new MyDatabase;

$con=mysqli_connect ("localhost", "root", "parola123") or die ('I cannot connect to the database because: ' . mysql_error());
mysqli_select_db ($con,'intership');

			function userExists($username) {
				$myDatabase = new MyDatabase;
				$query = $myDatabase->query("SELECT `id` FROM `users` WHERE `username`='".$username."' LIMIT 1");
				if(count($query) > 0) {
					return false;
				} else {
					return true;
				}
			}


			
			function userID() {
				$myDatabase = new MyDatabase;
				$query = $myDatabase->query("SELECT `id` FROM `users` WHERE `username`='".$_SESSION['username']."' LIMIT 1");
				if($query) {
					$userID = $query[0]['id'];
					return $userID;
				}
			}

			function userRole() {
				$myDatabase = new MyDatabase;
				$query = $myDatabase->query("SELECT `role` FROM `users` WHERE `username`='".$_SESSION['username']."' LIMIT 1");
				if($query) {
					$userRole = $query[0]['role'];
					return $userRole;
				}
			}
										
			function userInsertData($table, $data) {
											$myDatabase = new MyDatabase;
											$query_info = $myDatabase->query("INSERT INTO `".$table."` (`name`, `email`, `phone`, `course`, `fac_num`,  `faculty_id`, `faculty_spec`, `user_id`) VALUES ('".$data['name']."', '".$data['email']."', '".$data['phone']."', '".$data['course']."', '".$data['fac_num']."',  '".$data['fac']."', '".$data['spec']."', '".userID()."');");
											return true;
			}

			function insertCustomFirm($table, $data){
											$myDatabase = new MyDatabase();
											$query_insert = $myDatabase->query("INSERT INTO `".$table."` (`name`, `user_id`, `private`, `firm_mentor`, `uni_mentor`) VALUES('".$data['fname']."', '".userID()."', '1', '".$data['firmm']."', '".$data['unim']."');");
											return true;
			}

			function customFirmID($data) {
											$myDatabase = new MyDatabase;
											$query = $myDatabase->query("SELECT `id` FROM `business` WHERE `user_id`='".userID()."' LIMIT 1");
											if($query) {
												$customFirmID = $query[0]['id'];
												return $customFirmID;
											}
			}
			function updateCustomFirm($table, $data){
											$myDatabase = new MyDatabase();
											$query_user = $myDatabase->query("UPDATE `".$table."` SET `bussines_id`='".customFirmID($data)."' WHERE `user_id`='".userID()."'");
											$query_pos = $myDatabase->query("INSERT INTO `faculty_pos` (`name`, `firm_id`) VALUES ('".$data['customPos']."', '".customFirmID($data)."')");
											return true;
			}


			function insertFirm($table, $data){
											$myDatabase = new MyDatabase();
											$query_user = $myDatabase->query("UPDATE `".$table."` SET `bussines_id`='".$data['firm']."' WHERE `user_id` =' ".userID()."' ");
											$query_con = $myDatabase->query("INSERT INTO `pos_firm` (`firm_id`, `pos_id`) VALUES ('".$data['firm']."', '".$data['pos']."')");
											return true;
			}

			
			function userListData() {
											$myDatabase = new MyDatabase;
											$query_info = $myDatabase->query("SELECT * FROM `users_data` WHERE `user_id`='".userID()."'");

								              	return $query_info;
								              
											
			}

			//print_r(userListData());

			function loginAuth($username, $password) {
				if(empty($username) || empty($password)) {
					return false;
				}

				$myDB = new MyDatabase;
				$query = $myDB->query("SELECT `id` FROM `users` WHERE `username`='".$username."' AND `password`='".md5($password)."'");
				print_r($query);
				if($query) {
					$_SESSION['id'] = $query[0]['id'];
					$_SESSION['username'] = $username;
					$_SESSION['password'] = md5($password);
					return true;
				}

				return false;
			}

			function logoutAuth() {
				$_SESSION['id'] = false;
				$_SESSION['username'] = false;
				$_SESSION['password'] = false;
				unset($_SESSION['id']);
				unset($_SESSION['username']);
				unset($_SESSION['password']);
				return true;
			}

			function session() {
				if(!isset($_SESSION['id']) && !isset($_SESSION['username']) && !isset($_SESSION['password'])) {
					header('Location: index.php');
				}
			}

			function session_admin() {
				if(isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['password'])) {
					if(userRole() != 1) {
						header('Location: index.php');
					}
				}
			}


			function facListData() {
				$myDatabase = new MyDatabase;
				$query = $myDatabase->query("SELECT * FROM `faculty` ORDER BY `id` ASC");
				return $query;
			}

			function specListData() {
				$myDatabase = new MyDatabase;
				$query = $myDatabase->query("SELECT * FROM `faculty_spec` ORDER BY `id` ASC");
				return $query;
			}

			function firmListData() {
				$myDatabase = new MyDatabase;
				$query = $myDatabase->query("SELECT * FROM `business` WHERE `private` != 1 ORDER BY `id` ASC");
				return $query;
			}

			function newUser($username, $password) {
				$database = new MyDatabase;
				$query = $database->query("INSERT INTO `users` VALUES ('', '".strip_tags($username)."', '".md5($password)."', '0');");
				return $query;
			}

			function confirmUser($username, $password) {
				$database = new MyDatabase;
				$query = $database->query("SELECT `id` FROM `users` WHERE `username`='".strip_tags($username)."' AND `password`='".md5($password)."';");
				if($query) {
					$_SESSION['id'] = $query[0]['id'];
					$_SESSION['username'] = strip_tags($username);
					$_SESSION['password'] = md5($password);
					return true;
				}
				return false;
			}
			
			function getUserRole($username, $password) {
				$database = new MyDatabase;
				$query = $database->query("SELECT `role` FROM `users` WHERE `username`='".strip_tags($username)."' AND `password`='".md5($password)."';");
				return $query[0]['role'];
			}

			function newAdmin($username, $password) {
				$database = new MyDatabase;
				$query = $database->query("INSERT INTO `users` VALUES ('', '".strip_tags($username)."', '".md5($password)."', '1');");

				return $query;
			}

			function addFirm($table, $data) {
				$myDatabase = new MyDatabase;
				$fak = implode(', ', $data['fac']);
				$spec_string = implode(', ', $data['spec']);
				$query_info = $myDatabase->query("INSERT INTO `".$table."` (`name`, `description`, `faculty_id`, `spec_id`,`pos_id`) VALUES ('".$data['name']."', '".$data['description']."', '". $fak ."', '".$spec_string."', '".posID($data)."');");
				
				return true;
			}

			function deleteFirm($table, $data) {
				$myDatabase = new MyDatabase;
				$query_info = $myDatabase->query("DELETE FROM `business` WHERE `id`='".$data['firm']."'");
				return true;
			}

			function addPosition($table, $data) {
				$myDatabase = new MyDatabase;
				$query_info = $myDatabase->query("INSERT INTO `".$table."` (`name`, `faculty_id`, `firm_id`) VALUES ('".$data['position']."','".$data['fac']."', '".$data['name']."');");
				return true;
			}

			function firmID($data) {
				$myDatabase = new MyDatabase;
				$query = $myDatabase->query("SELECT `id` FROM `business` WHERE `name`='".$data['name']."' LIMIT 1");
				if($query) {
					$firmID = $query[0]['id'];
					return $firmID;
				}
			}

			function posID($data) {
				$myDatabase = new MyDatabase;
				$query = $myDatabase->query("SELECT `id` FROM `faculty_pos` WHERE `name`='".$data['position']."' LIMIT 1");
				if($query) {
					$posID = $query[0]['id'];
					return $posID;
				}
			}

			function firmPosition($table, $data) {
				$myDatabase = new MyDatabase;
				$query_info = $myDatabase->query("INSERT INTO `".$table."` (`pos_id`, `firm_id`) VALUES ('".firmID($data)."', '".posID($data)."');");
				return true;
			}

			function getUserFac() {
				$myDatabase = new MyDatabase;
				$query = $myDatabase->query("SELECT `faculty_id` FROM `users_data` WHERE `user_id`='".userID()."' LIMIT 1");
				if($query) {
					$getUserFac = $query[0]['faculty_id'];
					return $getUserFac;
				}
			}

			function selectUserFac() {
				$myDatabase = new MyDatabase;
				$view_fac = $myDatabase->query("SELECT `name` from `faculty` WHERE `id` = '".getUserFac()."'");
				return $view_fac;
			}

			function getUserSpec() {
				$myDatabase = new MyDatabase;
				$query = $myDatabase->query("SELECT `faculty_spec` FROM `users_data` WHERE `user_id`='".userID()."' LIMIT 1");
				if($query) {
					$getUserSpec = $query[0]['faculty_spec'];
					return $getUserSpec;
				}

			}

			function selectUserSpec() {
				$myDatabase = new MyDatabase;
				$view_spec = $myDatabase->query("SELECT `name` from `faculty_spec` WHERE `id` = '".getUserSpec()."'");
				return $view_spec;
			}


			function facStudentListData() {
				$myDatabase = new MyDatabase;
				$query = $myDatabase->query("SELECT * FROM `business` WHERE `faculty_id`='".getUserFac()."' OR `spec_id`='".getUserSpec()."'");
				return $query;
			}


			function firmPosListData($data) {
				$myDatabase = new MyDatabase;
				$query = $myDatabase->query("SELECT * FROM `pos_firm` WHERE `firm_id`='".$data['firm']."'");
				return $query;
			}

			function selectFirmPosition($data) {
				$myDatabase = new MyDatabase;
				$query = $myDatabase->query("SELECT `name` FROM `faculty_pos` WHERE `firm_id`='1'");
				return $query;
			}



			function insertDate($table, $data) {
				$myDatabase = new MyDatabase;
				$query_date=$myDatabase->query("UPDATE `".$table."` SET `from`='".$data['from']."', `to`='".$data['to']."' WHERE `user_id`='".userID()."'");
				return true;
			}

			function addComment($table, $data) {
				$myDatabase = new MyDatabase;
				$query_comm = $myDatabase->query("INSERT INTO `".$table."` (`comment`, `date_time`, `firm_id`, `user_id`) VALUES ('".$data['comment']."', CURRENT_TIMESTAMP(), '".$data['firm']."', '".userID()."')");
				return true;
			}

			function showComment($table, $data) {
				$myDatabase = new MyDatabase;
				$query_show_comm = $myDatabase->query("SELECT * FROM `".$table."` WHERE `firm_id` ='".$data['firm']."' LIMIT 1");
				return $query_show_comm;
			}
#######################################################################################################
			function getUserUsername() {
				$myDatabase = new MyDatabase;
				$query = $myDatabase->query("SELECT `user_id` FROM `comments`  WHERE `firm_id` ='".$data['firm']."' LIMIT 1");
				if($query) {
					$getUsername = $query[0]['user_id'];
					return $getUsername;
				}
			}

			function username() {
				$myDatabase = new MyDatabase;
				$view_fac = $myDatabase->query("SELECT `username` from `users_data` WHERE `id` = '".getUserFac()."'");
				return $view_fac;
			}
#######################################################################################################
			function addInterDesc($data) {
				$myDatabase = new MyDatabase;
				$query_desc = $myDatabase->query("INSERT INTO `intern_desc` (`first_week`, `second_week`, `user_id`) VALUES ('".$data['first']."', '".$data['second']."', '".userID()."')");
				return true;
			}
			
			function report() {
				$myDatabase = new MyDatabase;
				$query_report = $myDatabase->query("SELECT `first_week`, `second_week` FROM `intern_desc` WHERE user_id='".userID()."'");
				return $query_report;
			}

			function reportMentor() {
				$myDatabase = new MyDatabase;
				$query_report = $myDatabase->query("SELECT `name`, `firm_mentor`, `uni_mentor` FROM `business` WHERE user_id='".userID()."'");
				return $query_report;
			}
			
?>



