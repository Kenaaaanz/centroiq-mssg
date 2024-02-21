<?php 
session_start();
include('partials/menu.php');
include('connect/constants.php');
include("func.php");
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Send Us a Message!</h1>

        <br /><br />

<?php

if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }


?>

    <form action="" method="POST">

        <table class="tbl-2">

            <tr>
				<td>
                     <textarea name="message" cols="50" rows="8" placeholder="Type Your Message Here.."></textarea>
            	</td>           
			</tr>

           
            <tr>

                <td colspan="2">
                    <input type="submit" name="submit" value="Send Message" class="btn-secondary">
                </td>
            </tr>

        </table>

    </form>

<?php include('partials/footer.php'); ?>


<?php

//process the values from form and save on database
//check if submit button is clicked

if(isset($_POST['submit']))
{
    //button clicked
    //Get data from form
    $message = $_POST['message'];
  
    //sql query to save data to database
    $client_id = random_num(20);
    $Message_id = random_num(20);
    $sql = "insert into tbl_message(client_id, message) values('$client_id', '$message')";
            

   
    //execute and save into db
    $res = mysqli_query($conn, $sql) or die($mysqli_error());

    //data insertion confirmation
    if($res==TRUE)
    {
        //Data successfully recorded!
        //echo "Data successfully recorded!";
        // create session variable

        $_SESSION['add'] = "Message sent successfully!";

        //redirect page

        header("location:".SITEURL.'index.php');
    }
    else
    { 
        //Failed Attempt!  
        //echo "Failed Attempt!";

           // create session variable

           $_SESSION['add'] = "Admin Registration Failed!";

           //redirect page to Add admin
   
           header("location:".SITEURL.'login.php');
    }

}  

?>