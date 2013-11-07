<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <link rel="stylesheet" href="style.css">
   <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300' rel='stylesheet' type='text/css'>

   <title>Localhost</title>
   <style>
     *{
         padding:0;
         margin:0;
     }


   </style>

</head>
<body>

   <div id="container">
       <?php
         // opens this directory
         $myDirectory = opendir(".");

         // gets each entry
         while($entryName = readdir($myDirectory)) {
           $dirArray[] = $entryName;
         }

         // finds extention of file
         function findexts ($filename) {
	  $exts=pathinfo($filename,PATHINFO_EXTENSION);
	  return strtoupper($exts);
	 }

         // closes directory
         closedir($myDirectory);

         //  counts elements in array
         $indexCount   = count($dirArray);

         // sorts files
         sort($dirArray);

         // print 'em
         print("<h1>Localhost Directory</h1>");
         print("<table cellspacing='0' class='table'>
                 <tr>
                   <td class='head'>Filename</td>
                   <td class='head'>Type</td>
                   <td class='head'>Size</td></tr>\n");

         // loops through the array of files and print them all
         for($index=0; $index < $indexCount; $index++) {
               if (substr("$dirArray[$index]", 0, 1) != "."){ // don't list hidden files
					if (findexts($dirArray[$index]) == strtoupper($dirArray[$index])) {
						echo "<tr><td><a class='folder' href='$dirArray[$index]'>$dirArray[$index]/</a></td>"."<td> Folder </td>"."<td>".round(filesize($dirArray[$index])/1000,2)." Mb"."</td>"."</tr>\n";
					}else{
						echo "<tr><td><a class='file' href='$dirArray[$index]'>$dirArray[$index]</a></td>"."<td>".findexts($dirArray[$index])."</td>"."<td>".round(filesize($dirArray[$index])/1000,2)." Mb"."</td>"."</tr>\n";
					}
           	   }
         }
         echo "</table>\n";
       ?>
   </div>

</body>
</html>
