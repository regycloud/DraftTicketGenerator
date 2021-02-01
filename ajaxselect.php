<!DOCTYPE html>
<html lang="en">
<head>
<head><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
.select2-container{
    width: 100%!important;
    }
    .select2-search--dropdown .select2-search__field {
    width: 98%;
    }
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketing System</title>
</head>
<body>
<div class="container">
    <h1>Ticket Mail Generator</h1>
    <h5>Select Customer:</h5>
    <select class="selectjs name_list" onchange="showCustomer(this.value)"></select> 
    <h5>Select Ticket Type:</h5>

    <select style='margin-bottom: 5cm' id='report' onchange='showCustomer(this.value)'>
    <option value='issue' value='[Issue Report]'>   Issue Report  </option>
    <option value='[Urgent Maintenance]'>   Urgent Maintenance </option>
    <option value='[Maintenance]'>   Maintenance </option>
    <option value='[Enquiry]'>   Enquiry </option>
    </select>

    <div id="txtType"></div>
    <div id="draft"></div>
    <div contenteditable="true" id="txtHint" style="border: 1"></div>
    <div id="selectAll"></div>
    <button onclick='selectText("txtHint")'>Copy Draft</button>

</div>

</body>
<script>
// Select All Command
function selectText(containerid) {
    if (document.selection) { // IE
        var range = document.body.createTextRange();
        range.moveToElementText(document.getElementById(containerid));
        range.select().then(document.execCommand("copy"));
        alert("copy success");
    } else if (window.getSelection) {
        var range = document.createRange();
        range.selectNode(document.getElementById(containerid));
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range)
        document.execCommand("copy");
        alert("copy success");
    }
}

// JSON Data Select
$(document).ready(function () {
    $(".selectjs").select2({
        placeholder: "Input Here",
        minimumInputLength: 2,
        ajax: {
            url: "getCid.php",
            dataType: "json",
            type: "GET",
            delay: 250,
            data: function(params) {
                return {
                    q: params.term,
                };
            },
            processResults: function(data){
                return{
                    results: data
                };
            },
            cache:true            
        }
    });
    $('#report').select2();
});


// Draft Content
function showCustomer(str, stg) {
            var xhttp;
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                    document.getElementById("draft").innerHTML = "<h5>Draft :</h5>";
                }
            };
            // document.getElementById("selectAll").innerHTML = "<button onclick='selectText('txtHint')'>Copy Draft</button>";

            xhttp.open("GET", "getcustomer.php?q=" + str, true);
            xhttp.send();

        }

function ticketType(str) {
            
        }
function manyCust(str) {
            var xhttp;
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "getcustomer.php?q=" + str, true);
            xhttp.send();

        }


// add button

$(document).ready(function (){
    $("#btn1").click(function(){
        $(".selectjs2").select2({
            multiple: true,
            placeholder: "Input Here",
            minimumInputLength: 2,
            ajax: {
                url: "getCid.php",
                dataType: "json",
                type: "GET",
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data){
                    return{
                        results: data
                    };
                },
                cache:true}}, );
        $(".name_list").append('<select type="text" name="name[]" placeholder="Enter your Name" class="selectjs2" />');
        });

    });


// function addForm(){
//     var i = 0;
//     $('.name_list').append('<input type="text" name="name[]" placeholder="Enter your Name"class="form-control name_list" /><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
//       };  
//       $(document).on('click', '.btn_remove', function(){  
//            var button_id = $(this).attr("id");   
//            $('#row'+button_id+'').remove();  
//       });  



</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</html>
