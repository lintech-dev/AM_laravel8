
<?php

include('conn.php');
//include('connect-string_PDO.php');
if(isset($_GET['term']))
{
	$return_arr = array();
	try
	{
		//$stmt = $conn->prepare('select fullname from masterdate_update where fullname like :term AND FLAG = 1');
		$stmt = $conn->prepare('select ticket_typename from ticket_type_info where ticket_typename like :term');
		$stmt->execute(array('term' => '%'.$_GET['term'].'%'));

		while($row = $stmt->fetch())
		{
			$return_arr[] =  $row['ticket_typename'];
			
		}

	}
	catch(PDOException $e)
	{
		echo 'ERROR: ' .$e->getMessage();
	}

	echo json_encode($return_arr);
}
?>
