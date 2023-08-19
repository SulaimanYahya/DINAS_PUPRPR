<?php
class Pdf {
 
    function __construct() {
        include_once APPPATH . '/third_party/fpdf/fpdf.php';
        include_once APPPATH . '/third_party/fpdf/exfpdf.php';
        include_once APPPATH . '/third_party/fpdf/easyTable.php';
    }
}
?>