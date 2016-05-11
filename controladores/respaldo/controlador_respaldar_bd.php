<?php

$DBUSER="seemb";
$DBPASSWD="seemb";
$DATABASE="seemb";
$filename = "Respaldo-BD_fecha:".date("d-m-Y")."_hora".date("H_i_s").".sql.gz";
$mime = "application/x-gzip";

header( "Content-Type: " . $mime );
header( 'Content-Disposition: attachment; filename="' . $filename . '"' );

$cmd = "mysqldump -u $DBUSER --password=$DBPASSWD $DATABASE | gzip --best";   

passthru( $cmd );
exit(0);

?>