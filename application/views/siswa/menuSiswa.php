<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="asset/siswaguru/cssmenu/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="asset/siswaguru/script.js"></script>
</head>
<body>

<div id='cssmenu'>
<ul>
   <li><a href="index.php/pesertadidik/index"><span>Beranda</span></a></li>
   <?php if(isset($mapel2013) && count($mapel2013)>0): ?>
   <li class="dropdown">
        <a data-toggle="dropdown" href="#">
           Penilaian Antar Teman dan Diri Sendiri
           <span class="caret"></span>

        </a>
       
        <ul class="dropdown-menu">
            <?php for($i=0; $i<count($mapel2013); $i++): ?>                         
           <li><a href="index.php/penilaian/do_assesment_by_student/0/<?php echo $mapel2013[$i]->KODE_MAPEL;?>/<?php echo $mapel2013[$i]->ID_ROMBEL;?>"><i class=""></i><?php echo $mapel2013[$i]->NAMA_MAPEL; ?></a></li>                        
           <?php endfor; ?>
        </ul>
    </li>
   <?php endif; ?>
   <li class='last'><a href="index.php/pesertadidik/learning_report">Rekap hasil belajar</a></
</ul>
</div>
</body>
<html>
