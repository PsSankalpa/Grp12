<html>
<head>
<title>Doctor's Reports</title>
<?php $this -> view ("header",$data)?>
<link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/viewSchedule.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="background">
        <div class="container1">
        <div class="container2">
            
                <img src="<?=ASSETS?>img/avatar.png" alt="Person" style="width:100%">
                    <h4><b>Dr.W.M.S.Perera</b></h4>
         
            <ul>
                        <li><a href="#account"><i class="fa fa-fw fa-home"></i>My Account</a></li>
                        <li><a href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book"></i>Schedule</a></li>
                        <li><a href="#feedback"><i class="fa fa-fw fa-comment"></i>Feedback</a></li>
                        <li><a href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar"></i>Appointments</a></li>
                        <li><a class="active" href="<?=ROOT?>doctor/reports"><i class="fa fa-fw fa-book"></i>Reports</a></li>
                    </ul>
                </div>
                <div class="container3">
                
                </div>
            </div>
        </div>
    </body>
</html>