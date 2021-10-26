<html>
<head>
<title>Doctor's Schedule</title>
<?php $this -> view ("header",$data)?>
<meta name="viewport" content="width=device-width; initial-scale=1.0;">
<link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/addSchedule.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="background">
        <div class="container1">
        <div class="sidebar">
        <img src="<?=ASSETS?>img/avatar.png" alt="Person" class="pro-pic" width="200" height="100">
        <!--<h4><b>Dr.W.M.S.Perera</b></h4>-->
        <?php if($row):?>
            <h4><?=$row[0]->nameWithInitials?> </h4>
        <?php endif;?>

        <a href="<?=ROOT?>doctor/viewAccount"><i class="fa fa-fw fa-home"></i>  My Account</a>
        <a class="active" href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book"></i>  Schedule</a>
        <a href="<?=ROOT?>doctor/feedback"><i class="fa fa-fw fa-comment"></i>  Feedback</a>
        <a  href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar"></i>  Appointments</a>
        <a href="<?=ROOT?>doctor/reports"><i class="fa fa-fw fa-book"></i>  Reports</a>
        </div>
        <div class="container3">
          <!--for the errors-->
            <?php if(count($errors) > 0 ):?>
            <div class="alertwarning">
                <button class="closebtn" onclick="closebutton()">&times;</button>   
                <strong>Error!</strong> 
                <?php foreach($errors as $error ):?>
                <br /><?=$error?>
                <?php endforeach;?>
            </div>
            <?php endif;?>
                <div class="row">
                    <a href="<?=ROOT?>doctor/viewSchedule"><button class="viewbtn">View Slots</button></a>
                    <a href="<?=ROOT?>doctor/addSchedule"><button class="addbtn">Add Slots</button></a>
                </div>
                <form class="regi_form" enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label for="Slot Number">Slot Number</label>
                    </div>
                    <div class="col-75">
                        <input type="text" value="<?=get_var('slotNumber')?>" id="slotNumber" name="slotNumber" placeholder="01">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="Date of the slot">Date of the Slot</label>
                    </div>
                    <div class="col-75">
                        <input type="date" value="<?=get_var('dateofSlot')?>" id="dateofSlot" name="dateofSlot" placeholder="15/12/2021">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="Arrival Time">Arrival Time</label>
                    </div>
                    <div class="col-75">
                        <input type="text" value="<?=get_var('arrivalTime')?>" id="arrivalTime" name="arrivalTime" placeholder="8.00 ">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="Departure Time">Departure Time</label>
                    </div>
                    <div class="col-75">
                        <input type="text" value="<?=get_var('departureTime')?>" id="departureTime" name="departureTime" placeholder="12.00 ">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="No of patients">No of patients</label>
                    </div>
                    <div class="col-75">
                        <input type="text" value="<?=get_var('noOfPatient')?>" id="noOfPatient" name="noOfPatient" placeholder="16">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="Time per patient" >Time per patient</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="timePerPatient" value="<?=get_var('timePerPatient')?>" name="timePerPatient" placeholder="15 ">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="Doctor Charge" >Doctor Charge</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="doctorCharge" value="<?=get_var('doctorCharge')?>" name="doctorCharge" placeholder="2500">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="Doctor's Note" >Doctor's Note</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="doctorNote" value="<?=get_var('doctorNote')?>" name="doctorNote" placeholder="Note">
                    </div>
                </div>

                <div class="row">
                    <input type="submit" value="Schedule">
                </div>
                </form>
                <script type="text/javascript" src="<?=ASSETS?>js/sellerJs.js"></script>   
        </div>
    </div>
    </div>
</body>
</html>