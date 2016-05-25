<?php
$flag = 1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['user_email']; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="header">
	<div id="left">
    <label>Coding Cage</label>
    </div>
    <div id="right">
    	<div id="content">
        	Hello 
            <?php if ($flag): ?> 
                Bob
            <?php endif;?>
        
            &nbsp;<a href="logout.php?logout">Sign Out</a>
        </div>
    </div>
</div>

<div id="body">
    <?php if($flag): ?>
	   <button type="button">Click Me!</button>
    <?php else: ?>
        <button type="button">Don't Click Me!</button>
    <?php endif; ?>


</div>

</body>
</html>