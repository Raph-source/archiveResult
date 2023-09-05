<?php
$title = 'home';
$style = ASSETS_CSS.'admin/home.css';
require_once(HEADER);

if(isset($notif))
    echo $notif;

include_once('option.php');
?>
<?php
require_once(FOOTER);
?>
 