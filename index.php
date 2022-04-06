<?php
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuildmyPC.in</title>
    <link rel="stylesheet" href="Assets/Styles/homepage.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <div class="navbar">
        <div class="brand">
            <p>BuildmyPC.in</p>
        </div>
        <div class="nav-items">
            <a href="www.google.com">PRE BUILDS</a>
            <a href="www.google.com">CUSTOM PC</a>
            <a href="www.google.com">ABOUT US</a>
            <a href="login.php" class="backfontcolor">LOGIN</a>
        </div>
    </div>

    <div class="header-section">
        <div class="titles">
            <h1>Your PC<br>
                <span>Your Choice..</span>
            </h1>
            <h2>Order a PC that is customised to your <br> needs both in performance <br> and asthetics.</h2>
            <div>
                <a href="sdjfds">START YOUR BUILD NOW</a>
            </div>

        </div>
        <div class="ref-image">
            <img src="Assets/Styles/Images/ref-images/main-image.png" height="1200px" />
        </div>
    </div>
    <div class="section-2">
        <svg width="1908" height="424" viewBox="0 0 1908 424" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="wedge-svg">
            <path d="M0 0L1908 260V424H0V0Z" fill="white" />
        </svg>

        <div class="product-section" id="build-section">
            <h2 data-aos='zoom-in-left' data-aos-duration='2000'>Entry Level Builds</h2>
            <div class="underline" style="--width: 510px" data-aos='zoom-in-left' data-aos-duration='2000'></div>
            <h3 data-aos='zoom-in-left' data-aos-duration='2000'>Bang for the buck PC's which can deliver good enough
                performance.</h3>
            <div class="carousel">
                <div class="carousel-inner">
                    <div class="track" id="sec_track">

                        <?php
          getdb("select * from prebuild_table where pretier=1");
        ?>

                    </div>
                </div>


                <div class="nav">
                    <button class="left" id="sec_prev">
                        <img src="Assets/Styles/Buttons/left.svg" alt="" data-aos='flip-left' data-aos-duration='1000'>
                    </button>
                    <button class="right" id="sec_next">
                        <img src="Assets/Styles/Buttons/right.svg" alt="" data-aos='flip-right'
                            data-aos-duration='1000'>
                    </button>
                </div>
            </div>

            <div class="midrange-section">
                <h2 data-aos='zoom-in-left' data-aos-duration='2000'>Mid Range Builds</h2>
                <div class="underline" style="--width: 510px" data-aos='zoom-in-left' data-aos-duration='2000'></div>
                <h3 data-aos='zoom-in-left' data-aos-duration='2000'>Better performance for reasonable price.</h3>
                <div class="carousel">
                    <div class="carousel-inner">
                        <div class="track" id="sec2_track">

                            <?php
             getdb("select * from prebuild_table where pretier=2");
        ?>

                        </div>
                    </div>


                    <div class="nav">
                        <button class="left" id="sec2_prev">
                            <img src="Assets/Styles/Buttons/left.svg" alt="" data-aos='flip-left'
                                data-aos-duration='1000'>
                        </button>
                        <button class="right" id="sec2_next">
                            <img src="Assets/Styles/Buttons/right.svg" alt="" data-aos='flip-right'
                                data-aos-duration='1000'>
                        </button>
                    </div>
                </div>

            </div>

            <div class="midrange-section">
                <h2 data-aos='zoom-in-left' data-aos-duration='2000'>Flagship level Builds</h2>
                <div class="underline" style="--width: 600px" data-aos='zoom-in-left' data-aos-duration='2000'></div>
                <h3 data-aos='zoom-in-left' data-aos-duration='2000'>Best of the best features and performance.</h3>
                <div class="carousel">
                    <div class="carousel-inner">
                        <div class="track" id="sec3_track">

                            <?php
            getdb("select * from prebuild_table where pretier=3");
         ?>

                        </div>
                    </div>


                    <div class="nav">
                        <button class="left" id="sec3_prev">
                            <img src="Assets/Styles/Buttons/left.svg" alt="" data-aos='flip-left'
                                data-aos-duration='1000'>
                        </button>
                        <button class="right" id="sec3_next">
                            <img src="Assets/Styles/Buttons/right.svg" alt="" data-aos='flip-right'
                                data-aos-duration='1000'>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    </div>
    <div class="footer">
        <h1 class="heading">About Us</h1>
        <div class="underline"></div>
        <div class="sub-class">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
            has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
            type and scrambled it to make a type specimen book.</div>
    </div>


</body>
<script src="Assets/javascript/carousel.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();
</script>

</html>

<?php
       
      
               function getdb($sql)
               {
                $con = mysqli_connect("localhost","root","","buildmypc");
                if(!$con)
                die("Connection Failed".mysqli_connect_error());
                $result = mysqli_query($con,$sql);
                $wrdarr = array();
                
                 if(mysqli_num_rows($result)>0)
                 {
                   while($row=$result->fetch_assoc())
                   {
                     
                    $wrdarr = explode(" ",$row["prename"]);
                    echo " <a class='linkcard'  data-aos='zoom-in' data-aos-duration='2000'>
                    <div class='card-container'>
                   
                    <form method ='post' action='pc.php'>
                    <button class='card' name='".$row["preid"]."'>
                    <img src='".$row["prepic"]."'>
                      <p class='prodname'><span>".$wrdarr[0]."</span> ".$wrdarr[1]."</p> ";
                       $cpuid = $row["cpuid"];
                       $gpuid = $row["gpuid"]; 
                       $ramid = $row["ramid"];
                       $storageid = $row["storageid"];
                       $getcpu = "select cpuname from cpu_table where cpuid='".$cpuid."'";
                       $cpures = mysqli_query($con,$getcpu);
                       $cpu = mysqli_fetch_assoc($cpures);

                      $getgpu = "select gpuver from gpu_table where gpuid='".$gpuid."'";
                      $gpures = mysqli_query($con,$getgpu);
                      $gpu = mysqli_fetch_assoc($gpures);

                       $getram = "select ramcapacity,ramtype,ramfreq from ram_table where ramid='".$ramid."'";
                       $ramres = mysqli_query($con,$getram);
                       $ram = mysqli_fetch_assoc($ramres);

                     $getstore = "select storagecapacity,storagetype from storage_table where storageid='".$storageid."'";
                      $stores = mysqli_query($con,$getstore);
                       $storage = mysqli_fetch_assoc($stores);
                      echo "
                      <ul class='specsheet'>
                        <li>".$cpu["cpuname"]."</li>
                        <li>".$ram["ramcapacity"]."GB ".$ram["ramtype"]." ".$ram["ramfreq"]." MHz</li>
                        <li>".$gpu["gpuver"]."</li>
                        <li>".$storage["storagecapacity"]." GB ".$storage["storagetype"]."</li>
                      </ul>
                      <div class='price-container'>
                        <p class='price'>&#x20B9 ".$row["price"]."</p>
                      </div>
                    </button>
                    </form>
                  </div> </a> 
                  ";
                   }
                 }
               }

             
               
              ?>