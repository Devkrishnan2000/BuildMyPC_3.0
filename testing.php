<?php
       session_start();
             
       if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $con = mysqli_connect("localhost","root","","buildmypc");
        if(!$con)
        die("Connection Failed".mysqli_connect_error());
        $sql = "select preid from prebuild_table";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0)
         {
                 $i=0;
                 $idarr = array();
           while($row=$result->fetch_assoc())
           {
                $idarr[$i] = $row["preid"];
                $i++;
           }
           
        } 
        foreach($idarr as $id)
        {
                if (isset($_POST[$id])) {
                        $sql = "select prename from prebuild_table where preid =".$id."";
                        $result = mysqli_query($con,$sql);
                        $row=$result->fetch_assoc();
                        $title = $row["prename"];
                        mysqli_close($con);
                         // btnDelete 
                       } else {
                         // Assume btnSubmit 
                       }
        }
        
      }
              ?>