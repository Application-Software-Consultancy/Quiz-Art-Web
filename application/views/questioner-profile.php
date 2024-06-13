<!DOCTYPE html>
<html lang="en">
    <head>        
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Profile | Quizart</title>   

        <?php base_url() . include 'include.php'; ?>  
    </head>

    <body>
        <div id="app">
            <div class="main-wrapper">
                <?php base_url() . include 'questioner_header.php'; ?>  

                <!-- Main Content -->
                <div class="main-content">
                    <section class="section">
                        <div class="section-header">
                            <h1>Profile</h1>
                        </div>
                        <div class="section-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body mt-4">
                                            <form method="post" class="needs-validation" novalidate=""  enctype="multipart/form-data">
                                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">Select Questioner Category<span style="color:red;">*</span></label>
                                                        <select class="form-control" disabled>
                                                            <option>Select Category</option>
                                                            <?php foreach($category as $res){?>
                                                            <option value="<?= $res->id;?>" <?php if($userdata->category == $res->id){ echo "selected"; }?> ><?= $res->name;?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">Questioner Name<span style="color:red;">*</span></label>
                                                        <input name="name" type="text" value="<?= $userdata->name;?>" required class="form-control" placeholder="Enter Questioner Name"/>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">User Name<span style="color:red;">*</span></label>
                                                        <input name="username" type="text" value="<?= $userdata->auth_username;?>" required class="form-control" placeholder="Enter User Name" readonly/>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">Contact No<span style="color:red;">*</span></label>
                                                        <input name="contact" type="text" value="<?= $userdata->contact;?>" required class="form-control" placeholder="Enter Contact No"/ readonly>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">E-mail /id<span style="color:red;">*</span></label>
                                                        <input name="email" type="text" value="<?= $userdata->email;?>" required class="form-control" placeholder="Enter E-mail /id" readonly/>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">Select identity Type<span style="color:red;">*</span></label>
                                                        <select name="identity_type" class="form-control">
                                                            <option value="">Select Identity Type</option>
                                                            <option value="Aadhaar card" <?php if($userdata->identity_type == "Aadhaar card"){ echo "selected"; }?>>Aadhaar Card</option>
                                                            <option value="DL" <?php if($userdata->identity_type == "DL"){ echo "selected"; }?>>DL</option>
                                                            <option value="ND" <?php if($userdata->identity_type == "ND"){ echo "selected"; }?>>ND</option>
                                                            <option value="Pan Card" <?php if($userdata->identity_type == "Pan Card"){ echo "selected"; }?>>Pan Card</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">Identity No<span style="color:red;">*</span></label>
                                                        <input name="identity_no" type="text" value="<?= $userdata->identity_number;?>" required class="form-control" placeholder="Enter Identity No"/>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">Designation</label>
                                                        <input name="designation" type="text" value="<?= $userdata->degenation;?>" required class="form-control" placeholder="Enter Designation"/>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">Identity image</label>
                                                        <input name="identity_image" type="file" value="" class="form-control" placeholder="Enter Identity image"/>
                                                        <?php $image = (!empty($userdata->identity_image)) ? CATEGORY_IMG_PATH . $userdata->identity_image : '';?>
                                                        <span><img src="<?= $image; ?>" width="100" height="100"/></span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">Questioner image</label>
                                                        <input name="questioner_image" type="file" value="" class="form-control" placeholder="Enter Questioner image"/>
                                                        <?php $image = (!empty($userdata->questioner_image)) ? CATEGORY_IMG_PATH . $userdata->questioner_image : '';?>
                                                        <span><img src="<?= $image; ?>" width="100" height="100"/></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <input type="submit" name="btnadd" value="Submit" class="<?= BUTTON_CLASS ?>"/>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </div>

        <?php base_url() . include 'footer.php'; ?>

    </body>
</html>
