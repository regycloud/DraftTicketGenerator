<?php
include('connect.php');

$query = "SELECT * FROM cust";
$statement = $connect->prepare($query);
$statement->execute();
$hasil = $statement->fetchAll();


?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1><img src="ticket.png" width="80px">Create Draft Ticket</h1>
                <form name="sample_form" action="" method="post" id="sample_form">
                    <div class="form-group">
                        <?php include "search.php"?>
                    </div>
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="your_email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="Phone">Phone</label>
                        <input type="text" class="form-control" name="your_phone" placeholder="Phone" required>
                    </div> -->
                    <div class="form-group">
                        <label for="comments">Comments</label>
                        <textarea name="comments" class="form-control" rows="3" cols="28" rows="5" placeholder="Comments"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit_form">Submit</button>
                    <img src="img/loading.gif" id="loading-img">
                </form>
                <div class="response_msg"></div>
            </div>
        </div>
    </div>
</body>
<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
	$('.select').select2();
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://www.kvcodes.com/theme/js/jquery.min.js"> </script>




<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
    #loading-img {
        display: none;
    }

    .response_msg {
        margin-top: 10px;
        font-size: 13px;
        background: #E5D669;
        color: #ffffff;
        width: 250px;
        padding: 3px;
        display: none;
    }
</style>

</html>