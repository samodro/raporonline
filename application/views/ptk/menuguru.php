<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="asset/siswaguru/cssmenu/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <!--!script src="asset/siswaguru/script.js"></script-->
</head>
<body>

<div id='cssmenu'>
<ul>
   <li><a href="index.php/siswaguru/berandaGuru"><span>Home</span></a></li>
   <li class='last'><a href="index.php/ptk/pilihrombelguru"><span><?php echo $mapel["NAMA_MAPEL"]; ?></span></a></li>
   <!-- start: User Dropdown -->
                  <li class="dropdown">
                     <a data-toggle="dropdown" href="#">
                        <i class="halflings-icon white user"></i><?php echo $guru["NAMA_PTK"]; ?>
                        <span class="caret"></span>
                     </a>
                     <ul class="dropdown-menu">
                        <li><a href="#"><i class="halflings-icon user"></i>Profil Saya</a></li>
                        <li><a href="login.html"><i class="halflings-icon off"></i> Logout</a></li>
                     </ul>
                  </li>
                  <!-- end: User Dropdown -->
</ul>
</div>

</body>
<html>
