<?php
$host='localhost';
$username='root';
$pwd='';
$db="zailet";
$con=mysqli_connect($host,$username,$pwd,$db) or die('Unable to connect');
if(mysqli_connect_error($con))
{
  echo "Failed to Connect to Database ".mysqli_connect_error();
}
$name=$_POST['Query'];
$sql="select t1.title from posts as t1 join topics_map as t2 on (t1.id=t2.id) join topics_english as t3 on t2.topic_id=t3.id where t3.interest LIKE '%$name%'";
$query=mysqli_query($con,$sql);
if($query)
{
    while($row=mysqli_fetch_array($query))
  {
    $data[]=$row;
  }
    print(json_encode($data));
}else
{
  echo('Not Found ');
}
mysqli_close($con);
?>