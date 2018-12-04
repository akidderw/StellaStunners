<?php
$cart_size = 0;
$problem_id = 'runescaping';
$cookie_name = "problems";
setcookie("problems[1]", "problem1:1",time() - 2592000, "/");
setcookie("problems[2]", "problem2:2",time() - 2592000, "/");
setcookie("problems[3]", "problem3:3",time() - 2592000, "/");
/*
//set cookie
$cookie_name = "user";
if(isset($_COOKIE[$cookie_name])){
	//setcookie($cookie_name,"Problem1:1,Problem2:2",time()+2592000,"/");
}else{
	setcookie($cookie_name,"Problem1:1,Problem2:2",time()+2592000,"/");
} 
if(isset($_GET['prob'])&&isset($_GET['probtitle'])){
	
	if(isset($_COOKIE[$cookie_name])){
		setcookie($cookie_name,$_COOKIE[$cookie_name].",".$_GET["probtitle"].":".$_GET["prob"],time()+2592000,"/");
		$_COOKIE[$cookie_name]=$_COOKIE[$cookie_name].",".$_GET["probtitle"].":".$_GET["prob"];
	}else{
		setcookie($cookie_name,$_GET["probtitle"].":".$_GET["prob"],time()+2592000,"/");
		$_COOKIE[$cookie_name]=$_GET["probtitle"].":".$_GET["prob"];
	} 

}
if(isset($_GET['del'])){
	if($_GET['del']==0){
		$_COOKIE[$cookie_name]="";
		setcookie($cookie_name,"end",time()-100000,"/");
	}else{

	if(isset($_COOKIE[$cookie_name])){
		$out = "";
		$arr=explode(",",$_COOKIE[$cookie_name]);
		foreach($arr as $i){
			$temp = explode(":",$i);
			//if input = number
			//echo "<br>" . $_GET['del']. " " .$temp[1] . "<br>";
			if($_GET['del']==$temp[1]){
				//do nothing
				//echo "found<br>";
			}else{
				if($out==""){
					$out=$temp[0] . ":" . $temp[1];//first element doesnt get a preceeding comma
					//echo $out;
				}else{
					$out=$out . "," . $temp[0] . ":" . $temp[1];
					//echo $out;
				}
			}
		}
		$_COOKIE[$cookie_name]=$out;
		setcookie($cookie_name,$out,time()+2592000,"/");
		//echo "ran";
	}else{
		//no cookie, do nothing. maybe display an error
	}
	}
}else{

//echo "no run";

}
*/
?>
