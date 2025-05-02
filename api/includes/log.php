<?php
class log {

	public $nomelog = 'log.log';

	function scriviLog( $stringa ) {

		$mynomelog = $this->nomelog;
		$mynomelog = './log/' . date( 'Ymd' ) . '_' . $mynomelog;
		//$data = date('Y-m-d, H:i:s');
		$datiaccesso = getenv( "REMOTE_ADDR" ) . " - " . date( DATE_ATOM ) . " " . getenv( "REQUEST_URI" ) . " " . getenv( "HTTP_USER_AGENT" ) . " " . getenv( "HTTP_REFERER" ) . "";
		$datiaccesso = time() . ' - ';
		$log         =   $datiaccesso . "\t" . $stringa . PHP_EOL;

		// Apertura file
		if ( $file = @fopen( $mynomelog, 'a' ) ) {
			fwrite( $file, $log );
			fclose( $file );
		} else {
			// Eventuale codice per gestire un errore di scrittura
		}
	}

	//usare così:
	//$mylog = new log();
	//$mylog->scriviLog("etc etc");
}