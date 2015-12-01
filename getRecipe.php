<table>
	<form method="get">
    	<tr>
        	<td>Enter Recipe ID#:</td>
            <td><input type="text" name="id" placeholder="Enter Recipe ID#"</td>
        </tr>
        <tr>
        	<td></td>
            <td><input type="submit" name="getRecipe" value="Get Details"></td>
        </tr>
	</form>
</table>
<?php
	if(isset($_GET['getRecipe']) && isset($_GET['id'])){
		if($_GET['getRecipe'] == "Get Details"){
			$id=$_GET['id'];
			
			$url="http://localhost:8080/recipe/rest/api/recipes/".$id."";
			//  Initiate curl
			$ch = curl_init();
			// Disable SSL verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			// Will return the response, if false it print the response
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// Set the url
			curl_setopt($ch, CURLOPT_URL,$url);
			// Execute
			$result=curl_exec($ch);
			// Closing
			curl_close($ch);	
			// Will dump a beauty json
			$data=json_decode($result, true);
			/*echo "<pre>";
			print_r($data);*/
			?>
            	<table cellpadding="3" border="1">
                	<tr>
                    	<td align="center" colspan="2"><span style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; color: #FF0004;"><strong>User Detail for ID#:</strong></span><strong> <?php echo $_GET['id']; ?></strong></td>
                    </tr>
                	<tr>
                    	<th align="left">ID</th>
                        <td><?php echo $data['recipe']['id']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Title</th>
                        <td><?php echo $data['recipe']['title']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Description</th>
                        <td><?php echo $data['recipe']['description']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Difficulty</th>
                        <td><?php echo $data['recipe']['difficulty']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Serving amount</th>
                        <td><?php echo $data['recipe']['servingAmount']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Cooking time</th>
                        <td><?php echo $data['recipe']['cookingTime']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Ingredient</th>
                        <td><?php echo $data['recipe']['ingredient']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Direction</th>
                        <td><?php echo $data['recipe']['direction']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Nutrition Fact</th>
                        <td><?php echo $data['recipe']['nutritionFact']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Image</th>
                        <td><img src="<?php echo $data['recipe']['imageUrl']; ?>" height="150"></td>
                    <tr>
                    <tr>
                    	<th align="left">User ID</th>
                        <td><?php echo $data['recipe']['userId']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Category</th>
                        <td><?php echo $data['recipe']['category']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Total votes</th>
                        <td><?php echo $data['recipe']['totalVote']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Created by</th>
                        <td><?php echo $data['recipe']['createdBy']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Created on</th>
                        <td><?php echo $data['recipe']['createdDate']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Updated by</th>
                        <td><?php echo $data['recipe']['updatedBy']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Updated on</th>
                        <td><?php echo $data['recipe']['updatedDate']; ?></td>
                    <tr>
                </table>
            <?php
		}
	}
	
?>