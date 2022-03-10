<?php
include 'pdodbcon.php';
$id = "";
$name = "";
$number = "";
$email = "";

if(isset($_POST['insert']))
{
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];

    $pdoQuery = "INSERT INTO pdodata(`name`,`number`,`email`) VALUES (:name,:number,:email)";

    $pdoQuery_run = $pdodbcon->prepare($pdoQuery);

    $pdoQuery_exec = $pdoQuery_run->execute(array(":name"=>$name,":number"=>$number,":email"=>$email));

    if($pdoQuery_exec){
        echo '<script> alert("Data inserted")</script>';
    }else{
        echo '<script> alert("Data NOT inserted")</script>';
    }
}
?>


<?php
include 'pdodbcon.php';
$id = "";
$name = "";
$number = "";
$email = "";

if(isset($_POST['display']))
{
    $pdoQuery = "SELECT * FROM pdodata";
    $pdoQuery_run = $pdodbcon->query($pdoQuery);

    if($pdoQuery_run)
    {
        echo '<table width="50%" border="1" cellspacing="5">
            <tr style="color:blue;">
               <td> ID </td>
               <td> name </td>
               <td> number </td>
               <td> email </td>
            </tr>
        ';
        //while($row = $pdoQuery_run->fetch(PDO::FETCH_OBJ))
        foreach($pdoQuery_run as $row)
        {
        echo ' <tr>
                    <th> '.$row->id.' </th>
                    <th> '.$row->name.' </th>
                    <th> '.$row->number.' </th>
                    <th> '.$row->email.' </th>
               </tr>           
        ';
        }
    }else{
        echo '<script> alert("no record found")</script>';
    }

}
?>