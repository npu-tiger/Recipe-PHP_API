<form method="post">
	<table>
        <tr>
        	<td>Enter title of recipe</td>
            <td><input type="text" name="title" placeholder="Please enter title of recipe"></td>
        </tr>
        <tr>
        	<td>Enter short description</td>
            <td><input type="text" name="description" placeholder="Please enter description of recipe"></td>
        </tr>
        <tr>
        	<td>Set difficulty level</td>
            <td>
                <select name="difficulty">
                	<option>---Select one---</option>
                	<option value="Easy">Easy</option>
                    <option value="Medium">Medium</option>
                    <option value="Hard">Hard</option>
                </select>
            </td>
        </tr>
        <tr>
        	<td>Enter serving amount</td>
            <td><input type="text" name="servingAmount" placeholder="Please enter total number of serving"></td>
        </tr>
        <tr>
        	<td>Select cooking time</td>
            <td>
            	<select name="cookingTime">
                	<option>---Select one---</option>
                    <?php
						for($i=10;$i<180;$i+=5){
					?>
                    		<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php
						}
					?>
                	
                </select>
        </tr>
        <tr>
        	<td>Enter all ingredient</td>
            <td><input type="text" name="ingredient" placeholder="Please enter all ingredient seperated by ','"></td>
        </tr>
        <tr>
        	<td>Enter directions</td>
            <td><textarea cols="30" rows="15" name="direction" placeholder="Please enter direction to cook"></textarea></td>
        </tr>
        <tr>
        	<td>Enter nutrition fact</td>
            <td><input type="text" name="nutritionFact" placeholder="Please enter nutrition facts"></td>
        </tr>
        <tr>
        	<td>Image URL</td>
            <td><input type="text" name="imageUrl" placeholder="Image URL to be change to upload button"></td>
        </tr>
        <tr>
        	<td>Enter your user ID</td>
            <td><input type="text" name="userId" placeholder="Please enter your user ID"></td>
        </tr>
        <tr>
        	<td>Enter type of recipe</td>
            <td><input type="text" name="category" placeholder="Please enter type of recipe"></td>
        </tr>
        <tr>
        	<td></td>
            <td><input type="submit" name="createRecipe" value="Add"></td>
        </tr>
        
    </table>
</form>

<?php
if(isset($_POST['createRecipe'])){
	//extract data from the post
	//extract($_POST);
	
	//API URL
	$url = "http://localhost:8080/recipe/rest/api/recipes";
	
	//set POST variables
	$fields = array(
		'id' => urldecode("null"),
		'title' => urldecode($_POST['title']),
		'description' => urldecode($_POST['description']),
		'difficulty' => urldecode($_POST['difficulty']),
		'servingAmount' => urldecode($_POST['servingAmount']),
		'cookingTime' => urldecode($_POST['cookingTime']),
		'ingredient' => urldecode($_POST['ingredient']),
		'direction' => urldecode($_POST['direction']),
		'nutritionFact' => urldecode($_POST['nutritionFact']),
		'imageUrl' => $_POST['imageUrl'],
		'userId' => urlencode($_POST['userId']),
		'category' => urlencode($_POST['category'])
	);
	echo "<pre>";
	print_r($fields);
	

	/*$fields = array(
		'id' => urlencode("null"),
		'username' => urlencode("dummy123"),
		'password' => urlencode("password12345"),
		'email' => urlencode("dummy123@recipe.com"),
		'nickname' => urlencode("fun")
	);*/
	
	$fields_string="";
	//url-ify the data for the POST
	foreach($fields as $key=>$value){
		$fields_string .= $key.'='.$value.'&';
	}
	
	//Remove last '&' from url-ify
	$fields_string=rtrim($fields_string, '&');
	
	//echo json_encode($fields_string)."<br>";
	
	$header=array();            
	$header[]="Accept: application/json";
	$header[]="Accept-Encoding: gzip, deflate";
	$header[]="Accept-Language: en-US,en;q=0.5";
	$header[]="Connection: keep-alive";
	$header[]="Content-Type: application/json";
	
	//open connection
	$ch = curl_init();
	
	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields));
	
	//execute post
	$result = curl_exec($ch);
	
	
	$f = fopen('requestLogs.txt', 'w');
	curl_setopt($ch,CURLOPT_VERBOSE,true);
	curl_setopt($ch,CURLOPT_STDERR ,$f);
	
	
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);


	echo "<br>http code ".$httpcode;
	//close connection
	curl_close($ch);
}
?>	