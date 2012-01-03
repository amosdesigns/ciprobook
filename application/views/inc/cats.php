<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
 <?php 
 
foreach ($sidef as $key => $value) {
                echo "<figure>";
     
                 echo "<img src='";
                 echo $value['thumbnail'];
                 echo "'  alt='";
                 echo $value['name'];
                 echo "' width='85px' />";
                 
                echo "<figcaption>".$value['name']."</figcaption>";
                echo "</figure>";
                echo anchor('welcome/product/'.$value['id'],'see details',
                        array("class"=>'smallbtn'));
                
                 echo anchor('welcome/cart/'.$value['id'],'buy now',
                        array("class"=>'smallbtn buy'));
                
}
 
 
 
 ?>