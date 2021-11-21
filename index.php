<?php
   // iekļauju <head> html tagu
      include "header.php";
      ?>
<body>
   <div class="container">
      <div class="row">
         <div class="col-md-12 mt-5">
            <h1 class="text-center">Darāmo lietu saraksts</h1>
            <br />
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <table class="table table-borderless">
               <!-- attēloju datubāzes ierakstus -->
               <tbody>
                  <?php
                     include 'model.php';
                     //izveido objektu un ar funkciju attēlo visus datubāzē pieejamos ierakstus:                     
                     $model = new Model();
                     $rows = $model->fetch();
                     if(!empty($rows))
                         { foreach($rows as $row)
                             {?>
                  <tr>
                     <td class="h4">
                        <input type="checkbox" name="izpildits" value="" />
                        <?php echo $row['virsraksts']; ?>
                     </td>
                     <td>
                        <!-- Nepieciešama fetch_days_ago() funkcija --><?php echo "Šodien"; ?>
                     </td>
                  </tr>
                  <tr>
                     <td><?php echo $row['apraksts']; ?></td>
                     <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="badge badge-warning">Labot</a>
                     </td>
                  </tr>
                  <tr>
                     <td></td>
                     <td></td>
                  </tr>
                  <?php
                     }
                     }else{
                     echo "Nav vēl ievadīts neviens uzdevums";
                     }
                     
                     ?>
               </tbody>
            </table>
            <form action="/add_new.php" method="get" id="add_new"></form>
            <button class="btn btn-secondary float-right" type="submit" form="add_new" value="Submit">Pievienot jaunu</button>
         </div>
      </div>
   </div>
</body>
<?php
   include "footer.php";
   ?>