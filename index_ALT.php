<?php
/*
	Format der gespeicherten Daten
	vorname; nachname; alter; augenfarbe; haarfarbe; geboren am; groesse;
*/
$path = "freunde/";

# Parameter aus request auslesen
$name = $_GET['name'];
$nachname = $_GET['nachname'];

$filename = md5($name . $nachname);
if(!empty($name) && !empty($nachname))
{
  $data =    $name . ";" 
        . $nachname . ";" 
        . $_GET['alter'] . ";"
        . $_GET['augenfarbe'] . ";"
        . $_GET['haarfarbe'] . ";"
        . $_GET['groesse'] . ";"
        . $_GET['geboren'] . ";"
        . $_GET['lieblingsfarbe'] . ";"
        . $_GET['traumberuf'] . ";"
        . $_GET['lieblingsfilm'] . ";"
        . $_GET['lieblingsessen'] . ";"
        . $_GET['star'] . ";"
        . $_GET['lieblingsband'] . ";"
        . $_GET['lieblingsbuch'] . ";";
		  
file_put_contents($path . $filename, $data);
}

$filecontent = file_get_contents($path . $filename);

$content[] = explode(';', $filecontent);
//var_dump($content);



# lies das verzeichnis mit den freunden aus

    $directory = dirname(__FILE__) . "/freunde";
    $filenames = array();    
    
		$handle = opendir($directory);
    
    while (false !== ($entry = readdir($handle))) {
        if(strlen($entry) > 2)
        {
        	$filenames[] = $entry;
        	}
        
    }
    
    $freunde = array();
    foreach($filenames as $file)
    {
      $content = file_get_contents($directory . "/" . $file);
      $freunde[] = explode(';', $content);
    	}
//     var_dump($freunde);
     
      ?>



<!Doctype html>
<html>
	<head>
		<title>Meine Freundschaftsseite php</title>
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<!-- <link rel="stylesheet" type="text/css" href="mystyle.css" />-->
		<style type="text/css">
			body{
				background-color: #203498;
				font-size: 100%;
				color:white;
			}
			ul{
				margin-left: 0;
				padding-left: 0;			
				color: #FFF;
				list-style-type: none;			
			}
			li{
					margin: 3px 0 0 0;
					padding: 0;		
			}
			h1{
				color:#17ec58;
				font-size: 140%;		
			}
			
			#left {
				width: 500px;	
				margin-left: 60px;
				float: left;
			}
			#right{
				float: right;
							
			}
			
			img {
				margin-top: 20px;
				border:10px dotted #f12b5e;
			}
			
			a {
							color:red;
			}
		</style>
	</head>
	<body>
    <h1>Meine Freunde</h1>
    <a href="<?php echo $_SERVER['PHP_SELF']?>?page=Form">Neuer Freund</a><br>
    <?php
      foreach($freunde as $index => $freund)
        {
          echo '<a href="' . $_SERVER['PHP_SELF'] . '?select=' . $index . '&page=Freunde">'. $freund[0] . ' ' . $freund[1] . '</a><br>';
        }
     ?>
    
    <?php
    $path = 'Controller/' . $page . '.php';
    include 'Controller/' . $_GET['page'] . '.php';
    ?>
	</body>
</html>