<?php
 
//fetch.php
 
$connect = new PDO("mysql:host=localhost;dbname=testdb", "root", "");
 
$column = array('customer_name', 'type', 'phone', 'status','call_status','note','content','customer_response','reminders','number','name','designation','email','follow_date','dailed_number','called_date');
 
$query = '
SELECT * FROM in_contacts
WHERE id LIKE "%'.$_POST["search"]["value"].'%"
OR customer_name LIKE "%'.$_POST["search"]["value"].'%"
OR type LIKE "%'.$_POST["search"]["value"].'%"
OR phone LIKE "%'.$_POST["search"]["value"].'%"
OR status LIKE "%'.$_POST["search"]["value"].'%"
OR call_status LIKE "%'.$_POST["search"]["value"].'%"
OR note LIKE "%'.$_POST["search"]["value"].'%"
OR content LIKE "%'.$_POST["search"]["value"].'%"
OR customer_response LIKE "%'.$_POST["search"]["value"].'%"
OR reminders LIKE "%'.$_POST["search"]["value"].'%"
OR number LIKE "%'.$_POST["search"]["value"].'%"
OR name LIKE "%'.$_POST["search"]["value"].'%"
OR designation LIKE "%'.$_POST["search"]["value"].'%"
OR email LIKE "%'.$_POST["search"]["value"].'%"
OR follow_date LIKE "%'.$_POST["search"]["value"].'%"
OR dailed_number LIKE "%'.$_POST["search"]["value"].'%"
OR called_date LIKE "%'.$_POST["search"]["value"].'%" 
';
 
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}
 
$query1 = '';
 
if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
 
$statement = $connect->prepare($query);
 
$statement->execute();
 
$number_filter_row = $statement->rowCount();
 
$statement = $connect->prepare($query . $query1);
 
$statement->execute();
 
$result = $statement->fetchAll();
 
$data = array();
 
foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row["id"];
 $sub_array[] = $row["customer_name"];
 $sub_array[] = $row["type"];
 $sub_array[] = $row["phone"];
 $sub_array[] = $row["status"];
 $sub_array[] = $row["call_status"];
 $sub_array[] = $row["note"];
 $sub_array[] = $row["content"];
 $sub_array[] = $row["customer_response"];
 $sub_array[] = $row["reminders"];
 $sub_array[] = $row["number"];
 $sub_array[] = $row["name"];
 $sub_array[] = $row["designation"];
 $sub_array[] = $row["email"];
 $sub_array[] = $row["follow_date"];
 $sub_array[] = $row["dailed_number"];
 $sub_array[] = $row["called_date"];
 
 
 $data[] = $sub_array;
}
 
function count_all_data($connect)
{
 $query = "SELECT * FROM in_contacts";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}
 
$output = array(
 'draw'    => intval($_POST["draw"]),
 'recordsFiltered' => $number_filter_row,
 'data'    => $data,
 
);
echo json_encode($output);
?>
