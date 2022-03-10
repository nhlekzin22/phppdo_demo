<?php
include 'pdodbcon.php';
$id = "";
$name = "";
$number = "";
$email = "";

if(isset($_POST['search']))
{
    $id = $_POST['id'];

    $pdoQuery = "SELECT * FROM pdodata WHERE id = :id ";
    $pdoQuery_run = $pdodbcon->prepare($pdoQuery);
    $pdoQuery_exec = $pdoQuery_run->execute(array(":id"=>$id));

    if($pdoQuery_exec){
        if($pdoQuery_run->rowcount()>0)
        {
            foreach($pdoQuery_run as $row)
            {
                $id = $row->id;
                $name = $row->name;
                $number = $row->number;
                $email = $row->email;
            }
        }else{
            echo '<script> alert("no record found")</script>';
        }
    }else{
        echo '<script> alert("no record found")</script>';
    }
}
?>

<html>
<head>
    <title>Interns</title>
</head>
<body>
<center>
    <h1>Intern Details</h1>
    <form action="" method="POST">
        <table width="50%" border="1" cellpadding="5" cellpsacing="5">
            <tr>
                <td>
                    <center>
                        <br>
                        SEARCH INTERN ID:<input type="number" name="id" value="<?php echo $id; ?>" placeholder="Enter Intern ID"/> </br>
                        <br>
                        NAME :<input type="text" name="name" value="<?php echo $name; ?>" placeholder="Enter your name"/> </br>
                        <br>
                        NUMBER :<input type="number" name="number" value="<?php echo $number; ?>" placeholder="Enter your number"/> </br>
                        <br>
                        EMAIL :<input type="email" name="email" value="<?php echo $email; ?>" placeholder="Enter your email"/> </br>
                        <br>
                        <button type="submit" name="insert"> Insert </button>
                        <button type="submit" name="display"> Display </button>
                        <button type="submit" name="search"> Search </button>
                        <button type="submit" name="update"> Update </button>
                        <button type="submit" name="delete"> Delete </button>

                        
                    </center>
                </td>
            </tr>
    </form>
</center>
</body>
</html>

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


<?php
include 'pdodbcon.php';

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];

    $pdoQuery = "UPDATE pdodata SET name=:name, number=:number, email=:email WHERE id=:id";
    $pdoQuery_run = $pdodbcon->prepare($pdoQuery);
    $pdoQuery_exec = $pdoQuery_run->execute(array(":name"=>$name, ":number"=>$number, ":email"=>$email, ":id"=>$id));

    if($pdoQuery_run)
    {
        echo '<script> alert("Data Updated")</script>';
    }else{
        echo '<script> alert("Data Not Updated")</script>';
    }

}
?>

<?php
include 'pdodbcon.php';


if(isset($_POST['delete']))
{
    $id = $_POST['id'];

    $pdoQuery = "DELETE FROM pdodata WHERE id = :id ";
    $pdoQuery_run = $pdodbcon->prepare($pdoQuery);
    $pdoQuery_exec = $pdoQuery_run->execute(array(":id"=>$id));

    if($pdoQuery_exec)
    {
        echo '<script> alert("Data Deleted")</script>';
    }else{
        echo '<script> alert("Data Not Deleted")</script>';
    }

}
?>