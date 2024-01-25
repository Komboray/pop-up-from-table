<!-- //this is a pop up form that displays users from the table with the specific details of the user -->
<!-- AJAX HAS BEEN USED TO ASSIST IN TRANSFORMING THE CODE TO JAVASCRIPT -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
    
    
</head>
<link rel="stylesheet" href="style.css">
<!-- THIS BELOW IS THE LINK THAT ALLOWS FOR THE AJAX TO BE CALLED JQUERY CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<body>
    
<table border="1" style = "background-color:black">
    <thead>
        <tr align= "center" style = "background-color:lightblue">
            <th width="100">Id</td>
            <th width="100">password</td>
            <th width="100">Email</td>
            <th width="100">Username</td>
            <th width="100">View</td>
        </tr>
    </thead>
    <tbody>
    <?php
include("connect.php");

$sql = "SELECT *
        FROM `users`";

$res = mysqli_query($conn, $sql);

if($res){
    $num = mysqli_num_rows($res);

    if($num>0){
        while($row = mysqli_fetch_assoc($res)){
            echo "
            <tr align= 'center' style = 'background-color:aliceblue'>
                    <td class='user_id' width='100'>{$row["id"]}</td>
                    <td width='100'>{$row["pass"]}</td>
                    <td width='100'>{$row["email"]}</td>
                    <td width='100'>{$row["username"]}</td>
                    <td width='100'><button type='button' class = 'popup-trigger view_data' onclick='openPopup()'>View</button></td>
            </tr>
            ";

        }
    }
}
?>
    
    </tbody>

</table>

<div class="container overlay" id="overlay">
            <div class="body view_user_data">

                

            </div>
            <!-- THIS IS THE MAIN FORM AREA END -->
            <span onclick="closePopup()">Close</span>
    </div>


    
</body>
</html>
<script>
$(document).ready(function () {

    $('.view_data').click(function (e){
        e.preventDefault();

        // console.log('hello');

        var user_id = $(this).closest('tr').find('.user_id').text();
        // console.log(user_id);

        $.ajax({
            method: "POST",
            url: "code.php",
            data: {
                'click_view_btn': true,
                'user_id':user_id,
            },
            success: function (response){
                console.log(response);

                $('.view_user_data').html(response);
            }
        });
    });
});


//the pop up form
function openPopup() {
      document.getElementById("overlay").style.display = "flex";
    }

    // Function to close the pop-up
function closePopup() {
      document.getElementById("overlay").style.display = "none";
    }

</script>
