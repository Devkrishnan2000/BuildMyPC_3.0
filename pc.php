<?php
       session_start();
       header('Content-Type: text/html; charset=ISO-8859-1');
             
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
                        $sql = "select * from prebuild_table where preid =".$id."";
                        $result = mysqli_query($con,$sql);
                        $row=$result->fetch_assoc();
                        $title = $row["prename"];
                        $pcpic = $row["prepic"];
                        getcpudata($con,$row["cpuid"]);
                        getmobodata($con,$row["mobid"]);
                        getramdata($con,$row["ramid"]);
                        getgpudata($con,$row["gpuid"]);
                        getstodata($con,$row["storageid"]);
                        getpsudata($con,$row["psuid"]);
                        mysqli_close($con);
                         // btnDelete 
                       } else {
                         // Assume btnSubmit 
                       }
        }
        
      }

            function getcpudata($connection,$cpuid)
            {
                $cpusql = "Select * from cpu_table where cpuid =".$cpuid."";
                $result = mysqli_query($connection,$cpusql);
                $cpurow = $result->fetch_assoc();
                
                $_SESSION["cpuname"]= $cpurow["cpuname"];
                $_SESSION["cpubrand"] = $cpurow["cpubrand"];
                $_SESSION["cpucore"] = $cpurow["cpucore"];
                $_SESSION["cputhread"] =$cpurow["cputhread"];
                $_SESSION["cpuclock"] =$cpurow["cpuclock"];
                $_SESSION["cputdp"] =$cpurow["cputdp"];
            }

            function getmobodata($connection,$mobid)
            {
                $mobosql = "select * from mobo_table where mobid =".$mobid."";
                $result = mysqli_query($connection,$mobosql);
                $moborow = $result->fetch_assoc();

                $_SESSION["mobname"] =$moborow["mobname"];
                $_SESSION["mobchipset"] =$moborow["mobchipset"];
                $_SESSION["mobsata"] =$moborow["mobsata"];
                $_SESSION["mobm.2"] =$moborow["mobm.2"];
                $_SESSION["mobpci"] =$moborow["mobpci"];
            }

            function getramdata($connection,$ramid)
            {
                $ramsql = "select * from ram_table where ramid=".$ramid."";
                $result = mysqli_query($connection,$ramsql);
                $ramrow = $result->fetch_assoc();

                $_SESSION["ramname"] =$ramrow["ramname"];
                $_SESSION["rambrand"] =$ramrow["rambrand"];
                $_SESSION["ramfreq"] =$ramrow["ramfreq"];
                $_SESSION["ramtype"] =$ramrow["ramtype"];

                if($ramrow["buffered"]==0)
                $_SESSION["buffered"] = "Unbuffered";
                else
                $_SESSION["buffered"] = "Buffered";

                if($ramrow["ecc"]==0)
                $_SESSION["ecc"] = "Non ECC";
                else
                $_SESSION["ecc"] = "ECC";
            }

            function getgpudata($connection,$gpuid)
            {
                $gpusql = "select * from gpu_table where gpuid=".$gpuid."";
                $result = mysqli_query($connection,$gpusql);
                $gpurow = $result->fetch_assoc();

                $_SESSION["gpuname"] =$gpurow["gpuname"];
                $_SESSION["gpubrand"] =$gpurow["gpubrand"];
                $_SESSION["gpuvram"] =$gpurow["gpuvram"];
                $_SESSION["gpuvramtype"] =$gpurow["gpuvramtype"];
                $_SESSION["gputdp"] =$gpurow["gputdp"];
            }

            function getstodata($connection,$storageid)
            {
                $stosql = "select * from storage_table where storageid=".$storageid."";
                $result = mysqli_query($connection,$stosql);
                $storow = $result->fetch_assoc();

                $_SESSION["storagename"] =$storow["storagename"];
                $_SESSION["storagebrand"] =$storow["storagebrand"];
                $_SESSION["storagecapacity"] =$storow["storagecapacity"];
                $_SESSION["storagetype"] =$storow["storagetype"];
            }

            function getpsudata($connection,$psuid)
            {
                $psusql = "select * from psu_table where psuid=".$psuid."";
                $result = mysqli_query($connection,$psusql);
                $psurow = $result->fetch_assoc();

                $_SESSION["psuname"] =$psurow["psuname"];
                $_SESSION["psuwatt"] =$psurow["psuwatt"];
                $_SESSION["psurating"] =$psurow["psurating"];
            }

            
            
              ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Assets/Styles/pcpage.css" />
    <title>PC page</title>
</head>

<body>
    <div class="image-section">
        <div class="content-section">
            <?php echo " <p class='pc-title'>".$title."</p>";
                echo "<img class='pc-image' src='".$pcpic."' />";
           ?>
            <p class="pc-price"> MRP &#x20B9 50,000.00</p>
            <div class="button-border">
                <div class="button">
                    <p>CUSTOMIZE</p>
                </div>
            </div>
            <div class="button-border">
                <div class="button">
                    <p>BUY NOW</p>
                </div>
            </div>
        </div>
        <svg class="wedge" width="226" height="1080" viewBox="0 0 226 1080" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0H112.507L226 1563H0V0Z" fill="white" />
        </svg>
    </div>
    <div class="spec-section">
        <p class="spec-title">Spec Sheet</p>
        <div class="spec-cards">
            <div class="row">
                <div class="card">
                    <?php
                       $cpuname = $_SESSION["cpuname"];
                       $cpubrand= $_SESSION["cpubrand"];
                       $cpucore = $_SESSION["cpucore"];
                       $cputhread =$_SESSION["cputhread"];
                       $cpuclock =$_SESSION["cpuclock"];
                       $cputdp =$_SESSION["cputdp"];
                       echo "
                       <p class='card-header'>CPU</p>
                       <p class='card-list bold'>".$cpubrand." ".$cpuname."</p>
                       <p class='card-list'>".$cpucore." core | ".$cputhread." Threads</p>
                       <p class='card-list'>".$cpuclock." GHz Base Clock</p>
                       <p class='card-list'>".$cputdp."W TDP</p>
                       ";
                    ?>

                </div>
                <div class="card">
                <?php
                       $mobname = $_SESSION["mobname"];
                       $mobchipset= $_SESSION["mobchipset"];
                       $mobsata = $_SESSION["mobsata"];
                       $mobm2 =$_SESSION["mobm.2"];
                       $mobpci =$_SESSION["mobpci"];
                       echo "
                       <p class='card-header'>Motherboard</p>
                       <p class='card-list bold'>".$mobname."</p>
                       <p class='card-list'>".$mobchipset." Chipset</p>
                       <p class='card-list'>".$mobsata." SATA | ".$mobm2." M.2 Slot</p>
                       <p class='card-list'>".$mobpci." PCI-E x 16 slot</p>
                       ";
                    ?>
                </div>
                <div class="card">
                <?php
                       $ramname = $_SESSION["ramname"];
                       $rambrand= $_SESSION["rambrand"];
                       $ramfreq = $_SESSION["ramfreq"];
                       $ramtype =$_SESSION["ramtype"];
                       $buffered=$_SESSION["buffered"];
                       $ecc=$_SESSION["ecc"];
                       echo "
                       <p class='card-header'>RAM</p>
                       <p class='card-list bold'>".$rambrand." ".$ramname."</p>
                       <p class='card-list'>".$ramtype." | ".$ramfreq." MHz</p>
                       <p class='card-list'>".$buffered."</p>
                       <p class='card-list'>".$ecc."</p>
                       ";
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="card">
                <?php
                       $gpuname = $_SESSION["gpuname"];
                       $gpubrand= $_SESSION["gpubrand"];
                       $gpuvram = $_SESSION["gpuvram"];
                       $gpuvramtype =$_SESSION["gpuvramtype"];
                       $gputdp=$_SESSION["gputdp"];
                       echo "
                       <p class='card-header'>GPU</p>
                       <p class='card-list bold'>".$gpuname."</p>
                       <p class='card-list'>".$gpuvram." GB | ".$gpuvramtype." MHz</p>
                       <p class='card-list'>".$gputdp." W</p>
                       ";
                    ?>
                </div>
                <div class="card" >
                <?php
                       $storagename = $_SESSION["storagename"];
                       $storagebrand= $_SESSION["storagebrand"];
                       $storagecapacity = $_SESSION["storagecapacity"];
                       $storagetype =$_SESSION["storagetype"];
                       echo "
                       <p class='card-header'>Storage</p>
                       <p class='card-list bold'>".$storagebrand." ".$storagename."</p>
                       <p class='card-list'>".$storagecapacity." GB</p>
                       <p class='card-list'>".$storagetype."</p>
                       ";
                    ?>
                </div>
                <div class="card">
                <?php
                       $psuname = $_SESSION["psuname"];
                       $psuwatt = $_SESSION["psuwatt"];
                       $psurating =$_SESSION["psurating"];
                       echo "
                       <p class='card-header'>PSU</p>
                       <p class='card-list bold'>".$psuname."</p>
                       <p class='card-list'>".$psurating."</p>
                       <p class='card-list'>".$psuwatt." W</p>
                       ";
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();
</script>

</html>