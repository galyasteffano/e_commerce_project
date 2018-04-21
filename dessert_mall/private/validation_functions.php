<?php

  function is_blank($input){
    return !isset($input)|| trim($input)==='';
  }

  function size_is_exeeded($input,$allowed_sz){
    $sz=strlen($input);
    if($sz>$allowed_sz)
      return true;
  }

  function is_valid_email($email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)==true){
      return true;
    }
    return false;
  }
  // function validate_email($email){
  //   $rule='/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
  //   return preg_match($email,$rule)===1; #it doesn't work
  // }
  function is_valid_name($name){
    return ctype_alpha($name);
  }
// checks if the password has 1+ upper case and 1+ number
  function is_valid_password($password){
       if(has_upper_case($password)){
         $arr=str_split($password);
          $len=count($arr);
          for ($i=0;$i<$len;$i++){
            if(is_numeric($arr[$i])){
              return true;
              break;
           }
         }
        }
    return false;
  }
// checks for a number in a string. Can be done better.
  function has_upper_case($str){
    $arr=str_split($str);
    $len=count($arr);
    for ($i=0;$i<$len;$i++){
      if(ctype_upper($arr[$i])){
        return true;
        break;
     }
   }
     return false;
 }
 function has_valid_size($password){
   $limit=7;
   if(strlen($password)<$limit){
     return false;
   }
   return true;
 }
 #function from w3schools
 function clean_input($input){
   $input=trim($input);
   $input=htmlspecialchars($input);
   $input= stripslashes($input);
   $input=strip_tags($input);
   return $input;
 }
 function is_maxed($comment){
   if(strlen($comment)>250){
     $over_limit=strlen($comment)-250;
     $trim_comment=substr($comment,0,-$over_limit);
     $comment= $trim_comment;
   }
   return $comment;
 }
 function valid_first_name(){
   global $user;
   global $errors;
   if(is_blank($user['first_name'])){
     $errors['first_name']="Please enter your first name.";
   }
   elseif(size_is_exeeded($user['first_name'],50) || ctype_digit($user['first_name'])){
     $errors['first_name']="Please enter valid input.";
   }
 }
 function valid_last_name(){
   global $user;
   global $errors;
   if(is_blank($user['last_name'])){
     $errors['last_name']="Please enter your last name.";
   }
   elseif(size_is_exeeded($user['last_name'],70) || ctype_digit($user['last_name'])){
     $errors['last_name']="Please enter valid input.";
   }
 }
 function valid_email(){
   global $user;
   global $errors;
   if(is_blank($user['username'])){
     $errors['email']="Please enter your email.";
   }
   elseif(!is_valid_email($user['username']) || size_is_exeeded($user['username'],80)){
     $errors['email']="Please enter a valid email.";
   }
   if(is_blank($user['confirm_email'])){
     $errors['e_repeat']="Please enter your email.";
   }

   elseif(strcmp($user['username'], $user['confirm_email'])!==0){
     $errors['e_repeat']="Email addresses must match.";
   }
 }
 function validate_password(){
   global $user;
   global $errors;
   if(is_blank($user['password'])){
     $errors['password']="Please enter a password.";
   }
   elseif(!has_valid_size($user['password'])){
     $errors="Password must be at least 7 characters long.";
   }
   elseif(size_is_exeeded($user['password'],255)){
     $errors['password']="Password cannot be more than 20 characters long.";
   }
   elseif(!is_valid_password($user['password'])){
     $errors['password']="Password must have at least 1 upper case letter and 1 number.";
   }
   elseif(strcmp($user['password'], $user['confirm_pass'])!==0){
     $errors['confirm_pass']="Your passwords do not match.";
   }
 }

 function errors(){
   global $errors;
   $flag=true;
   if(empty($errors['first_name'])&& empty($errors['last_name'])&& empty($errors['email'])&&
    empty($errors['e_repeat'])&& empty($errors['password'])&& empty($errors['confirm_pass'])){
     $flag=false;
   }
   return $flag;
 }
?>
