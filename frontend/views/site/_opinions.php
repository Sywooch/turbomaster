<?php

$count = count($items);
$loops = floor($count/2); 

if($count > 0 ) { 
    for($i = 0; $i < $loops; $i++) {
        $class = ($i == 0) ? ' active' : '';
        echo '<div class="pane-item' .$class .'">';

        for($k = 0; $k < 2; $k++) {
            $index = $i * 2 + $k;
            ?>
            <blockquote<?php if($k == 1) echo ' style="margin-top: 30px;"'; ?>><?= $items[$index]['content'] ?></blockquote>
            <p style="font: italic bold 15px Arial,sans-serif; color: #b04340; margin: -20px 0 0 16px;"><?= $items[$index]['name'] ?><?php 
            if(!empty($items[$index]['city'])) { echo ', ' .$items[$index]['city'];
            } ?></p>
        <?php    
        }
        echo '</div>';
    } 
}