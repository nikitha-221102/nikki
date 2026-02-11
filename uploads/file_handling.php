<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP File Functions</title>
</head>
<body>
    <h2>PHP File Functions Demonstration</h2>
    <?php 
    //basic file functions:
    $name="data.txt";
    //Write file
    $fp=fopen($name,"w");
    fwrite($fp, "Hello Ganapathi!\n");
    fwrite($fp,"This is PHP File Handling Demo.\n");
    fclose($fp);
    echo "<b>Data written using fopen() and fwrite()<br><br>";
    //Append data
    file_put_contents($name, "jai Bolo Ganesh Maharaj ki jai\n",FILE_APPEND);
    echo "<b>Data appended using file_put_contents()</b></b></b>";
    if(file_exists($name)){
        echo "<h3>Reading File Dat</h3>";
        $fp=fopen($name,"r");
        echo"<b>Using fread():</b><br>";
        echo nl2br(fread($fp, filesize($name)));
        fclose($fp);
        echo "<br><br>";
        echo"<b>Using file() (line by line):</b></br>";
        $arr=file($name);
        foreach($arr as $line){
            echo nl2br($line);
        }
    }
    //file info
    echo"<h3>File Information</h3>";
    echo "File Exists:".(file_exists($name)?"yes":"no")."<br>";
    echo "File size:".filesize($name)."bytes<br>";
    echo "File Type:".filetype($name)."<br>";
    echo "Last Access:".date("Y-m-d H:i:s",fileatime($name))."<br>";
    echo "Last Modified:".date("Y-m-d H:i:s",filemtime($name))."<br>";
    echo "Creation Time:".date("Y-m-d H:i:s",filectime($name))."<br>";
    echo "Permissions:".substr(sprintf('%o',fileperms($name)),-4)."<br>";
    echo "Owner ID:".fileowner($name)."<br>";
    echo "Group ID:".filegroup($name)."<br>";
    echo "Inode Number:".fileinode($name)."<br><br>";
    //file and folder management:
    echo "<h2>PHP File & Folder Management Demo</h2>";
    $dir="testfolder";
    //create folder
    if(!is_dir($dir)){
        mkdir($dir);
        echo "Folder created: $dir <br>";
    }
    //show current directory:
    echo "Current Directory:".getcwd()."<br>";
    //change directory:
    chdir($dir);
    echo "changed Directory:".getcwd()."<br><br>";
    //create file with locking:
    $file="sample.txt";
    $f=fopen($file,"w");
    flock($f,LOCK_EX);
    fwrite($f,"Hello Ganapathi!\n");
    fwrite($f,"Learning PHP file handling.");
    flock($f,LOCK_UN);
    fclose($f);
    echo "File created and written.<br><br>";
    //dispaly content:
    echo "<b>File Content:</b></br>";
    echo nl2br(file_get_contents($file));
    echo "<br><br>";
    //file info:
    echo "Is File:".(is_file($file)?"Yes" : "No")."<br>";
    echo "File Size:".filesize($file)."bytes<br>";
    echo "File Type:".filetype($file)."<br>";
    echo "Last Access:".date("Y-m-d H:i:s",fileatime($file))."<br>";
    echo "Last Modified:".date("Y-m-d H:i:s",filemtime($file))."<br>";
    echo "Permissions:".substr(sprintf('%o',fileperms($file)),-4)."<br><br.";
    //copy and rename:
    copy($file,"copy.txt");
    echo "File copied.<br>";
    rename("copy.txt","newname.txt");
    echo "File renamed.<br><br>";
    //directory listing:
    echo "<b>Files using scandir():</b><br>";
    $list = scandir(".");
    foreach ($list as $x){
        echo $x."<br>";
    }
    echo "<br><b>Files using opendir():</b><br>";
    $d=opendir(".");
    while(($y=readdir($d))!==false){
        echo $y."<br>";
    }
    closedir($d);
    echo "<br>";
    //deleate renamed file:
    unlink("newname.txt");
    echo "Renamed file deleted.<br><br>";
    //return to parent folder:
    chdir("..");
    echo "Returned Directory:".getcwd()."<br>";
    //deleate folder safely:
    unlink($dir ."/sample.txt");
    rmdir($dir);
    echo "Folder deleted.<br>";
    ?>
    
    <!-- task3 -->

    <?php
    $file="data.txt";
    fopen($file,"w");  //write
    fopen($file,"a");  //append
    fopen($file,"r");  //read
    fopen($file,"r+");  //read & write
    fopen($file,"w+");  //write and read
    fopen($file,"a+");  //append & read
    fopen("newfile.txt","x");//Create new
    fopen("newfile2.txt","x+");//create new read+write
    echo "ALl file modes executed successfully!";
    ?>


</body>
</html>