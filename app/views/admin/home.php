<?php
$title = 'home';
require_once(HEADER);

if(isset($notif))
    echo $notif;

    include_once('option.php');
?>
<h1>home admin</h1>
<?php
require_once(FOOTER);
?>