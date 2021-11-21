<?php
   include "header.php";
   ?>
<body>
   <div class="container">
      <div class="row">
         <div class="col-md-12 mt-5">
            <h1>Darāmo lietu saraksts</h1>
            <h2>Labot</h2>
         </div>
      </div>
      <div class="row">
         <div class="col-md-10 mx-auto">
            <?php
               include 'model.php';
               //izsauc funkciju, kas ievada datubāzē aizpildītos laukus no formas:                
               $model = new Model();
               //paņem konkrētā uzdevuma ID:                              
               $id = $_REQUEST['id'];
               //izsauc funckiju, kas atrod un atgriež konkrēto uzdevumu (pēc ID) kā masīvu:
               $row = $model->edit($id);
               var_dump($_POST);
               
               // ja ir nospiesta poga: 
               if (isset($_POST['update'])) {
               // ja apraksta laukā ir vērtība:  
               if (isset($_POST['virsraksts'])) {
               // ja apraksta lauks nav tukšs                  
                 if (!empty($_POST['virsraksts'])) {
               // piešķir vērtības mainīgajiem ar formas datiem:                    
                   $data['id'] = $id;
                   $data['virsraksts'] = $_POST['virsraksts'];
                   $data['apraksts'] = $_POST['apraksts'];
               // izsauc uzdevuma lauku atjaunošanas funkciju:
                   $update = $model->update($data);
               // ja izdevās atjaunot uzdevuma laukus, tad parāda paziņojumu un aizved uz index lapu
                   if($update){
                     echo "<script>alert('Uzdevums veiksmīgi atjaunots!');</script>";
                     echo "<script>window.location.href = 'index.php';</script>";
                   }
               // ja neizdevās atjaunot uzdevuma laukus, tad parāda paziņojumu un aizved uz index lapu
                   else{
                     echo "<script>alert('Uzdevumu neizdevās atjaunot!');</script>";
                     echo "<script>window.location.href = 'index.php';</script>";
                   }
               // ja izdevās atjaunot uzdevuma laukus, tad parāda paziņojumu un aizved uz index lapu
                 }else{
                   echo "<script>alert(Lūdzu, ievadi visas vērtības!);</script>";
                   header("Location: edit.php?id=$id");
                 }
               }
               }
               
               ?>
            <form action="" method="post">
               <div class="form-group">
                  <label for=""><strong>Virsraksts:</strong></label>
                  <!--ja laukam nav vērtības, tad izmanto placeholder vērtību. citādāk objekts atgriež lauka vērtības  -->
                  <input type="text" name="heading" class="form-control" value="<?php echo $row['virsraksts']; ?>" placeholder="Virsraksts" />
               </div>
               <div class="form-group">
                  <label for=""> <strong>Apraksts:</strong></label>
                  <!--ja laukam nav vērtības, tad izmanto placeholder vērtību. citādāk objekts atgriež lauka vērtības:  -->
                  <input type="text" name="description" style="height: 100px;" class="form-control" value="<?php echo $row['apraksts']; ?>" placeholder="Apraksts" />
               </div>
               <div class="form-group">
                  <button type="submit" name="back" class="btn btn-outline-secondary">
                  <a href="index.php">Doties atpakaļ</a>
                  </button>
               </div>
               <div class="form-group">
                  <button type="submit" name="delete" class="btn btn-outline-danger">
                     <!--izmantojot konkrēto uzdevuma ID, aiziet uz lapu, izveido objektu un ar objekta funkciju izdzēš ieraksta laukus no datubāzes:  -->
                     <a href="delete.php?id=<?php echo $_REQUEST['id']; ?>">Dzēst</a>
                  </button>
               </div>
               <div class="form-group">
                  <button type="submit" name="update" class="btn btn-outline-success">
                  <a href="update.php?id=<?php echo $_REQUEST['id']; ?>">Saglabāt</a></button>
               </div>
            </form>
         </div>
      </div>
   </div>
</body>
<?php
   include "footer.php";
   ?>