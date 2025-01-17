<!DOCTYPE html>
<html>

<head>
    <title>Ceylon Nurture|Profile</title>
    <?php $this->view("header") ?>
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <link rel="stylesheet" href="<?= ASSETS ?>css/myAccount.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/common1.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/commonStyle.css">
</head>

<body>
    <div class="profile">
        <div class="main-profile row">
            <div class="left">
            <div class="row">
            
           
            </div>
                <img src="<?= ASSETS2 . $data4->image ?>" class="pro-img" alt="profile-img">
               
            </div>
            <div class="right">

                <h3 class="txt-col1">Common</h3>
                <div class="row p2">
                    <div class="col-25">
                        <label for="nameWithInitials">Name with Initials</label>
                    </div>
                    <div class="col-50">
                    <label for="nameWithInitials"><?= $data4->nameWithInitials ?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="username">User Name</label>
                    </div>
                    <div class="col-50">
                        <label for="username"><?= $data4->username ?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="username">Gender</label>
                    </div>
                    <div class="col-50">
                        <label for="username"><?= $data4->gender ?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-50">
                        <label for="email"><?= $data4->email ?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="tpNumber">Telephone Number</label>
                    </div>
                    <div class="col-50">
                        <label for="tpNumber"><?= $data4->tpNumber ?></label>
                    </div>
                </div>
                <div class="m-btns">
                    <a href="<?= ROOT ?>/myAccount/editCommonUser/<?= $data4->userid ?>"><button class="editbtn txt-col1 bg-col4">Edit</button></a>
                    <a href="<?= ROOT ?>/myAccount/deleteCommonUser/<?= $data4->userid ?>"><button class="deletebtn txt-col1 bg-col3">Delete</button></a>
                </div>
                <?php if (($row == "seller") || ($row == "doctorAndSeller") || ($row == "sellerAndPatient") || ($row == "allUser")) : ?>
                    <!----------------------seller---------------------------------------------------------------------------->
                    <hr class="mg2 hr1 txt-col2">
                    <h3 class="txt-col1">Seller Section</h3>
                    <div class="row p2">
                        <div class="col-25">
                            <label for="nameWithInitials">Name with Initials</label>
                        </div>
                        <div class="col-50">
                            <label for="nameWithInitials"><?= $data1->nameWithInitials ?></label>
                        </div>
                    </div>
                    <div class="row p2">
                        <div class="col-25">
                            <label for="registrationNumber">Registration number</label>
                        </div>
                        <div class="col-50">
                            <label for="registrationNumber"><?= $data1->registrationNumber ?></label>
                        </div>
                    </div>
                    <div class="row p2">
                        <div class="col-25">
                            <label for="tpnumber">Telephone Number</label>
                        </div>
                        <div class="col-50">
                            <label for="tpnumber"><?= $data1->tpNumber ?></label>
                        </div>
                    </div>
                    <div class="row p2">
                        <div class="col-25">
                            <label for="nic">nic</label>
                        </div>
                        <div class="col-50">
                            <label for="nic"><?= $data1->nic ?></label>
                        </div>
                    </div>
                    <div class="row p2">
                        <div class="col-25">
                            <label for="address">Address</label>
                        </div>
                        <div class="col-50">
                            <label for="address"><?= $data1->address ?></label>
                        </div>
                    </div>
                    <div class="row p2">
                        <div class="col-25">
                            <label for="image">Seller certificate</label>
                        </div>
                        <div class="col-50">
                            <img class="pro-img1" src="<?= ASSETS2 . $data1->image ?> ">
                        </div>
                    </div>
                    <div class="m-btns">

                        <a href="<?= ROOT ?>/seller/editSeller"><button class="editbtn txt-col1 bg-col4">Edit</button></a>
                        <a href="<?= ROOT ?>/seller/deleteSeller/<?= $data1->userid ?>"><button class="deletebtn txt-col1 bg-col3">Delete</button></a>
                                     
                    </div>
                <?php endif; ?>
                <?php if (($row == "doctor") || ($row == "doctorAndSeller") || ($row == "doctorAndPatient") || ($row == "allUser")) : ?>
                    <!--------------------------doctor------------------------------------------------------------------------>
                    <hr class="mg2 hr1 txt-col2">
                    <h3 class="txt-col1">Doctor Section</h3>
                    <div class="row p2">
                        <div class="col-25">
                            <label for="nameWithInitials">Name with Initials</label>
                        </div>
                        <div class="col-50">
                            <label for="nameWithInitials"><?= $data2->nameWithInitials ?></label>
                        </div>
                    </div>
                    <div class="row p2">
                        <div class="col-25">
                            <label for="gender">Gender</label>
                        </div>
                        <div class="col-50">
                            <label for="gender"><?= $data2->gender ?></label>
                        </div>
                    </div>
                    <div class="row p2">
                        <div class="col-25">
                            <label for="registrationNumber">Registration Number</label>
                        </div>
                        <div class="col-50">
                            <label for="registrationNumber"><?= $data2->registrationNumber ?></label>
                        </div>
                    </div>
                    <div class="row p2">
                        <div class="col-25">
                            <label for="specialties">Specialties</label>
                        </div>
                        <div class="col-50">
                            <label for="specialties"><?= $data2->specialities ?></label>
                        </div>
                    </div>
                    <div class="row p2">
                        <div class="col-25">
                            <label for="hospital">Hospital</label>
                        </div>
                        <div class="col-50">
                            <label for="hospital"><?= $data2->hospital ?></label>
                        </div>
                    </div>
                    <div class="row p2">
                        <div class="col-25">
                            <label for="city">City</label>
                        </div>
                        <div class="col-50">
                            <label for="city"><?= $data2->city ?></label>
                        </div>
                    </div>
                    <div class="row p2">
                        <div class="col-25">
                            <label for="address">Address</label>
                        </div>
                        <div class="col-50">
                            <label for="address"><?= $data2->address ?></label>
                        </div>
                    </div>
                    <div class="row p2">
                        <div class="col-25">
                            <label for="image">Certificate</label>
                        </div>
                        <div class="col-50">
                            <img class="pro-img1" src="<?= ASSETS2 . $data2->image ?> ">
                        </div>
                    </div>
                    <div class="m-btns">
                        <a href="<?= ROOT ?>/doctor/editAccount/<?= $data2->userid ?>"><button class="editbtn txt-col1 bg-col4">Edit</button></a>
                        <a href="<?= ROOT ?>/doctor/deleteAccount/<?= $data2->userid ?>"><button class="deletebtn txt-col1 bg-col3">Delete</button></a>
                    </div>
                <?php endif; ?>
                <?php if (($row == "patient") || ($row == "doctorAndSeller") || ($row == "sellerAndPatient") || ($row == "allUser")) : ?>
                    <!------------------------patient-------------------------------------------------------------------------->
                    <hr class="mg2 hr1 txt-col2">
                    <h3 class="txt-col1">Patient Section</h3>
                
                    <div class="row p2">
                        <div class="col-25">
                            <label for="nic">nic</label>
                        </div>
                        <div class="col-50">
                            <label for="nic"><?= $data3->nic ?></label>
                        </div>
                    </div>
                    <div class="row p2">
                        <div class="col-25">
                            <label for="image">Image</label>
                        </div>
                        <div class="col-50">
                            <img class="pro-img1" src="<?= ASSETS2 . $data3->image ?> ">
                        </div>
                    </div>
                    <div class="m-btns">

                        <a href="<?= ROOT ?>/patient/patientUpdate"><button class="editbtn txt-col1 bg-col4">Edit</button></a>
                        <a href="<?= ROOT ?>/patient/deleteAccount/<?= $data3->userid ?>"><button class="deletebtn txt-col1 bg-col3">Delete</button></a>

                    </div>
                <?php endif; ?>
                <!-------------------------------------------------------------------------------------------------->
            </div>

        </div>
    </div>
    <!--footer-->
    <?php $this->view("footer") ?>
    <!--end of footer-->
</body>

</html>