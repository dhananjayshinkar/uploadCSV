<?php 
class page
{
    protected $html;

    //start of the HTML page to display form
    public function __construct()
    {
        $this->html .= '<html>';
        $this->html .= '<body>';
    }

    //HTML page ends when distructer executes
    public function __destruct()
    {
        $this->html .= '</body></html>';
        displayFunction::printThis($this->html);
    }
}

?>