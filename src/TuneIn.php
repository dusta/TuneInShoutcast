<?php
/** 
 * @author Sławomir Kaleta
 * @author Amadeusz Dzięcioł
 * Generowanie plików do połączenia z radiem v2.0
 * 
*/
namespace TuneInShoutcast;

class Tunein {

    private $available_format = array(
        'asx' => 'audio/x-ms-asf',
        'm3u' => 'audio/x-mpegurl',
        'pls' => 'audio/x-scpls',
        'qtl' => 'application/x-quicktimeplayer',
        'wax' => 'audio/x-ms-wax',
        'ram' => 'audio/x-pn-realaudio',
    );

    public function __construct($address){
        $this->address = $address;
    }

    public function generate($extension){

        if (in_array($extension, $this->available_format, false)) {
            exit('Error Format');
        }


        if (!headers_sent()) {
            header('Content-Type: '.$this->available_format[$extension].' name="playlist.'.$extension);
            header('Content-Disposition: attachment; filename=playlist.'.$extension);
        }

        if($extension === 'asx') {
            echo "<asx version=\"3.0\">\n";
            echo "<title>RADIO_NAME</title>\n";
            echo "<entry>\n";
            echo "<ref href=\"http://".$this->address."\" />\n";
            echo "</entry>\n";
            echo "</asx>\n";;

        }else if ($extension === 'm3u') {
            echo "#EXTM3U\n";
            echo "#EXTINF:-1,Live address\n";
            echo "http://".$this->address."/\n";

        }else if ($extension === 'pls') {
            echo "[playlist]\n";
            echo "NumberOfEntries=1\n";
            echo "\n";
            echo "File1=http://".$this->address."\n";
            echo "Length0=-1\n";
            echo "\n";
            echo "Version=2\n";

        }else if ($extension === 'qtl') {
            echo "<?xml version=\"1.0\"?>\n";
            echo "<?quicktime type=\"application/x-quicktime-media-link\"?>\n";
            echo "<embed src=\"icy ://".$this->address."\" autoplay=\"true\" />\n";
           
        }else if ($extension === 'wax') {
            echo $this->address;
           
        }else if ($extension === 'ram') {
            echo "http://".$this->address;
           
        }

    }

}
