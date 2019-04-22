<!DOCTYPE html>
<html>
    <head>
        <title>Imei Upload Interface</title>
        <style type="text/css">
            h3{font-family:tahoma;background:#00ccdd;padding:5px 10px;color:#FFF;text-align:center;}
            table tr td label{font:14px tahoma;}
        </style>
    </head>
    <body>
        <!-- create a form interface to be read and insert data into database -->
        <form action="testing.php" name="readfile" method="post" enctype="multipart/form-data">
            <table cellpadding="10" align="center" rules="all" frame="box">
                <tr>
                    <td colspan="2">
                        <h3>
                            Imei upload
                        </h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="txt-file">Open File(*.txt):</label>
                    </td>
                    <td>
                        <input type="file" name="file1"><!--file to read-->
                    </td>
                </tr>
                <tr valign="top">
                    <td>
                        <label>Field Terminated By:</label><!--what character to terminate as column into table-->
                    </td>
                    <td>
                        <input type="radio" name="deli" value=";" />Simicolum<br /><!--terminated by simicolum-->
                        <input type="radio" name="deli" value="	" />Tab<br /><!--terminated by tab-->
                        <input type="radio" name="deli" value="," />Comma<br /><!--terminated by comma-->
                        <input type="radio" name="deli" value="|" />Herizontal Bar<br /><!--terminated by herizontal bar-->
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <input type="submit" name="read" value="Insert"><!--button to submit the form to read data from the file-->
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
if (isset($_POST['read'])) {//check if button have been click or not
//    mysql_connect('localhost', 'root', '') or die('could not connect to database' . mysql_error()); //connection to database server
//    //mysql_connect(servername,username,password)
//    mysql_select_db('films'); //select database
    //mysql_select_db(databasename);
    
    $conn = new mysqli('localhost','root','','films');
    $terminated = $_POST['deli']; //get the value of terminated character from a form with post method
    $file_type = $_FILES['file1']['type']; //get file type of selected file to read
    $allow_type = array('text/plain'); //allow only file that have extesion with .txt
    $fieldall = "";
    if (in_array($file_type, $allow_type)) {//check if selected file type is match to the allow file type we have defined
        move_uploaded_file($_FILES['file1']['tmp_name'], "files/" . $_FILES['file1']['name']); //move file to specifice directory to be read 
        $file = fopen("files/" . $_FILES['file1']['name'], "r") or die("Unable to open file!"); //open file to read
        $tru = "truncate table upload_test"; //query string to truncate table(clear all data from table) 
        mysql_query($tru) or die(mysql_error()); //execute query to delete all data from table
        while (!feof($file)) {//check if not yet end of files while reading data
            $line = fgets($file); //get data from selected file
            /* for($i=0;$i<=count($str)-1;$i++){
              $val[$i] = ",'".$str[$i]."'";
              if($i==0){
              $fieldf = substr($val[$i],-(strlen($val[$i])-1));
              $sql1="insert into upload_test(name) values($fieldf)";//query string
              }else{
              $fieldall=$val[$i];
              $sql="insert into upload_test(address,phone) values($fieldall)";//query string
              echo $fieldall;
              }

              } */
            $values = str_replace($terminated, "','", $line); //we use str_replace to replace the character we want to terminated to seperate the table columns
            $sql = "insert into films values('$values')"; //query string
//            mysql_query($sql); //execute query insert data to database
            $conn->query($sql);
        }
        fclose($file); //close the file after read
        unlink("files/" . $_FILES['file1']['name']); //delete selected file after read to free up space
        //or you can move it to backup table is fine
    } else {
        echo "Please select only text file(.txt file is recomended)!";
        //if file type doesn't allow we will return this message
    }
}
?>