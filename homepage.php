<?php

class homepage extends page
{
  //Function to display HTML form
  public function get()
    {
        $form = '<form method="post" enctype="multipart/form-data">';
        $form .= '<input type="file" name="uploadCSV" id="uploadCSV">';
        $form .= '<input type="submit" value="Upload CSV" name="submit">';
        $form .= '</form> ';
        $this->html .= '<h1>Form to Upload CSV</h1>';
        $this->html .= $form;

    }

    //Function to upload CSV file
    public function post() 
    {
        //setting up the target directory to upload the CSV file 
        $target_dir = "Uploads/";
        $target_file = $target_dir . basename($_FILES["uploadCSV"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $imageFileName = pathinfo($target_file,PATHINFO_BASENAME);
        move_uploaded_file($_FILES["uploadCSV"]["tmp_name"], $target_file);

        //Header function to pass the file name to the next page 
        header("Location: https://web.njit.edu/~dps48/uploadCSV/index.php?page=generateHTML&filename=".$_FILES["uploadCSV"]["name"]);
    }
}

?>