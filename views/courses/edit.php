<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Edit course</title>
    
   
</head>
<body>
    <form method='POST'>
<label>Course Name:</label>
 <input type='text' name='name'  value='<?= $results->getname() ?>'><br>
 <label>Course Price:</label>
 <input type='text' name='price'  value='<?= $results->getprice()?>'><br>
 <input type='hidden' name='id' value="<?= $results->getId()?>">
 <button>Edit</button> 
    </form>
</body>
</html> 