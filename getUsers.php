<table>
	<form method="get">
        <tr>
        	<td></td>
            <td><input type="submit" name="getAllUser" value="Get All User Details"></td>
        </tr>
	</form>
</table>
<?php
	if(isset($_GET['getAllUser'])){
		if($_GET['getAllUser'] == "Get All User Details"){
						
			$url="http://localhost:8080/recipe/rest/api/users";
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
			for($i=0;$i<count($data['users']);$i++){
			?>
				<table cellpadding="3" border="1" style="float:left; margin:25px;" align="center">
                	<tr>
                        <td align="center" colspan="2"><span style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; color: #FF0004;"><strong>User Detail for ID#:</strong></span><strong> <?php echo $data['users'][$i]['id']; ?></strong></td>
                    </tr>
                    <tr>
                    	<th align="left">ID</th>
                        <td><?php echo $data['users'][$i]['id']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Username</th>
                        <td><?php echo $data['users'][$i]['username']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Email</th>
                        <td><?php echo $data['users'][$i]['email']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Nickname</th>
                        <td><?php echo $data['users'][$i]['nickname']; ?></td>
                    <tr>
                    
                    <tr>
                    	<th align="left">Created by</th>
                        <td><?php echo $data['users'][$i]['createdBy']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Created date</th>
                        <td><?php echo $data['users'][$i]['createdDate']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Updated by</th>
                        <td><?php echo $data['users'][$i]['updatedBy']; ?></td>
                    <tr>
                    <tr>
                    	<th align="left">Updated date</th>
                        <td><?php echo $data['users'][$i]['updatedDate']; ?></td>
                    <tr>
                </table>
            <?php
			}
		}
	}
	
?>