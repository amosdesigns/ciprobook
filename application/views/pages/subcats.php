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
                                echo "' width='85px' />";
        echo "<h4>";
        
        switch ($level) {
            case "1":
                echo "<figcaption>".anchor("welcome/cat/".$value['id'],$value['name'])."</figcaption>";

                break;

            case "2":
                echo "<figcaption>".anchor("welcome/product/".$value['id'],$value['name'])."</figcaption>";
                break;
        }
         echo "</h4>\n";
         echo "<p>".$value['shortdesc']."</p>";
        }
 
 
 ?>