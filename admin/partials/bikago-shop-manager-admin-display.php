<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://codepixelzmedia.com.np
 * @since      1.0.0
 *
 * @package    Bikago_Shop_Manager
 * @subpackage Bikago_Shop_Manager/admin/partials
 */
?>

<H1>Import CSV</H1>
<p>Please upload CSV file here for Bikago QR Codes.</p>
<table width="600">
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>/?post_type=bsm_product&page=bikago-import-csv" method="post" enctype="multipart/form-data">

<tr>
<td width="20%">Select file</td>
<td width="80%"><input type="file" name="file" id="file" /></td>
</tr>

<tr>
<td>Submit</td>
<td><input type="submit" name="submit" /></td>
</tr>

</form>
</table>


<?php 
if ( isset($_POST["submit"]) ) {

   if ( isset($_FILES["file"])) {

            //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

        }
        else {
                 //Print file details
             echo "Upload: " . $_FILES["file"]["name"] . "<br />";
             echo "Type: " . $_FILES["file"]["type"] . "<br />";
             echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
             echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

                 //if file already exists
             if (file_exists("upload/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists. ";
             }
             else {
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
            $storagename = "uploaded_file.txt";
            move_uploaded_file($_FILES["file"]["tmp_name"], BIKAGO_SHOP_MANAGER_UPLOAD . $storagename);
            echo "Stored in: " . BIKAGO_SHOP_MANAGER_UPLOAD . $_FILES["file"]["name"] . "<br />";
            }
        }
     } else {
             echo "No file selected <br />";
     }
}

if ( isset($storagename) && $file = fopen( BIKAGO_SHOP_MANAGER_UPLOAD . $storagename , "rw" ) ) {

    echo $storagename;

    echo "File opened.<br />";

    $firstline = fgets ($file, 4096 );
        //Gets the number of fields, in CSV-files the names of the fields are mostly given in the first line
    $num = strlen($firstline) - strlen(str_replace(";", "", $firstline));

        //save the different fields of the firstline in an array called fields
    $fields = array();
    $fields = explode( ";", $firstline, ($num+1) );

    $line = array();
    $i = 0;

        //CSV: one line is one record and the cells/fields are seperated by ";"
        //so $dsatz is an two dimensional array saving the records like this: $dsatz[number of record][number of cell]
    $count = 1;
    while ( $line[$i] = fgets ($file, 4096) ) {
    	$bikago_image_arr= [];
        $dsatz[$i] = array();
        $dsatz[$i] = explode( ";", $line[$i], ($num+1) );

        $bikago_image_arr = explode( ",", $dsatz[$i][0] );
        $image_url = $bikago_image_arr[2];
        $pathinfo = pathinfo($image_url);
        $image_name = $pathinfo['filename'].'.'.$pathinfo['extension'];

        $bikago_qr = array(
           'post_title'    => $bikago_image_arr[1],
           'post_status'   => 'draft',           // Choose: publish, preview, future, draft, etc.
           'post_type' => 'bsm_qrcode',  //'post',page' or use a custom post type if you want to
           'meta_input'   => array(
                'image_url' => $bikago_image_arr[2],
                'package_name' => $bikago_image_arr[0]
            ),
        );

       // show the email in meta box
        $pid = wp_insert_post($bikago_qr);
        $count++;

        $i++;
    }

}