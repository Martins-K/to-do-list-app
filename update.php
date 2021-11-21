<?php
   include 'model.php';
   $model = new Model();
   $id = $_REQUEST['id'];
   $row = $model->edit($id);
   // man nesaglabājas vērtības $_POST masīvā, tāpēc izvadu šo paziņojumu:
   echo $_POST;
   echo "\$_POST masīvā nesaglabājas vērtības, kas nepieciešamas uzdevuma datubāzes ieraksta atjaunināšanai";

?>