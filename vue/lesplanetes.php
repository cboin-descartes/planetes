
<table><thead><td>Nom</td><td>Circonférence</td></thead>
<tbody>
<?php
		foreach ($planetes as $key=>$planet) {
			echo '<tr>
				<td><a href="/router.php/planet/'.$key . '">' . $planet['name'] . '</a></td>
				<td>' . $planet['circ'] . '</td>
				<td><a href="'.$base_url.'/router.php/delete/'.$key . '">Supprimer</a></td>
				</tr>';
		}
?>
</tbody>
</table>
