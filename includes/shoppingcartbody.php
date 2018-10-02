
<!-- Right side Shopping Cart -->
<div id="cart">
	<p style="text-align: center; margin: 0; padding: 5px; font-style: italic;">Your Shopping Cart</p>
	<table>
		<!-- Top row -->
		<tr>
			<th> Title </th>
			<th> Call # </th>
			<th width="10%"> <!-- Remove --> </th>
		</tr>
		<!-- Data -->
		<!-- explode cookie -->
		<?php
		if(isset($_COOKIE[$cookie_name])){
			$arr=explode(",",$_COOKIE[$cookie_name]);
			foreach($arr as $i){
				$temp = explode(":",$i);
				if($temp[0] == null) break;
				echo 	"<tr><td><a href=/problems/show-problem.php?n=$temp[1]> $temp[0] </td>
					<td>$temp[1]</td>
					<td><a class='button button1'  href=\"index.php?del=$temp[1]\">X</a></td>
					</tr>";
			}
			}else{
				echo "<tr><td>No</td><td>Cookie</td><td></td></tr>";
			}
			?>
		<tr style="background-color:lightgrey; border:3px solid darkcyan;">
                        <td><a href=/problems/show-cart.php id="loadcart" >Load Cart</td>
                        <td></td>
                        <td  style="border: lightgrey; float:right;">
				<a id="clearcart" href='index.php?del=0'>Clear</a>
                        </td>
                </tr>
	</table>
</div>
