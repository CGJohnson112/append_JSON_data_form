<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["name"]))  
      {  
           $error = "<label class='text-danger'>Enter name</label>";  
      }  
      else if(empty($_POST["heading"]))  
      {  
           $error = "<label class='text-danger'>Enter heading</label>";  
      }  
      else if(empty($_POST["rating"]))  
      {  
           $error = "<label class='text-danger'>Enter rating</label>";  
      }  
      else if(empty($_POST["comment"]))  
      {  
           $error = "<label class='text-danger'>Enter comment</label>";  
      }  
      else  
      {  
           if(file_exists('ratings.json'))  
           {  
                $current_data = file_get_contents('ratings.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'date'           =>   $_POST['date'],
                     'name'           =>   $_POST['name'],  
                     'heading'          =>  $_POST["heading"],  
                     'rating'     =>     (int)$_POST["rating"],  
                     'comment'     =>     $_POST["comment"],
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('ratings.json', $final_data))  
                {  
                     $message = "<label class='text-success'>File Appended</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  
 ?> 




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<!--CSS CDN for datepicker-->
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />  
<link rel="stylesheet" href="style.css">  
    <title>Sola Hair Salon: Add Ratings</title>
</head>
<body>
<button type="submit" name="submit" onclick="window.location.href='ratings.json'" target="_blank" class="btn">Check out the JSON data</button>
<div class="container">
<h3>What did you think of your visit?</h3>
<form method="post">
<div>
<?php   
    if(isset($error))  
        {  
            echo $error;  
        }  
?> 
</div>

<div class="form-group">

<label for="date">Date visited</label>
<input id="datepicker" name="date" width="276" class="form-control" />

        
<label for="name">Name</label>
<input type="text" name="name" class="form-control" /><br /> 

<label for="heading">Heading</label>
<input type="text" name="heading" class="form-control" /><br /> 

<label for="rating">Rating</label>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="checkbox" name="rating" class="form-check-input" value=5>5
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="checkbox" name="rating"class="form-check-input" value=4>4
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="checkbox" name="rating"class="form-check-input" value=3>3
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="checkbox"name="rating" class="form-check-input" value=2>2
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="checkbox" name="rating"class="form-check-input" value=1>1
  </label>
</div>
<br>
<div class="form-group purple-border">
  <label for="exampleFormControlTextarea4">Comment</label>
  <textarea class="form-control" name="comment" id="exampleFormControlTextarea4" rows="3"></textarea>
</div>

<input type="submit" name="submit" value="Add Rating!" class="btn btn-info" /><br /> 


<div>
<?php  
    if(isset($message))  
        {  
            echo $message;  
         }  
    ?>  
</div>


</form>








</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!--CDN for datepicker calendar-->
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src="script.js"></script>

    
</body>
</html>