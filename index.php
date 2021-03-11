<!doctype html>
<?php
    require ('steamauth/steamauth.php');  
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Boostrap *ยังใช้cdnอยู่-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

    <!---Jquery *ยังใช้cdnอยู่-->

   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!--font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Mitr&family=Roboto&family=Sriracha&family=Truculenta&display=swap"
        rel="stylesheet">

    <!--img logo-->
    <link rel="shortcut icon" href="pic/logo.png">
    <title>IMMORTAL CITY | Join to the best society.</title>

    <style>
        .carousel {
            padding-top: 50px;
        }

        /*
        font-family: 'Mitr', sans-serif;
        font-family: 'Roboto', sans-serif;
        font-family: 'Truculenta', sans-serif;
        font-family: 'Sriracha', cursive;
        */
    </style>







</head>

<body id="page-top">

    <!--MENU *ขาดlogin steam & dialog & ปรับแต่งให้สวยงาม-->
    <header>

        <div class="fixed-top ">
            <nav class="navbar navbar-light bg-dark">
                <div class="container">
                    <a class="navbar-brand js-scroll-trigger" href="#">
                        <!--img logo-->
                        <img src="pic/namelogo.png" alt="" width="275" height="50" class="d-inline-block align-top">

                        <!--nav menu-->
                        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                            <div class="container">
                                <a class="navbar-brand" aria-current="page-top" href="#page-top"></a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <a class="ht-tm-element btn btn-shadow text-mono btn-outline-warning active waves-effect waves-light"
                                            type="button" href="#"
                                            style="color: honeydew; background-color:#964800; margin: 10px; font-family: 'Mitr', sans-serif;">
                                            แนะนำวิธีการเล่นพื้นฐาน
                                        </a>

                                        <a class="ht-tm-element btn btn-shadow text-mono btn-outline-warning active waves-effect waves-light"
                                            type="button" href="#services"
                                            style="color: honeydew; background-color:#964800; margin: 10px; font-family: 'Mitr', sans-serif;">
                                            สิ่งที่คุณควรรู้ก่อนเริ่มเล่น
                                        </a>

                                        <a class="ht-tm-element btn btn-shadow text-mono btn-outline-warning active waves-effect waves-light"
                                            type="button" href="#law"
                                            style="color: honeydew; background-color:#964800; margin: 10px; font-family: 'Mitr', sans-serif;">
                                            กฏหมายภายในประเทศ
                                        </a>

                                        <a class="ht-tm-element btn btn-shadow text-mono btn-outline-warning active waves-effect waves-light"
                                            type="button" href="topup.html"
                                            style="color: honeydew; background-color:#964800; margin: 10px; font-family: 'Mitr', sans-serif;">
                                            ร้านค้า & เติมเงิน
                                        </a>

                                        <!--ปุ่มล็อกอิน-->

                                         <?php
                                            if(isset($_SESSION['steamid'])) {
                                                include ('steamauth/userInfo.php');
                                                
                                            }else{
                                                echo "<a class=\"ht-tm-element btn btn-shadow text-mono btn-outline-warning active waves-effect waves-light\"
                                            style=\"color: honeydew; background-color:#007200; margin: 10px; font-family: 'Mitr', sans-serif;\"href='?login'>เข้าสู่ระบบ</a>";
                                            }
                                        ?>
                                        <!-- $_SESSION['steamid'] เอาไปใช้อ้างอิงใน database เพื่อเก็บยอดเงิน -->
                                        <?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
?>
                                        <?php

                                            if(isset($_SESSION['steamid'])) {
                                                include 'connect_topup.php';
                                        $sql = "SELECT * FROM user_database WHERE id='".($_SESSION['steam_steamid'])."'";
                                        $result = $connect->query($sql);
                                        $moneys=0;
                                        if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                                $moneys=$row["money"];
                                            }
                                        }else{
                                        $sql = "INSERT INTO user_database (id, name, image,money,status)
VALUES ('".($_SESSION['steam_steamid'])."', '".$steamprofile['personaname']."', '".$steamprofile['avatarmedium']."','0','[]')";
                                        $result = $connect->query($sql);
                                        }
                                        $connect->close();

                                        echo "<div class=\"dropdown\"><button class=\"ht-tm-element btn btn-shadow text-mono btn-outline-warning active waves-effect waves-light dropdown-toggle\"
                                            style=\"color: honeydew; background-color:#007200; margin: 10px; font-family: 'Mitr', sans-serif;\"  type=\"button\" data-toggle=\"dropdown\">";
                                        echo $steamprofile['personaname'];
                                        //ตกแต่งตัว dropdown ตรง style
                                        echo "<span class=\"caret\"></span></button><ul class=\"dropdown-menu\" style='padding:5px 7px;'>";
                                        echo "<li><img src=";
                                        echo $steamprofile['avatarmedium'];
                                        echo " width='50px' height='50px' ></li>";
                                        echo "<li><p style='color:#000;'>";
                                        echo $steamprofile['personaname'];
                                        echo "</p></li>";
                                        echo "<li><p style='color:#000;'>";
                                        echo "ยอดเงิน ";
                                        echo $moneys;
                                        echo "</p></li>";
                                        echo "<li><form action='' method='get'><button class=\"ht-tm-element btn btn-shadow text-mono btn-outline-warning active waves-effect waves-light\"
                                            style=\"color: honeydew; background-color:#007200; margin: 10px; font-family: 'Mitr', sans-serif;\" type='submit' name='logout'>ออกจากระบบ</button></form></li>";
                                        echo "</ul></div>";
                                        
                                        }
                                        ?>
                                        <

      
    

                                </div>
                            </div>
                        </nav>
                    </a>
                </div>
            </nav>
        </div>



    </header>

    <!--Carousel & NEW-->
    <header>
        <!--หน้าปก-->
    <section class="bg-light page-section" id="new">


                                 
        <br>
        <br>
        <br>
        
        <img src="pic/wallpeper logoserver3.png" width="1920" height="1080">
        
        <div class="container">

            <div class="text-mono">

            </div>
            <!--Carousel-->
            <br>
            <br>
            <center>
                <h1 style="font-family: 'Sriracha', cursive;">Welcome to IMMORTALCITY THAILAND</h1>
            </center>
            <div>
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="pic/show1.png" class="d-block w-100" alt="..." width="1000px" height="750px">
                        </div>

                        <div class="carousel-item">
                            <img src="pic/show2.png" class="d-block w-100" alt="..." width="1000px" height="750px">
                        </div>

                        <div class="carousel-item">
                            <img src="pic/show3.png" class="d-block w-100" alt="..." width="1000px" height="750px">
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>

            <!--NEW-->
            <Center>
                <br>
                <br>
                <h1 style="font-family: 'Sriracha', cursive;">--NEWS & UPDATE--</h1>
                <br>
                <br>

            

            <div style="overflow-x: auto; width: 100%;" id="news"></div>


            <div class="card" style="display: inline-block; width: 18rem;"><img
                src="Update Server/14-01-63/14-01-2563.PNG" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title" style="font-family: 'Sriracha', cursive;">
                    UPDATE 14/01/2563</h5>
                <p class="card-text" style="text-overflow: ellipsis; font-family: 'Mitr', sans-serif;">
                    ระบบการเงิน ธนาคาร คริปโต และคาสิโน คือการหาเงินนอกจากทำอาชีพ</p>
                <a href="https://www.facebook.com/104573434940788/posts/106827221382076/?d=n"
                    class="btn btn-primary stretched-link" style="font-family: 'Mitr', sans-serif;">
                    คลิก! อ่านต่อ</a>
            </div>
        </div>

            <div class="card" style="display: inline-block; width: 18rem;"><img
                    src="Update Server/14-01-63/14-01-2563-2.PNG" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title" style="font-family: 'Sriracha', cursive;">
                        UPDATE 14/01/2563</h5>
                    <p class="card-text" style="text-overflow: ellipsis; font-family: 'Mitr', sans-serif;">
                        ระบบการาจ พาวด์ และ Valet อยากโชว์รถตัวเองหลายๆ คัน</p>
                    <a href="https://www.facebook.com/104573434940788/posts/106734184724713/?d=n"
                        class="btn btn-primary stretched-link" style="font-family: 'Mitr', sans-serif;">
                        คลิก! อ่านต่อ</a>
                </div>
            </div>

            <div class="card" style="display: inline-block; width: 18rem;"><img
                src="Update Server/14-01-63/14-01-2563-3.PNG" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title" style="font-family: 'Sriracha', cursive;">
                    UPDATE 14/01/2563</h5>
                <p class="card-text" style="text-overflow: ellipsis; font-family: 'Mitr', sans-serif;">
                    ระบบอาชีพฤดูกาล ระบบใหม่ที่ยังไม่มีใครเคยทำ</p>
                <a href="https://www.facebook.com/104573434940788/posts/106662284731903/?d=n"
                    class="btn btn-primary stretched-link" style="font-family: 'Mitr', sans-serif;">
                    คลิก! อ่านต่อ</a>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
    </Center>
    </section>
    </header>




    <!--สิ่งที่ควรรู้ *ขาดimgรอออกแบบเเละปรับfont-->
    <dev class="page-section" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <h1 class="section-heading text-uppercase" style="font-family: 'Mitr', sans-serif;">
                        สิ่งที่คุณควรรู้ก่อนเริ่มเล่น !</h1>
                    <p class="text-muted" style="font-family: 'Mitr', sans-serif;">
                        Roleplay เป็นการจำลองบทบาทสมมติให้กับตัวละครในเกม ให้รู้สึกว่าตัวละครในเกมมีชีวิตจริง ๆ
                        ในบทบาทที่คุณเป็นคนกำหนด มีความรู้สึก มีความกลัวต่อสิ่งต่าง ๆ เช่น กลัวตาย กลัวมีด กลัวปืน
                        และมีความอยากจะเป็นในสิ่งต่าง ๆ เหมือนดั่งในชีวิตจริงที่คุณอยากจะเป็น
                        คุณเองก็ต้องมีความพยายามที่อยากจะเป็นมัน
                        เมื่อคุณได้รับการแต่งตั้งให้เป็นในบทบาทนั้นๆ
                        คุณก็ต้องปฏิบัติตนให้เหมาะสมกับบทบาทที่คุณได้รับ เช่น
                        ถ้าหากตัวละครในเกมของคุณได้รับบทบาทในการเป็นหมอ
                        คุณจะต้องปฏิบัติตนในเกมให้มีคุณสมบัติเหมือนกับคุณเป็นหมอจริง ๆ คือการรักษาชีวิต และ สุขภาพ
                        ของประชาชนอย่างดีที่สุด สิ่งที่สำคัญที่สุดไม่ว่าคุณจะได้รับบทบาทเป็นอะไร
                        คุณเองก็ต้องให้เกียรติและเคารพในสิทธิของผู้อื่นด้วย
                    </p>
                </div>
            </div>
            <br>
            <div class="row text-center">
                <div class="col-md-4">

                    <img src="pic/RK.png" alt="" width="300" height="300">
                    <h1> </h1><br>
                    <h4 class="service-heading" style="font-family: 'Sriracha', cursive;">In Character (IC)</h4>
                    <p class="text-muted" style="font-family: 'Mitr', sans-serif;">การพูดคุยของตัวละครในบทบาท
                        จะไม่พูดคุยเกี่ยวกับชีวิตจริง
                        เป็นการพูดคุยของตัวละครในเกม
                    </p>
                </div>
                <div class="col-md-4">

                    <img src="pic/RK.png" alt="" width="300" height="300">
                    <h1> </h1><br>
                    <h4 class="service-heading" style="font-family: 'Sriracha', cursive;">Out Of Character (OOC)</h4>
                    <p class="text-muted" style="font-family: 'Mitr', sans-serif;">
                        การพูดคุยนอกบทบาทหรือการพูดคุยในชีวิตจริงๆของเรานั้นเอง
                        ซื่งต่างจากการคุยแบบ IC อย่างตรงข้าม</p>
                </div>
                <div class="col-md-4">

                    <img src="pic/RK.png" alt="" width="300" height="300">
                    <h1> </h1><br>
                    <h4 class="service-heading" style="font-family: 'Sriracha', cursive;">Metagaming (MG)</h4>
                    <p class="text-muted" style="font-family: 'Mitr', sans-serif;">การนำเอาเรื่อง OOC
                        (เรื่องของชีวิตจริง) มาปนกับ IC (เรื่องของในเกม) เช่น
                        การพูดคุยนัดแนะกันใน Discord, TS3 หรือช่องทางอื่น ๆ นอกเหนือจากในเกม หรือ
                        การเอาเรื่องในชีวิตจริงของเรามาพูดคุยในเกม เป็นต้น
                        ซึ่งหากคุณกระทำการดังตัวอย่างที่กล่าวมาข้างต้น คุณจะถูกลงโทษทันที
                        การที่เราอยู่ภายในเกมเราควรใช้ช่องทางการสื่อสารในเกมเท่านั้น เช่น โทรศัพท์, พูดคุยภายในเกม
                    </p>
                </div>
                <div class="col-md-4">

                    <img src="pic/RK.png" alt="" width="300" height="300">
                    <h1> </h1><br>
                    <h4 class="service-heading" style="font-family: 'Sriracha', cursive;">Powergaming (PG)</h4>
                    <p class="text-muted" style="font-family: 'Mitr', sans-serif;">การกระทำที่เกินคน หรือเหนือมนุษย์
                        ปกติในชีวิตจริงเขาทำไม่ได้หรือเขาไม่ทำกัน เช่น ไม่กลัวรถชน,
                        วิ่งอย่างไม่เหนื่อยกระโดดอย่างไม่เหนื่อยกระโดดลงมา, กระโดดลงรถเมื่อขับรถด้วยความเร็ว,
                        ขับรถพุ่งลงน้ำ, คุยโทรศัพท์ในน้ำ, ขับรถที่ไม่ใช่แนว Off road ขึ้นเขา เป็นต้น </p>
                </div>
                <div class="col-md-4">

                    <img src="pic/RK.png" alt="" width="300" height="300">
                    <h1> </h1><br>
                    <h4 class="service-heading" style="font-family: 'Sriracha', cursive;">Deathmatch (DM)</h4>
                    <p class="text-muted" style="font-family: 'Mitr', sans-serif;">เป็นการฆ่าคน หรือต่อยคน
                        โดยที่เราไม่มีบทบาท หรือพูดเป็นภาษาง่าย ๆ คือ
                        เราไปต่อยหรือฆ่าคนอื่นทั้ง ๆ ที่ยังไม่มีเรื่องราวกันมาก่อน การที่จะไปต่อยหรือฆ่าใคร
                        คุณควรมีเรื่องกับเค้ามาก่อน มิเช่นนั้นคุณจะถูกมองว่าคุณ DM (ฆ่ามั่วต่อยมั่ว)
                        และโดนลงโทษทันที
                    </p>
                </div>
                <div class="col-md-4">

                    <img src="pic/RK.png" alt="" width="300" height="300">
                    <h1> </h1><br>
                    <h4 class="service-heading" style="font-family: 'Sriracha', cursive;">Quit Game (QG)</h4>
                    <p class="text-muted" style="font-family: 'Mitr', sans-serif;">
                        การออกเกมขณะที่เรายังดำเนินสตอรี่ไม่จบ หรือยังมีเรื่องที่ค้างคาอยู่ในเกม
                        เช่น เราหนีตำรวจอยู่แล้วเราออกเกมเพื่อหนี คุณจะถูกมองว่าคุณผิดกฎ QG (ออกเกมหนีบทบาท)
                        และจะถูกลงโทษทันที ถ้าหากเป็นกรณีที่เรามีธุระเร่งด้วยหรือเหตุสุดวิสัยจริง ๆ ที่ต้องออกเกม
                        เราต้องแจ้งกับคนที่กำลังดำเนินสตอรี่กับเราให้ทราบทุกครั้ง
                    </p>
                </div>
                <div class="col-md-4">

                    <img src="pic/RK.png" alt="" width="300" height="300">
                    <h1> </h1><br>
                    <h4 class="service-heading" style="font-family: 'Sriracha', cursive;">Drive By (DB)</h4>
                    <p class="text-muted" style="font-family: 'Mitr', sans-serif;">
                        การขับรถชน หรือ การขับรถทับผู้เล่น โดยเจตนาจนผู้อื่นเสียชีวิตหรือไม่ก็ตาม
                        นั่นเป็นสิ่งที่คุณไม่ควรกระทำเป็นอย่างยิ่ง แต่ถ้าหากคุณไม่ได้ตั้งใจที่จะขับรถชน
                        คุณควรที่จะกล่าวคำว่าขอโทษและรับผิดชอบค่าเสียหายให้แก่คู่กรณีทันที
                    </p>
                </div>
                <div class="col-md-4">

                    <img src="pic/RK.png" alt="" width="300" height="300">
                    <h1> </h1><br>
                    <h4 class="service-heading" style="font-family: 'Sriracha', cursive;">Revenge Kill (RK) สำคัญ !</h4>
                    <p class="text-muted" style="font-family: 'Mitr', sans-serif;">กฎข้อนี้สำหรับ FreeLife City คือ
                        คุณจะต้องลืมเรื่องราวที่เกิดขึ้นในระหว่างที่คุณสลบ ถึงแม้ว่าหน้าจอคุณจะเห็นว่า
                        ใครเป็นคนมาอุ้มคุณไปที่ใหนหรือทำอะไรกับคุณ เมื่อคุณตื่นมาคุณต้องลืมเรื่องราวระหว่างที่คุณสลบ
                        แต่คุณยังสามารถจำได้ว่า ก่อนหน้าที่คุณสลบใครมาทำอะไรคุณ และในการสลบบางกรณีเช่น
                        คุณสลบด้วยเหตุการณ์ที่ไม่ร้ายแรง(โดนต่อย) คุณสามารถพูดได้
                        แต่จะต้องพูดในน้ำเสียงที่มีความเจ็บปวด แต่ถ้าหากเป็นเหตุการณ์ที่ร้ายแรง คุณไม่ควรพูด
                        คุณต้องทำเหมือนคุณสลบไปจริง ๆ แต่ทั้งนี้ทั้งนั้น
                        ขึ้นอยู่กับคุณจะแสดงมันออกมาอย่างไรให้สมกับบทบาทที่คุณเป็น ณ เวลานั้น อยู่ที่จิตสำนึกของคุณ
                    </p>
                </div>
                <div class="col-md-4">

                    <img src="pic/RK.png" alt="" width="300" height="300">
                    <h1> </h1><br>
                    <h4 class="service-heading" style="font-family: 'Sriracha', cursive;">Value of life (VoL)</h4>
                    <p class="text-muted" style="font-family: 'Mitr', sans-serif;">การเห็นความสำคัญของชีวิต
                        รักชีวิตตัวเองมากกว่าสิ่งอื่นใด
                        ในสถานการณ์ที่คุณอยู่ตัวคนเดียวแล้วโดนข่มขู่จากคนที่มีจำนวนมากกว่า
                        คุณควรจะกลัวและรักชีวิตตัวเอง เพราะคุณไม่รู้เลยว่าเค้ามีอาวุธพร้อมที่จะทำร้ายคุณหรือไม่
                    </p>
                </div>
            </div>
            <br><br>

            <!--ช่องทางการติดต่อ-->
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase" style="font-family: 'Sriracha', cursive;">คุณสามารถติดต่อฟรี
                    ! ได้ที่ Facebook Discord</h2>
                <p class="text-muted" style="font-family: 'Mitr', sans-serif;">
                    ดูรายละเอียดช่องทาง Facebook Discord ได้ทางข้อมูลเชิฟเวอร์ด้านล่าง
                    <br>
                <div style="overflow-x: auto; width: 100%; " id="contact">
                    <a style="text-decoration:none" href="https://www.facebook.com/ImmortalRPTH">
                        <img src="pic/facebook.png" alt="" style="width:100px;height:100px; margin: 50px;">
                    </a>
                    <a href="https://discord.gg/ygEesG8s">
                        <img src="pic/discord.png" alt="" style="width:100px;height:100px; margin: 50px;">
                    </a>
                </div>


                </p>


            </div>
        </div>
    </dev>

    <!--Rlue *เหลือแค่ปรับfont-->
    <div>
        <section class="bg-light page-section" id="law">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <br>
                        <br>
                        <br>
                        <br>
                        <h2 class="section-heading text-uppercase" style="font-family: 'Sriracha', cursive;">
                            กฎต่างๆของเซิฟเวอร์ </h2>
                        <h3 class="section-subheading text-muted" style="font-family: 'Sriracha', cursive;">Server Rules
                        </h3>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne" style="font-family: 'Sriracha', cursive;">
                                    หมวด 1 ความผิดเกี่ยวกับจราจร ( ผู้บังคับใช้หมวด 1 - <a
                                        style="color: cornflowerblue;"> หน่วยงานตำรวจ <a> )
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body" style="font-family: 'Mitr', sans-serif;">มาตรา 101 -
                                    การฝ่าฝืนสัญญาณไฟจราจร มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ 3,000-5,000
                                        เหรียญ </a><br>

                                    มาตรา 102 - การขับรถเร็วเกินกว่าที่กฏหมายกำหนด มีโทษ<a style="color:#FF9966	;">
                                        &nbsp;ปรับ 5,000-10,000 เหรียญ </a><br>

                                    มาตรา 103 - การจอดรถในที่ห้ามจอด <a style="color:#590808	;">
                                        กรณีที่มีเจ้าของรถอยู่ด้วย</a> มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ 5,000
                                        เหรียญ</a><br>

                                    มาตรา 104 - การจอดรถในที่ห้ามจอด <a style="color:#058c46	;">
                                        กรณีที่ไม่มีเจ้าของรถอยู่ด้วย</a> มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        5,000
                                        เหรียญ</a> และ<a style="color:#5f00bf;"> &nbsp;ยึดรถของกลาง</a><br>

                                    มาตรา 105 - การขับรถโดยประมาท ขับขี่หวาดเสียว
                                    ขับผิดเลนหรือกินเลนไม่สวมหมวกนิรภัยหรือคาดเข็มขัดนิรภัย
                                    มีโทษ<a style="color:#FF9966;"> &nbsp;ปรับ 2,000-3,000 เหรียญ</a><br>

                                    มาตรา 106 - การขับรถโดยประมาท ทำให้ทรัพย์สินเสียหาย มีโทษ<a style="color:#FF9966	;">
                                        &nbsp;ปรับ 3,000-10,000 เหรียญ</a>
                                    หรือ <a style="color:#bf0000;"> &nbsp;จำคุก 10 นาที</a><br>

                                    มาตรา 107 - การขับรถโดยประมาท ทำให้ผู้อื่นถึงแก่ความตาย มีโทษ<a
                                        style="color:#FF9966	;"> &nbsp;ปรับ 50,000 เหรียญ</a> หรือ
                                    <a style="color:#bf0000;"> &nbsp;จำคุก 15-20 นาที</a><br>

                                    มาตรา 108 - การขับรถกีดขวางรถราชการหรือรถพยาบาลที่เปิดไซเรนฉุกเฉิน มีโทษ<a
                                        style="color:#FF9966	;"> &nbsp;ปรับ5,000-10,000 เหรียญ</a><br>

                                    มาตรา 109 - การขัดขวางการปฏิบัติหน้าที่ของเจ้าหน้าที่
                                    การไม่ยอมหยุดรถให้เจ้าหน้าที่ตรวจค้นหรือการหลบหนีการจับกุม มีโทษ<a
                                        style="color:#FF9966	;"> &nbsp;ปรับ 10,000-50,000
                                        เหรียญ</a>
                                    หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 15-20 นาที</a><br>

                                    มาตรา 110 - การแข่งรถในที่สาธารณะโดยที่ไม่ได้รับอนุญาตจากทางราชการ ถือเป็นความผิด
                                    มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        10,000 เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 10 นาที</a><br>

                                    มาตรา 111 - การขับขี่ยานพาหนะโดยไม่มีใบอนุญาตของยานพาหนะประเภทนั้นๆ มีโทษ<a
                                        style="color:#FF9966	;"> &nbsp;ปรับ 10,000
                                        เหรียญ</a><br>
                                    มาตรา 112 - การดูหมิ่นเจ้าพนักงานปฏิบัติหน้าที่อย่างร้ายแรง โดยไม่มีมูลเหตุอันควร
                                    มีโทษ<a style="color:#bf0000	;"> &nbsp;จำคุก
                                        5-15 นาที</a><br>
                                    มาตรา 113 - การเสพของมึนเมาทุกชนิดขณะขับรถ มีโทษ<a style="color:#FF9966	;">
                                        &nbsp;ปรับ 20,000-30,000 เหรียญ</a> หรือ <a style="color:#bf0000	;"> &nbsp;จำคุก
                                        10-20 นาที</a>
                                    หรือ<a style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ</a><br>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo" style="font-family: 'Sriracha', cursive;">
                                    หมวด 2 ความผิดเกี่ยวกับอาวุธ ( ผู้บังคับใช้หมวด 2 - <a
                                        style="color: cornflowerblue;"> &nbsp;หน่วยงานตำรวจ <a> )
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body" style="font-family: 'Mitr', sans-serif;">มาตรา 201 -
                                    การสำแดงหรือโชว์อาวุธทุกชนิดในที่สาธารณะโดยไม่มีเหตุอันควร มีโทษ<a
                                        style="color:#FF9966	;"> &nbsp;ปรับ 10,000-50,000
                                        เหรียญ</a> หรือ <a style="color:#bf0000	;"> &nbsp;จำคุก 5-30 นาที</a> <a
                                        style="color:#5f00bf	;"> &nbsp;หากเป็นอาวุธผิดกฏหมาย ให้ยึดอาวุธ</a><br>
                                    มาตรา 202 - การครอบครองอาวุธสงครามผิดกฏหมาย มีโทษ<a style="color:#FF9966	;">
                                        &nbsp;ปรับ 50,000-200,000 เหรียญ</a> หรือ
                                    <a style="color:#bf0000	;"> &nbsp;จำคุก 20-60
                                        นาที</a> และ <a style="color:#5f00bf	;"> &nbsp;ยึดอาวุธชนิดนั้นๆ</a><br>
                                    มาตรา 203 - การจำหน่ายอาวุธสงครามผิดกฏหมาย มีโทษ<a style="color:#FF9966	;">
                                        &nbsp;ปรับ 30,000-150,000 เหรียญ</a> หรือ
                                    <a style="color:#bf0000	;"> &nbsp;จำคุก 15-45 นาที</a>
                                    และ <a style="color:#5f00bf	;"> &nbsp;ยึดอาวุธชนิดนั้นๆ</a><br>
                                    มาตรา 204 - การใช้อาวุธโดยประมาทหรือเจตนาในที่ชุมชนหรือที่ที่มีบุคคลอื่นอยู่ใกล้
                                    มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        30,000-100,000 เหรียญ</a> หรือ <a style="color:#bf0000	;"> &nbsp;จำคุก 15-30
                                        นาที</a> <a style="color:#5f00bf	;"> &nbsp;หากเป็นอาวุธผิดกฏหมาย
                                        ให้ยึดอาวุธ</a><br>
                                    มาตรา 205 - การทำร้ายผู้เล่นอื่นด้วยอาวุธใดๆ ทำให้ผู้อื่นบาดเจ็บโดยประมาทหรือเจตนา
                                    มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        50,000-300,000 เหรียญ</a> หรือ <a style="color:#bf0000	;"> &nbsp;จำคุก 20-75
                                        นาที</a> <a style="color:#5f00bf	;"> &nbsp;หากเป็นอาวุธผิดกฏหมาย
                                        ให้ยึดอาวุธ</a><br>
                                    มาตรา 206 - การพกพาอาวุธโดยไม่มีใบอนุญาตพกพาอาวุธ ทั้งแบบสามัญหรือเฉพาะชนิด
                                    มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        30,000-100,000 เหรียญ</a> และ<a style="color:#5f00bf	;">
                                        &nbsp;ยึดอาวุธชนิดนั้นๆ</a><br>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree" style="font-family: 'Sriracha', cursive;">
                                    หมวด 3 ความผิดเกี่ยวกับยาเสพติด ( ยึดของผิดกฏหมายทุกกรณี ) ( ผู้บังคับใช้หมวด 3 - <a
                                        style="color: cornflowerblue;"> &nbsp;หน่วยงานตำรวจ <a>)
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body" style="font-family: 'Mitr', sans-serif;">มาตรา 301 -
                                    ครอบครองสารเสพติด เช่น<a style="color:#058c46	;"> &nbsp;กัญชา โคเคน สารตั้งต้น
                                        หรือยาเสพติดอื่นใดที่เกี่ยวข้องกัน
                                        รวมแล้วเกิน 4 ชิ้นขึ้นไป</a> มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        100,000-500,000 เหรียญ</a> หรือ <a style="color:#bf0000	;"> &nbsp;จำคุก 20-90
                                        นาที</a> หรือ<a style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ
                                        โทษเพิ่มขึ้นตามปริมาณที่ครอบครอง</a><br>

                                    มาตรา 302 - การใช้สารเสพติดผิดกฏหมาย มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        20,000 เหรียญ</a> หรือ <a style="color:#bf0000	;"> &nbsp;จำคุก 10 นาที</a><br>
                                    มาตรา 303 - จำหน่ายสารเสพติด สารตั้งต้น และอุปกรณ์เกี่ยวข้องกับยาเสพติดทุกชนิด
                                    มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        50,000-150,000 เหรียญ</a> หรือ <a style="color:#bf0000	;"> &nbsp;จำคุก 15-30
                                        นาที</a> หรือ<a style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ</a><br>
                                    มาตรา 304 - เป็นผู้ผลิตสารเสพติดชนิดใดๆ มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        50,000-200,000 เหรียญ</a> หรือ <a style="color:#bf0000	;"> &nbsp;จำคุก
                                        15-40 นาที</a>
                                    หรือ<a style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ</a><br></div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseFour" aria-expanded="false"
                                    aria-controls="flush-collapseFour" style="font-family: 'Sriracha', cursive;">
                                    หมวด 4 ความผิดเกี่ยวกับทรัพย์สิน (
                                    หากถูกดำเนินคดีก่อนหมดเวลาสตอรี่ริบทรัพย์คืนให้แก่เจ้าทุกข์ทุกกรณี ) (
                                    ผู้บังคับใช้หมวด 4 - <a style="color: cornflowerblue;"> &nbsp;หน่วยงานตำรวจ <a>)
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body" style="font-family: 'Mitr', sans-serif;">มาตรา 401 -
                                    การกรรโชกทรัพย์ ขู่เข็ญ ข่มขู่
                                    หรือสร้างความหวาดกลัวต่อผู้เล่นอื่น
                                    เพื่อหมายในทรัพย์สินของผู้เล่นนั้น มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        20,000-50,000 เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 10-20
                                        นาที</a> หรือ<a style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ</a>
                                    <br>
                                    มาตรา 402 -
                                    การลักทรัพย์หรือชิงทรัพย์จากผู้เล่นอื่นโดยไม่ได้รับความยินยอมจากบุคคลนั้น
                                    โดยกระทำการเพียงคนเดียว มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ 50,000
                                        เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 20 นาที</a>
                                    หรือ<a style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ</a><br>
                                    มาตรา 403 -
                                    การลักทรัพย์หรือชิงทรัพย์จากผู้เล่นอื่นโดยไม่ได้รับความยินยอมจากบุคคลนั้น
                                    โดยร่วมกันกระทำ 2-3 คน มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ 75,000 เหรียญ</a>
                                    หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 30 นาที</a> หรือ<a
                                        style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ ต่อบุคคล</a>
                                    <br>
                                    มาตรา 404 -
                                    การลักทรัพย์หรือชิงทรัพย์จากผู้เล่นอื่นโดยไม่ได้รับความยินยอมจากบุคคลนั้น
                                    โดยร่วมกันกระทำ<a style="color:#058c46	;"> &nbsp;4 คนขึ้นไป</a> มีโทษ<a
                                        style="color:#FF9966	;"> &nbsp;ปรับ 100,000 เหรียญ</a> หรือ <a
                                        style="color:#bf0000	;"> &nbsp;จำคุก 40 นาที</a>
                                    หรือ<a style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับต่อบุคคล</a>
                                    <br>
                                    มาตรา 405 - การร่วมกันปล้นสถานที่ทางการเพื่อประสงค์ต่อทรัพย์หรือสิ่งอื่นใด เช่น
                                    ปล้นธนาคาร
                                    หรือเรือบรรทุกเครื่องบิน มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        500,000-1,000,000 เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 60-120
                                        นาที</a>
                                    หรือ<a style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ ต่อบุคคล</a><br>
                                    มาตรา 406 - การรับซื้อของโจร การได้ทรัพย์ใดๆ มาจากการกระทำความผิด
                                    ถึงแม้มิได้เป็นผู้กระทำความผิดนั้น ให้ถือว่าตกเป็นจำเลยร่วม มีโทษ<a
                                        style="color:#FF9966	;"> &nbsp;ปรับ 20,000-50,000
                                        เหรียญ</a> หรือ
                                    <a style="color:#bf0000	;"> &nbsp;จำคุก 10-20 นาที</a> และ<a
                                        style="color:#5f00bf	;"> &nbsp;ยึดทรัพย์สินที่ได้นั้นมาด้วย</a><br>
                                    มาตรา 407 - การทำให้ทรัพย์สินมีค่าของผู้อื่นเสียหาย สูญหาย หรือมีความบกพร่องไป
                                    มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        30,000-50,000 เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 10-20
                                        นาที</a> หรือ<a style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ</a><br>
                                    มาตรา 408 - การขโมยยานพาหนะใดๆ ของผู้อื่นโดยเจ้าทรัพย์ไม่ยินยอม มีโทษ<a
                                        style="color:#FF9966	;"> &nbsp;ปรับ
                                        50,000-100,000 เหรียญ</a>
                                    หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 15-30 นาที</a> หรือ<a
                                        style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ</a><br>
                                    มาตรา 409 - การแจ้งความเท็จในเรื่องเกี่ยวกับทรัพย์สิน
                                    โดยไม่มีหลักฐานหรือประจักษ์พยาน
                                    หากทำการสืบสวนสอบสวนแล้วเป็นเท็จ มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ 100,000
                                        เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 30 นาที</a> หรือ<a
                                        style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ</a><br>
                                    มาตรา 410 - เจ้าทุกข์ผู้เสียหาย
                                    สามารถฟ้องร้องทางแพ่งเรียกค่าเสียหายจากจำเลยได้เป็นมูลค่าไม่เกิน<a
                                        style="color:#bf0000	;"> &nbsp;1.5 เท่า</a>
                                    จากมูลค่าที่ทรัพย์ที่ถูกชิงไปหรือทำให้เสียหาย
                                    นอกเหนือจากการริบทรัพย์คืนแก่เจ้าทุกข์นั้นแล้ว
                                    ทั้งนี้อยู่ที่ดุลยพินิจของเจ้าพนักงานบังคับคดี<br>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseFive" aria-expanded="false"
                                    aria-controls="flush-collapseFive" style="font-family: 'Sriracha', cursive;">
                                    หมวด 5 ความผิดเกี่ยวกับร่างกายและชีวิต ( ผู้บังคับใช้หมวด 5 - <a
                                        style="color: cornflowerblue;"> &nbsp;หน่วยงานตำรวจ <a>)
                                </button>
                            </h2>
                            <div id="flush-collapseFive" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body" style="font-family: 'Mitr', sans-serif;">มาตรา 501 -
                                    การทำร้ายร่างกายผู้อื่น มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ 20,000-30,000
                                        เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 10 นาที</a> หรือ<a
                                        style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ</a>
                                    หากมีการใช้อาวุธทำร้ายร่างกาย ให้ผิดมาตรา 205 ร่วมด้วย<br>
                                    มาตรา 502 - การทรมานผู้อื่นจนบาดเจ็บสาหัส มีโทษ<a style="color:#FF9966	;">
                                        &nbsp;ปรับ 50,000-100,000 เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก
                                        15-30 นาที</a>
                                    หรือ<a style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ</a><br>
                                    มาตรา 503 - กระทำการโดยประมาท เป็นเหตุให้ผู้อื่นถึงแก่ความตาย มีโทษ<a
                                        style="color:#FF9966	;"> &nbsp;ปรับ
                                        50,000-100,000 เหรียญ</a>
                                    หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 15-30 นาที</a> หรือ<a
                                        style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ</a> หากเกิดจากการขับขี่ยานพาหนะ
                                    ให้ผิดมาตรา 107
                                    ร่วมด้วย<br>
                                    มาตรา 504 - พยายามฆ่าผู้อื่น มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        150,000-200,000 เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 40-50
                                        นาที</a>
                                    หรือ<a style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ</a><br>
                                    มาตรา 505 - ฆ่าผู้อื่นโดยเจตนา มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        200,000-300,000 เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 45-60
                                        นาที</a> หรือ<a style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ</a>
                                    <br>
                                    มาตรา 506 - การลักพาตัวโดยผู้เล่นอื่นไม่ยินยอม การกักขังหน่วงเหนียว
                                    การบังคับจับตัวประกัน
                                    มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ 50,000-100,000 เหรียญ</a> หรือ<a
                                        style="color:#bf0000	;"> &nbsp;จำคุก 15-30 นาที</a> หรือ<a
                                        style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ</a><br>
                                    มาตรา 507 - การเจตนาทำร้ายร่างกายเจ้าหน้าที่รัฐทุกหน่วยงาน มีโทษ<a
                                        style="color:#bf0000	;"> &nbsp;จำคุกทันที 15-30
                                        นาที</a><br>
                                    มาตรา 508 - สังหารเจ้าหน้าที่รัฐทุกหน่วยงาน มีโทษ<a style="color:#bf0000	;">
                                        &nbsp;จำคุกทันที 60 นาที</a><br>
                                    มาตรา 509 - กระทำความผิดโดยเจตนาทำร้ายหรือทำให้เสียชีวิตต่อประชาชนคนเดิมเกิน <a
                                        style="color:#058c46	;"> &nbsp;2 ครั้ง ใน 24
                                        ชั่วโมง</a>
                                    เจ้าหน้าที่สามารถรับทำคดีได้ทันทีโดยที่เจ้าทุกข์ไม่จำเป็นต้องแจ้งความ
                                    มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        200,000-500,000 เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 45-90
                                        นาที</a> หรือ<a style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ</a><br>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseSix" aria-expanded="false"
                                    aria-controls="flush-collapseSix" style="font-family: 'Sriracha', cursive;">
                                    หมวด 6 ความผิดเกี่ยวกับการจับกุม ( ผู้บังคับใช้หมวด 6 - <a
                                        style="color: cornflowerblue;"> &nbsp;หน่วยงานตำรวจ <a> )
                                </button>
                            </h2>
                            <div id="flush-collapseSix" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body" style="font-family: 'Mitr', sans-serif;">มาตรา 601 -
                                    การขัดขวางการทำงานของเจ้าหน้าที่
                                    ไม่ให้ความร่วมมือ
                                    ไม่ปฏิบัติตามคำสั่งเฉพาะหน้าของเจ้าหน้าที่ จงใจก่อกวน สร้างความลำบากให้เจ้าหน้าที่
                                    มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        30,000 เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 15 นาที</a><br>
                                    มาตรา 602 - ขัดขืนการจับกุมของเจ้าหน้าที่ มีโทษ<a style="color:#FF9966	;">
                                        &nbsp;ปรับ 50,000 เหรียญ</a> และ<a style="color:#bf0000	;"> &nbsp;จำคุก 20
                                        นาที</a><br>
                                    มาตรา 603 - การติดสินบนเจ้าหน้าที่ เพื่อประโยชน์ส่วนตน ผู้เล่น มีโทษ<a
                                        style="color:#FF9966	;"> &nbsp;ปรับ 100,000
                                        เหรียญ</a> และ<a style="color:#bf0000	;"> &nbsp;จำคุก 30 นาที</a>
                                    <br>
                                    มาตรา 604 - แจ้งความเท็จ มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ 100,000
                                        เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 30 นาที</a> หรือ<a
                                        style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ</a>
                                    หากเป็นเรื่องเกี่ยวกับทรัพย์สิน ให้ใช้มาตรา 409 แทน<br>

                                    มาตรา 605 - หลบหนีการจับกุมไปยังที่พักอาศัย ทั้งของตนเองและผู้อื่น มีโทษ<a
                                        style="color:#FF9966	;"> &nbsp;ปรับ 50,000
                                        เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 20 นาที</a>
                                    <br>
                                    มาตรา 606 - ให้การช่วยเหลือผู้ต้องหาด้วยวิธีต่างๆ ให้ที่หลบซ่อนหรือที่พักพิง
                                    พาผู้ต้องหาหลบหนี
                                    มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ 50,000 เหรียญ</a> หรือ<a
                                        style="color:#bf0000	;"> &nbsp;จำคุก 20 นาที</a><br>

                                    มาตรา 607 - ผู้ใดทำการชิงตัวผู้ต้องหาที่ยังไม่ได้รับการตัดสินความผิด
                                    ไปจากการควบคุมตัวของเจ้าหน้าที่ มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ 200,000
                                        เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 30 นาที</a>
                                    หรือ<a style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ</a><br>

                                    มาตรา 608 - ผู้ใดทำการชิงตัวนักโทษที่ได้รับการตัดสินว่ามีความผิด
                                    ไปจากการควบคุมตัวของเจ้าหน้าที่
                                    มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ 400,000 เหรียญ</a> หรือ<a
                                        style="color:#bf0000	;"> &nbsp;จำคุก 50 นาที</a> หรือ<a style="color:#5f00bf	;">
                                        &nbsp;ทั้งจำและปรับ</a><br>
                                    มาตรา 609 - ทำลายทรัพย์สินของทางราชการ ทรัพย์สินเจ้าหน้าที่หน่วยงานรัฐทุกหน่วยงาน
                                    มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        30,000 เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 15 นาที</a><br>
                                    มาตรา 610 - ใช้เป็นภาคผนวกกับมาตราอื่นๆ
                                    หากผู้กระทำความผิดมีความสำนึกผิดและเข้ามอบตัวกับเจ้าหน้าที่ตำรวจด้วยตนเอง<a
                                        style="color:#058c46	;">
                                        &nbsp;เมื่อผู้ต้องหาให้การรับสารภาพต้องระวางโทษกึ่งหนึ่งของฐานความผิดนั้นๆ</a><br>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseSeven" aria-expanded="false"
                                    aria-controls="flush-collapseSeven" style="font-family: 'Sriracha', cursive;">
                                    หมวด 7 ความผิดทั่วไป ( ผู้บังคับใช้หมวด 7 - <a style="color: cornflowerblue;">
                                        &nbsp;หน่วยงานตำรวจ <a>)
                                </button>
                            </h2>
                            <div id="flush-collapseSeven" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body" style="font-family: 'Mitr', sans-serif;">มาตรา 701 -
                                    การรบกวนความสงบเรียบร้อย
                                    การส่งเสียงดังรบกวนผู้อื่น การด่าทอ หมิ่นประมาท
                                    บูลลี่ผู้อื่นใน IC มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ 10,000-100,000
                                        เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 10-30 นาที</a><br>
                                    มาตรา 702 - การปกปิดรูปพรรณสันฐาน สวมหน้ากากปิดบังใบหน้า ปกปิดชื่อตนเอง
                                    เจตนาเพื่อก่ออาชญากรรมหรือไม่ก็ตาม มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        10,000 เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 10 นาที</a><br>
                                    มาตรา 703 - การทะเลาะวิวาทในที่สาธารณะโดยปราศจากอาวุธ มีโทษ<a
                                        style="color:#FF9966	;"> &nbsp;ปรับ 20,000-30,000 เหรียญ</a>
                                    หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก
                                        10 นาที</a><br>
                                    มาตรา 704 - การกระทำการลามกอนาจารต่อหน้าสาธารณชน มีโทษ<a style="color:#FF9966	;">
                                        &nbsp;ปรับ 10,000 เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก
                                        5-10
                                        นาที</a><br>
                                    มาตรา 705 - การค้าประเวณีทุกกรณี มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ 15,000
                                        เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 10 นาที</a><br>
                                    มาตรา 706 - มีสัตว์สงวนหรือชิ้นส่วนสัตว์คุ้มครองไว้ในครอบครอง มีโทษ<a
                                        style="color:#FF9966	;"> &nbsp;ปรับ 150,000
                                        เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 30 นาที</a>
                                    และ<a style="color:#5f00bf	;"> &nbsp;ยึดของกลางทั้งหมด</a><br>
                                    มาตรา 707 - แต่งกายเลียนแบบเจ้าหนักงานตำรวจ แพทย์ หน่วยข่าวกรอง
                                    เพื่อให้ผู้อื่นเข้าใจว่าตนเป็นเจ้าหน้าที่ของหน่วยงานนั้น ไม่ว่ากรณีใดๆ มีโทษ<a
                                        style="color:#FF9966	;"> &nbsp;ปรับ
                                        100,000
                                        เหรียญ</a>หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 30 นาที</a> หรือ<a
                                        style="color:#5f00bf	;"> &nbsp;ทั้งจำและปรับ</a><br>
                                    มาตรา 708 - มีเงินผิดกฏหมายไวในครอบครอง มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        10,000-1,000,000 เหรียญ</a>
                                    โดยค่าปรับจะคิดเป็น 2
                                    เท่าของเงินผิดกฏหมายที่ครอบครองไว้ ต่ำสุดที่ 10,000 เหรียญสูงสุดที่ 1,000,000
                                    เหรียญ<br>
                                    มาตรา 709 - การจับกลุ่มเกิน 4 คนและก่อความวุ่นวายขึ้นในประเทศ
                                    ให้ถือว่าเป็นแก๊งเถื่อน มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ
                                        50,000 เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 20 นาที</a><br>
                                    มาตรา 710 - มีของแดงผิดกฏหมายไว้ในครอบครอง มีโทษ<a style="color:#FF9966	;">
                                        &nbsp;ปรับ 30,000 เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 15
                                        นาที ต่อของ 1
                                        ชิ้น</a> และ<a style="color:#5f00bf	;"> &nbsp;ยึดของกลางทั้งหมด</a><br>
                                    มาตรา 711 - การเป็นแก๊งที่ลงทะเบียน แต่ไม่มีที่ทำการแก๊ง เมื่อก่อความวุ่นวาย
                                    มีโทษ<a style="color:#FF9966	;"> &nbsp;ปรับ 200,000
                                        เหรียญ</a> หรือ<a style="color:#bf0000	;"> &nbsp;จำคุก 30 นาที</a><br>
                                    มาตรา 712 - เมื่อตำรวจตรวจค้นตามอำนาจหน้าที่แล้วพบบิลค้างจ่ายเกิน 100,000$
                                    มีโทษ<a style="color:#bf0000	;"> &nbsp;จำคุก 20 นาที</a> (
                                    ยกเว้นบิลศัลยกรรม )<br></div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseEight" aria-expanded="false"
                                    aria-controls="flush-collapseEight" style="font-family: 'Sriracha', cursive;">
                                    หมวด 8 ความผิดสำหรับหน่วยงานของรัฐ ( ผู้บังคับใช้หมวด 8 - <a style="color: sienna;">
                                        &nbsp;ประธานาธิบดี <a>)
                                </button>
                            </h2>
                            <div id="flush-collapseEight" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body" style="font-family: 'Mitr', sans-serif;">----
                                    กำลังดำเนินการออกกฏหมายให้ครอบคลุมกับทุกหน่วยงาน เร็วๆ
                                    นี้ ----<br></div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseNine" aria-expanded="false"
                                    aria-controls="flush-collapseNine" style="font-family: 'Sriracha', cursive;">
                                    หมวด 9 ความผิดร้ายแรงเกี่ยวกับประเทศ ( ผู้บังคับใช้หมวด 9 - <a
                                        style="color: sienna;"> &nbsp;ประธานาธิบดี <a> )
                                </button>
                            </h2>
                            <div id="flush-collapseNine" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body" style="font-family: 'Mitr', sans-serif;">
                                    ในเนื้อหาความผิดของหมวด 9 ค่อนข้างร้ายแรง
                                    <a>
                                        <h6> </h6>ทางผู้ตัดสินความผิดจึงต้องใช้ความรัดกุมที่สุดในการตัดสินความผิด
                                        ถึงแม้สิทธิ์ขาดการตัดสินใจจะอยู่ที่แอดมิน
                                        แต่เพื่อให้ไม่เกิดความผิดพลาด ทางผู้ร้องต้องมีหลักฐานที่รัดกุม
                                        แจ้งรายละเอียดการทำผิดให้ครบถ้วนที่สุด
                                        ต่อมาในการตัดสินทุกเคสจะต้องได้รับความเห็นชอบจาก ผู้บัญชาการหน่วยงาน 3 ท่าน จาก
                                        6
                                        หน่วยงานเสียก่อน จากนั้นจะสุ่มคัดเลือกคณะลูกขุนจากผู้เล่นทั่วไป 5 คน
                                        หากตัดสินว่าผิดเกินกึ่งหนึ่ง จะตัดสินให้ผู้นั้นผิดจริง
                                        หากผู้เล่นแจ้งเท็จโดยไม่มีมูลและไม่มีหลักฐานจะได้รับโทษ
                                        แต่หากเป็นการตรวจสอบเองโดยตรงจากประธานาธิบดีหรือแอดมิน
                                        หรือหน่วยงานข่าวกรองที่มีหน้าที่โดยตรง
                                        สิทธิ์ในการวิเคราะห์หลักฐานและการตัดสินใจ จะขึ้นอยู่กับแอดมินแต่เพียงผู้เดียว
                                        คำตัดสินจากแอดมินถือเป็นที่สิ้นสุด
                                    </a><br>

                                    <br>

                                    <h6>มาตรา 901 - การกระทำความผิดเกี่ยวกับ IC และ OC การด่าทอทุกกรณี
                                        การบูลลี่การเหยียดหยามกันนอกบนบาทในเกม</h6><br>
                                    กระทำผิดครั้งที่ 1 - <a style="color:#bf0000	;"> &nbsp;จำคุก 60 นาที</a><br>
                                    กระทำผิดครั้งที่ 2 - <a style="color:#bf0000	;"> &nbsp;จำคุก 120 นาที</a> และ<a
                                        style="color:#FF9966	;"> &nbsp;แจกใบเหลือง</a><br>
                                    กระทำผิดครั้งที่ 3 - <a style="color:#bf0000	;"> &nbsp;แจกใบแดง</a>
                                    เชิญออกจากประเทศ<br>
                                    <br>
                                    <br>
                                    <h6>มาตรา 902 - การกระทำความผิดเกี่ยวกับ PG การเล่นบทบาทที่เหนือมนุษย์</h6><br>
                                    กระทำผิดครั้งที่ 1 - <a style="color:#bf0000	;"> &nbsp;จำคุก 120 นาที</a><br>
                                    กระทำผิดครั้งที่ 2 - <a style="color:#bf0000	;"> &nbsp;จำคุก 240 นาที</a> และ<a
                                        style="color:#FF9966	;"> &nbsp;แจกใบเหลือง</a><br>
                                    กระทำผิดครั้งที่ 3 - <a style="color:#bf0000	;"> &nbsp;แจกใบแดง</a>
                                    เชิญออกจากประเทศ<br>
                                    <br>
                                    <br>
                                    <h6>มาตรา 903 - การกระทำความผิดเกี่ยวกับ DM การยิงผู้เล่นอื่นมั่วๆ</h6><br>
                                    กระทำผิดครั้งที่ 1 - <a style="color:#bf0000	;"> &nbsp;จำคุก 150 นาที</a><br>
                                    กระทำผิดครั้งที่ 2 - <a style="color:#bf0000	;"> &nbsp;จำคุก 300 นาที</a> และ<a
                                        style="color:#FF9966	;"> &nbsp;แจกใบเหลือง</a> <br>
                                    กระทำผิดครั้งที่ 3 - <a style="color:#bf0000	;"> &nbsp;แจกใบแดง</a>
                                    เชิญออกจากประเทศ<br>
                                    <br>
                                    <br>
                                    <h6>มาตรา 904 - การกระทำความผิดเกี่ยวกับ SK การดักยิงที่จุดเกิด</h6><br>
                                    กระทำผิดครั้งที่ 1 - <a style="color:#bf0000	;"> &nbsp;จำคุก 120 นาที</a><br>
                                    กระทำผิดครั้งที่ 2 - <a style="color:#bf0000	;"> &nbsp;จำคุก 240 นาที</a> และ<a
                                        style="color:#FF9966	;"> &nbsp;แจกใบเหลือง</a><br>
                                    กระทำผิดครั้งที่ 3 - <a style="color:#bf0000	;"> &nbsp;แจกใบแดง</a>
                                    เชิญออกจากประเทศ<br>
                                    <br>
                                    <br>
                                    <h6>มาตรา 905 - การกระทำความผิดเกี่ยวกับ DB การจงใจวิ่งตัดหน้ารถ</h6><br>
                                    กระทำผิดครั้งที่ 1 - <a style="color:#bf0000	;"> &nbsp;จำคุก 90 นาที</a><br>
                                    กระทำผิดครั้งที่ 2 - <a style="color:#bf0000	;"> &nbsp;จำคุก 180 นาที</a> และ<a
                                        style="color:#FF9966	;"> &nbsp;แจกใบเหลือง</a><br>
                                    กระทำผิดครั้งที่ 3 - <a style="color:#bf0000	;"> &nbsp;แจกใบแดง</a>
                                    เชิญออกจากประเทศ<br><br>
                                    <br>
                                    <br>
                                    <h6>มาตรา 906 - การกระทำความผิดเกี่ยวกับ CK การฆ่าตัวตายเพื่อหนีบทบาท</h6><br>
                                    กระทำผิดครั้งที่ 1 - <a style="color:#bf0000	;"> &nbsp;จำคุก 120 นาที</a><br>
                                    กระทำผิดครั้งที่ 2 - <a style="color:#bf0000	;"> &nbsp;จำคุก 240 นาที</a> และ<a
                                        style="color:#FF9966	;"> &nbsp;แจกใบเหลือง</a><br>
                                    กระทำผิดครั้งที่ 3 - <a style="color:#bf0000	;"> &nbsp;แจกใบแดง</a>
                                    เชิญออกจากประเทศ<br>
                                    <br>
                                    <br>
                                    <h6>มาตรา 907 - การกระทำความผิดเกี่ยวกับ NL การแก้แค้นโดยไม่ลืมเรื่องราวก่อนหน้า
                                    </h6><br>
                                    กระทำผิดครั้งที่ 1 - <a style="color:#bf0000	;"> &nbsp;จำคุก 60 นาที</a><br>
                                    กระทำผิดครั้งที่ 2 - <a style="color:#bf0000	;"> &nbsp;จำคุก 120นาที</a><br>
                                    กระทำผิดครั้งที่ 3 - <a style="color:#bf0000	;"> &nbsp;จำคุก 180 นาที</a> และ<a
                                        style="color:#FF9966	;"> &nbsp;แจกใบเหลือง</a><br>
                                    กระทำผิดครั้งที่ 4 - <a style="color:#bf0000	;"> &nbsp;แจกใบแดง</a>
                                    เชิญออกจากประเทศ<br>
                                    <br>
                                    <br>
                                    <h6>มาตรา 908 - การกระทำความผิดเกี่ยวกับ QG การหนีออกจากบทบาทตัวละครที่เล่น</h6><br>
                                    กระทำผิดครั้งที่ 1 - <a style="color:#bf0000	;"> &nbsp;จำคุก 60 นาที</a><br>
                                    กระทำผิดครั้งที่ 2 - <a style="color:#bf0000	;"> &nbsp;จำคุก 300 นาที</a> และ<a
                                        style="color:#FF9966	;"> &nbsp;แจกใบเหลือง</a><br>
                                    กระทำผิดครั้งที่ 3 - <a style="color:#bf0000	;"> &nbsp;แจกใบแดง</a>
                                    เชิญออกจากประเทศ<br>
                                    <br>
                                    -------------------------------------------------------------------------
                                    <br>
                                    <h5>มาตรา 909 - การกระทำความผิดเกี่ยวกับ CC แบ่งออกเป็น 2 วรรค</h5><br>
                                    <br>
                                    <h6>วรรค 1 - การใช้บัคของประเทศเพื่อหาผลประโยชน์ หากแจ้งบัคกับประธานาธิบดี
                                        จะไม่ได้รับโทษใดๆ</h6>
                                    <br>
                                    กระทำผิดครั้งที่ 1 - <a style="color:#bf0000	;"> &nbsp;จำคุก 60 นาที</a><br>
                                    กระทำผิดครั้งที่ 2 - <a style="color:#bf0000	;"> &nbsp;จำคุก 120นาที</a><br>
                                    กระทำผิดครั้งที่ 2 - <a style="color:#bf0000	;"> &nbsp;จำคุก 180 นาที</a> และ<a
                                        style="color:#FF9966	;"> &nbsp;แจกใบเหลือง</a><br>
                                    กระทำผิดครั้งที่ 3 - <a style="color:#bf0000	;"> &nbsp;แจกใบแดง</a>
                                    เชิญออกจากประเทศ<br>
                                    <br>
                                    <h6>วรรค 2 - การทุจริต โกงผู้เล่นอื่นๆ ( ไอเทมหรือเงินใน IC )</h6><br>
                                    กระทำผิดครั้งที่ 1 - <a style="color:#bf0000	;"> &nbsp;จำคุก 240 นาที</a> และ
                                    ยึดของที่โกงคืนให้ผู้เสียหาย และ<a style="color:#FF9966	;"> &nbsp;แจกใบเหลือง</a>
                                    <br>
                                    กระทำผิดครั้งที่ 2 - <a style="color:#bf0000	;"> &nbsp;แจกใบแดง</a>
                                    เชิญออกจากประเทศ<br>
                                    <br>
                                    <h6>วรรค 3 - การทุจริต โกงผู้เล่นอื่นๆ ( ไอเทมหรือเงินใน OC )</h6><br>
                                    กระทำผิดครั้งเดียว - เชิญออกจากประเทศ และ<a style="color:#bf0000	;">
                                        &nbsp;ส่งข้อมูลที่มีทั้งหมดของผู้เล่นที่กระทำผิดให้ผู้เสียหายดำเนินคดีตามกฏหมาย</a>
                                    <br>
                                    <br>
                                    <h6>วรรค 4 - การใช้โปรแกรมโกงและใช้โปร</h6><br>
                                    กระทำผิดครั้งเดียว - <a style="color:#bf0000	;"> &nbsp;เชิญออกจากประเทศ และ
                                        ส่งข้อมูลสตรีมผู้เล่นที่กระทำผิดเข้าระบบ
                                        Global Ban
                                        เพื่อให้เข้าเล่นในเซิฟอื่นๆ ไม่ได้อีก</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </scetion>
                </div>
            </div>


            <!--discord *เสร็จแล้ว-->
            <script src="https://cdn.jsdelivr.net/npm/@widgetbot/crate@3" async defer>
                new Crate({
                    server: '772054063399305236',
                    channel: '772085739110268948'
                })
            </script>


</body>

</html>