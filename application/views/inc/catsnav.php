<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<ul>
                
           <?php     if(count($navlist)){
                 foreach ($navlist as $key => $value) {
                    echo "<li>";
                     echo anchor('welcome/cat/'.$key, $value);
                      echo "</li>";
                }}?>
            </ul>  
