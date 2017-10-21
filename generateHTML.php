<?php

class generateHTML extends page
 {
    //Method to generate HTML Table from the CSV 
    public function get()
    {

        $headerRow = true;
        $this->html .= '<table border=1>';
        $name= "Uploads/".$_REQUEST['filename'];
    
        $file = fopen($name,"r");
        while (($line = fgetcsv($file)) !== false)
        {
            $this->html .= '<tr>';
                if($headerRow)
                {
                    foreach ($line as $cell)
                        {
                            $this->html .= '<th>' . htmlspecialchars($cell) . '</th>';
                        }
                        $headerRow = false;
                }
                else
                    {
                        foreach ($line as $cell)
                        {
                            $this->html .= '<td>' . htmlspecialchars($cell) . '</td>';
                        }
                    }            
            $this->html .= '</tr>';
        }

        fclose($file);
        $this->html .= '</table';
    }  
 }
?>