<?php

//subcats page
echo '<h2>'.$category['name'].'</h2>'."\n";
echo '<p>'.$category['shortdesc'].'</p>'."\n";

foreach ($listing as $key => $value) {
        echo "<figure>";
                echo "<img src='";
                    echo $value['thumbnail'];
                        echo "'  alt='";
                            echo $value['name'];
                                echo "' width='285px' />";
        echo "<h4>";
        
        switch ($level) {
            case "1":
                echo anchor("welcome/cat/".$value['id'],$value['name']);

                break;

            case "2":
                echo anchor("welcome/product/".$value['id'],$value['name']);
                break;
        }
         echo "</h4>\n";
         echo "<p>".$value['shortdesc']."</p>";
        }
 
 
 ?>