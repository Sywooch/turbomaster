<?php

$count = count($facts);
$loops = floor($count/2); 

if($count > 0 ) { 
    for($i = 0; $i < $loops; $i++) {
        $class = ($i == 0) ? ' active' : '';
        echo '<div class="pane-item' .$class .'">';

        for($k = 0; $k < 2; $k++) {
            $index = $i * 2 + $k;
            ?>
            <blockquote<?php if($k == 1) echo ' style="margin-top: 30px;"'; ?>><?= $facts[$index]['content'] ?></blockquote>
        <?php    
        }
        echo '</div>';
    } 
}