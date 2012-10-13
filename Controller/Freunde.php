<?php     
  $fields_WhoAmI = array('Name',
                  'Nachname',
                  'Alter',
                  'Augenfarbe',
                  'Haarfarbe',
                  'Größe',
                  'Geboren'
                );

  $fields_WhatILike = array(
                  'Meine Lieblingsfarbe',
                  'Mein Traumberuf',
                  'Mein Lieblinsgfilm',
                  'Mein Lieblingsessen',
                  'Meine Lieblingsstar',
                  'Meine Lieblingsband/Song',
                  'Mein Lieblingsbuch'
                );
?>

<div id="left">
		<div>
			<h1>Wer bin ich?</h1>
		<?php		     
     echo '<ul>';
     $i = 0;
     foreach($fields_WhoAmI as $field)
     {
       echo '<li>' . $field . ' : ' . $freunde[$_GET['select']][$i]  . '</li>';
       $i++;
     }
     echo '</ul>';
     ?>
     
		</div>
	   <div>
			<h1>Das mag ich</h1>
      <?php
				echo '<ul>';
     $i = 7;
     foreach($fields_WhatILike as $field)
     {
       echo '<li>' . $field . ' : ' . $freunde[$_GET['select']][$i]  . '</li>';
       $i++;
     }
     echo '</ul>';
     ?>
		</div>
		</div>
    <div id="left"><img src="images/joseph.jpg" alt="Mein Foto" ></div>