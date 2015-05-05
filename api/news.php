<?php
class news {
   
    /**
     * @param int $n1 {@from path}
     *
     * @return array
     *
     * @smart-auto-routing false
     */
	function newspage($n1 = 0) {
	  include('OnlyConnection.php');  
      if ($n1 > 0) {
         $sql = "SELECT  * from sporenet_articles where (type = 2) and ID=".$n1;
      } else   {
         $sql = "SELECT  * from sporenet_articles where (type = 2) ";
      }
      $result = mysqli_query($db, $sql);
      if (!$result) {throw new Exception("Fehler im SQL-Kommando: $sql");};
      while($row = $result->fetch_array())
      {
        $RESdata[] = $row;
        
      }
      return $RESdata;
	}
}

