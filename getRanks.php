<table>
	<form method="get">
        <tr>
        	<td></td>
            <td><input type="submit" name="getAllRanks" value="Get All Ranks"></td>
        </tr>
	</form>
</table>
<?php
	if(isset($_GET['getAllRanks'])){
		if($_GET['getAllRanks'] == "Get All Ranks"){
						
			$url="http://localhost:8080/recipe/rest/api/ranks";
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
			for($i=0;$i<count($data['ranks']);$i++){
			?>
				<table cellpadding="3" border="1" style="float:left; margin:25px;" align="center">
                	<tr>
                        <td align="center" colspan="2"><span style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; color: #FF0004;"><strong>Recipe Detail for ID#:</strong></span><strong> <?php echo $data['ranks'][$i]['id']; ?></strong></td>
                    </tr>
                    <tr>
                    	<th align="left">ID</th>
                        <td><?php echo $data['ranks'][$i]['id']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Rank</th>
                        <td><?php echo $data['ranks'][$i]['rank']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Recipe ID</th>
                        <td><?php echo $data['ranks'][$i]['recipeId']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">User ID</th>
                        <td><?php echo $data['ranks'][$i]['userId']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Status</th>
                        <td><?php echo $data['ranks'][$i]['status']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Created by</th>
                        <td><?php echo $data['ranks'][$i]['createdBy']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Created date</th>
                        <td><?php echo $data['ranks'][$i]['createdDate']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Updated by</th>
                        <td><?php echo $data['ranks'][$i]['updatedBy']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Updated date</th>
                        <td><?php echo $data['ranks'][$i]['updatedDate']; ?></td>
                    <tr>
                    
                </table>
            <?php
			}
		}
	}
	
?>