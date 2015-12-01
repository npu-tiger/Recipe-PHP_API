<table>
	<form method="get">
    	<tr>
        	<td>Enter Recipe ID#:</td>
            <td><input type="text" name="id" placeholder="Enter Rank ID#"</td>
        </tr>
        <tr>
        	<td></td>
            <td><input type="submit" name="getRank" value="Get Details"></td>
        </tr>
	</form>
</table>
<?php
	if(isset($_GET['getRank']) && isset($_GET['id'])){
		if($_GET['getRank'] == "Get Details"){
			$id=$_GET['id'];
			
			$url="http://localhost:8080/recipe/rest/api/ranks/".$id."";
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
                        <td><?php echo $data['rank']['id']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Rank</th>
                        <td><?php echo $data['rank']['rank']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Recipe ID</th>
                        <td><?php echo $data['rank']['recipeId']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">User ID</th>
                        <td><?php echo $data['rank']['userId']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Status</th>
                        <td><?php echo $data['rank']['status']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Created by</th>
                        <td><?php echo $data['rank']['createdBy']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Created date</th>
                        <td><?php echo $data['rank']['createdDate']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Updated by</th>
                        <td><?php echo $data['rank']['updatedBy']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Updated date</th>
                        <td><?php echo $data['rank']['updatedDate']; ?></td>
                    <tr>
                </table>
            <?php
		}
	}
	
?>