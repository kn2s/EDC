<?php
App::uses('AppHelper', 'View/Helper');
App::import('Vendor','TCPDF',array('file' => 'tcpdf/tcpdf.php'));   //1
class PdfHelper  extends AppHelper                                  //2
{
    public $core;
    public function PdfHelper() {
        $this->core = new TCPDF();                                  //3
    }
}
?>