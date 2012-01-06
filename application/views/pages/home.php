<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

	
		<h2><?php echo $title; ?></h2>
                <figure>
                <img src="<?php echo $mainf['image'];?>"  alt="<?php echo $mainf['name'];?>" width="225px"/>
                <figcaption><?php echo $mainf['shortdesc'];?></figcaption>
                </figure>
                <?php 
                
                echo anchor('welcome/product/'.$mainf['id'],'see details',
                        array("class"=>'btn'));
                
                echo anchor('welcome/cart/'.$mainf['id'],'buy now',
                        array("class"=>'btn buy'));
                
                
                
                ?>
               
                
                 