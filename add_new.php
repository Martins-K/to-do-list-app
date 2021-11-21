<?php
   include "header.php";
   ?>
<body>
   <div class="container">
      <div class="row">
         <div class="col-md-12 mt-5">
            <h1>Darāmo lietu saraksts</h1>
            <h2>Pievienot jaunu</h2>
         </div>
      </div>
      <div class="row">
         <div class="col-md-10 mx-auto">
            <?php
               include "model.php";
               //izveido objektu un ar objekta funkciju izveido jaunu ierakstu datubāzē                 
               $model = new Model();
               $insert = $model->insert();
               ?>
            <form action="" method="post">
               <div class="form-group">
                  <label for="heading">Virsraksts:</label>
                  <input type="text" name="heading" class="form-control" placeholder="Virsraksts" required oninvalid="this.setCustomValidity('Darāmās lietas virsraksts ir obligāti jāaizpilda!')" />
               </div>
               <div class="form-group">
                  <label for="">Apraksts:</label>
                  <input type="text" name="description" style="height: 100px;" class="form-control" placeholder="Apraksts" />
               </div>
               <!--Šeit gribēju pievienot datuma lauku, kas ielasītos $_POST masīvā ar atslēgu "date", kuru pēc tam varētu padot uz datubāzi ar PHP. Domāju ar javascript varētu aizpildīt lauku ar šīsdienas datumu, bet man nesanāca izveidot funkciju: -->
               <!-- <div class="form-group">
                  <label for=""></label>
                  <input type="date" name="date" class="form-control" hidden value="" />
                  </div> -->
               <div class="form-group">
                  <label for=""><input type="checkbox" name="status" checked hidden value="false"/></label>
               </div>
               <div class="form-group">
                  <button type="submit" name="back" class="btn btn-outline-secondary">
                  <a href="index.php">Doties atpakaļ</a>
                  </button>
               </div>
               <div class="form-group">
                  <button type="submit" name="add" class="btn btn-outline-success">
                  Pievienot
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</body>
<?php
   include "footer.php";
   ?>