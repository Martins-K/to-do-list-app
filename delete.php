<?php
   include 'model.php';
   //izveido objektu un ar objekta funkciju izdzēš rindiņu datubāzes tabulā rindu ar konkrēto ID:
   $model = new Model();
   $id = $_REQUEST['id'];
   $delete = $model->delete($id);
   //Ja uzdevums ir izdzēsts, lietotājam parāda paziņojumu
   if ($delete) {
       echo "<script>alert('Uzdevums veiksmīgi izdzēsts!');</script>";
       echo "<script>window.location.href = 'index.php';</script>";
   }
   
   ?>