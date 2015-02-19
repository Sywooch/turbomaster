      <table class="bordered keg">
        <thead>
          <tr>
            <th>№ <i class="nowrap">п/п</i></th>
            <th>Номер турбины</th>
            <th>Взаимозаменяемость</th>
            <th>Применение</th>
            <th>Состояние</th>
            <th>Производитель</th>
            <th>Цена, руб.</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        foreach($products as $key => $product) {  ?>
          <tr>
            <td><?= $key+1 ?></td>
            <td><?= $product['partnumber'] ?></td>
            <td><?= str_replace(',', ' / ', $product['interchange']) ?></td>
            <td><?= $product['brand_name'] ?></td>
            <td class="nowrap">Оборотный ТК</td>
            <td><?= $product['manufacturer_name'] ?></td>
            <td><?= $product['price'] ?></td>
          </tr>
<?php   }  ?>
        </tbody>

      </table>