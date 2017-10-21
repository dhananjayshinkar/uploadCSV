<?php

//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);



//Class to load classes it finds the file when the program starts to fail for calling a missing class
class Manage 
{
    public static function autoload($class)
    {
       include $class . '.php';
    }
}

spl_autoload_register(array('Manage', 'autoload'));

$obj = new main();

class main {

    public function __construct()
    {
        //set default page request when no parameters are in URL
        $pageRequest = 'homepage';
        $table = 'generateHTML';

        //check if there are parameters
        if(isset($_REQUEST['page'])) 
        {
            //load the type of page the request wants into page request
            $pageRequest = $_REQUEST['page'];
        }
        //instantiate the class that is being requested
        $page = new $pageRequest;


        if($_SERVER['REQUEST_METHOD'] == 'GET') 
        {
            $page->get();
        } else 
            {
                $page->post();
            }
    }
}

?>
