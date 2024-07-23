<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter PDF Library
 *
 * Generate PDF in CodeIgniter applications.
 *
 * @package            CodeIgniter
 * @subpackage        Libraries
 * @category        Libraries
 */

// Reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf
{
    public function __construct(){
        
        // Include autoloader
        require_once dirname(__FILE__).'/dompdf/autoload.inc.php';
        
        // Instantiate and use the dompdf class with options
        $options = new Options();
        $options->set('isRemoteEnabled', true); // Enable remote resources

        $pdf = new Dompdf($options);
        
        $CI =& get_instance();
        $CI->dompdf = $pdf; 
    }
}
