<form method="post">
	<table>
        <tr>
        	<td>Please enter your username</td>
            <td><input type="text" name="username" placeholder="Username"></td>
        </tr>
        <tr>
        	<td>Please enter your Password</td>
            <td><input type="password" name="password" placeholder="Please enter your password"></td>
        </tr>
        <tr>
        	<td></td>
            <td><input type="submit" name="login" value="Login"></td>
        </tr>
    </table>
</form>

<?php
if(isset($_POST['login'])){
	
	$url = "http://localhost:8080/recipe/rest/api/auth/login";
	
	$fields = array(
		'username' => urlencode($_POST['username']),
		'password' => urlencode($_POST['password'])
	);
		
	$fields_string="";
	foreach($fields as $key=>$value){
		$fields_string .= $key.'='.$value.'&';
	}
	$fields_string=rtrim($fields_string, '&');
	
	
	
	
	$ch = curl_init();
	
	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	//curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
	
	//execute post
	curl_exec($ch);
	
	
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	//close connection
	curl_close($ch);
}
if($httpcode==200){
	echo "<h1>Login Successfull</h1>";
}
?>	