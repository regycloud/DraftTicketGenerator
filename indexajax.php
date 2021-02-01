<!DOCTYPE html>
<html>
<head><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
    }
</style>

<body>

    <h2>Ticket Mail Generator</h2>
    <p></p>

    <br />
    
<? require 'readdb.php';?>
<div class='container'> <div class='row'> <div class='col-md-8'>
<tr><br />
<h3>search: </h3>
<?php 
    if ($result = $mysqli->query($sql)) {
        if (mysqli_num_rows($result) > 0) {
                // Customer Input Form
                echo "<select class='select' id='name'";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option id='customers' onchange='showCustomer(this.value)' value=" . $row['id'] . "  >"  . $row['name'] . "</option>";
                }
                echo "</select>";

                // Ticket Type Input Form

                
                // Add More Form
                // echo " <button id ='newForm'> Add More </button>";
                echo " <select style='margin-bottom: 5cm' id='report' onchange='ticketType(this.value)'>";
                echo "<option></option>";
                echo "<option id='issue' value='[Issue Report]'>   Issue Report  </option>";
                echo "<option value='[Urgent Maintenance]'>   Urgent Maintenance </option>";
                echo "<option value='[Maintenance]'>   Maintenance </option>";
                echo "<option value='[Enquiry]'>   Enquiry </option>";
                echo "</select>";
                echo "</select>";


            echo "</div>";
            echo "</div>";
            mysqli_free_result($result);
        }
    }
    
    ?>
    <div id='txtType'> Ticket Type info will be listed here...</div>
    <div id='txtHint'> Customer info will be listed here... </div> 

        <!-- <div class="input_fields_wrap">
        <input type="text" name="answer[]" class="field-long" /> -->
        </div>


    <script>
        function showCustomer(str) {
            var xhttp;
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                    if (ticketType() === undefined){
                        document.getElementById("txtType").innerHTML  = "please select ticket type";
                    };
                }
            };
            xhttp.open("GET", "getcustomer.php?q=" + str, true);
            xhttp.send();

        }

       function ticketType(str) {
            if(document.getElementById("tititkuda") != null){
                let x = document.getElementById("tititkuda").innerText;
               document.getElementById("txtType").innerHTML  = str + " " + x;
            }
           
        }

        function ticketType(str) {
            if(document.getElementById("tititkuda") != null){
                let x = document.getElementById("tititkuda").innerText;
               document.getElementById("txtType").innerHTML  = str + " " + x;
            }
           
        }

       
        
        
        // function addForm(str) {

        //     document.getElementById("addForm").innerHTML =  '"<option id="customers" onchange="showCustomer(this.value)" value=" . $row["id"] . " >"  . $row["name"];"' ;
        // }
        
    </script>




    <!-- <script>
        function myFunction() {
            $("#addForm").append('<select class="select" id="name" ; while ($row = mysqli_fetch_array($result)) {echo "<option id="customers" onchange= "showCustomer(this.value)" value=" . $row["id"] . "  >"  . $row["name"] . "</option>";} </select>');
            // <select style="margin-bottom: 5cm" class="report" id="ticket" onchange="ticketType(this.value)">  </select> 
        }
    </script> -->
    


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        // $('.select').select2();
        $(document).ready(function() {
            $('.select').select2({
                });
            $('.select').val(selectedValuesTest).trigger('change');
                });
        $('#report').select2();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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

        td {
            margin-left: 80px;
        }
    </style>


</html>