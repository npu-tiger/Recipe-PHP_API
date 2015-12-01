<table>
	<form method="get">
        <tr>
        	<td></td>
            <td><input type="submit" name="getAllRecipes" value="Get All recipes Details"></td>
        </tr>
	</form>
</table>
<?php
	if(isset($_GET['getAllRecipes'])){
		if($_GET['getAllRecipes'] == "Get All recipes Details"){
						
			$url="http://localhost:8080/recipe/rest/api/recipes";
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
			// Will dump a beauty json :3
			$data=json_decode($result, true);
			/*echo "<pre>";
			print_r($data);*/
			for($i=0;$i<count($data['recipes']);$i++){
			?>
				<table cellpadding="3" border="1" style="float:left; margin:25px;" align="center">
                	<tr>
                        <td align="center" colspan="2"><span style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; color: #FF0004;"><strong>Recipe Detail for ID#:</strong></span><strong> <?php echo $data['recipes'][$i]['id']; ?></strong></td>
                    </tr>
                    <tr>
                    	<th align="left">ID</th>
                        <td><?php echo $data['recipes'][$i]['id']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Title</th>
                        <td><?php echo $data['recipes'][$i]['title']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Description</th>
                        <td><?php echo $data['recipes'][$i]['description']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Difficulty</th>
                        <td><?php echo $data['recipes'][$i]['difficulty']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Serving amount</th>
                        <td><?php echo $data['recipes'][$i]['servingAmount']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Cooking time</th>
                        <td><?php echo $data['recipes'][$i]['cookingTime']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Ingredient</th>
                        <td><?php echo $data['recipes'][$i]['ingredient']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Direction</th>
                        <td><?php echo $data['recipes'][$i]['direction']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Nutrition Fact</th>
                        <td><?php echo $data['recipes'][$i]['nutritionFact']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Image</th>
                        <td><img src="<?php echo $data['recipes'][$i]['imageUrl']; ?>" height="150"></td>
                    <tr>
                    <tr>
                    	<th align="left">User ID</th>
                        <td><?php echo $data['recipes'][$i]['userId']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Category</th>
                        <td><?php echo $data['recipes'][$i]['category']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Total votes</th>
                        <td><?php echo $data['recipes'][$i]['totalVote']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Created by</th>
                        <td><?php echo $data['recipes'][$i]['createdBy']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Created on</th>
                        <td><?php echo $data['recipes'][$i]['createdDate']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Updated by</th>
                        <td><?php echo $data['recipes'][$i]['updatedBy']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Updated on</th>
                        <td><?php echo $data['recipes'][$i]['updatedDate']; ?></td>
                    <tr>
                    
                </table>
            <?php
			}
		}
	}
	
?>