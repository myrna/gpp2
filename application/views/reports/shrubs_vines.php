<h2>Shrubs and Vines</h2>
<?php
 if ($shrubs_vines['query']->num_rows() > 0)
     {
         
         foreach ($shrubs_vines['query']->result() as $row)
         {
              echo $row->display_full_botanical_name;
              echo $row->status;
              echo $row->gpp_history;
              echo $row->nominator;

         }
     }
 ?>

