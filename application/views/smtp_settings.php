<!DOCTYPE html>
<html lang="en">
    <head>        
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SMTP Settings | Quizart</title>   

        <?php base_url() . include 'include.php'; ?>  
    </head>

    <body>
        <div id="app">
            <div class="main-wrapper">
                <?php base_url() . include 'header.php'; ?>  

                <!-- Main Content -->
                <div class="main-content">
                    <section class="section">
                        <div class="section-header">
                            <h1>SMTP Settings</h1>
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
                                                        <label class="control-label">Protocol<span style="color:red;">*</span></label>
                                                        <input name="protocol" type="text" value="<?= $protocol->message; ?>" required class="form-control" placeholder="Enter Protocol"/>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">Smtp Host<span style="color:red;">*</span></label>
                                                        <input name="smtp_host" type="text" value="<?= $smtp_host->message; ?>" required class="form-control" placeholder="Enter Smtp Host"/>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">Smtp Port<span style="color:red;">*</span></label>
                                                        <input name="smtp_port" type="text" value="<?= $smtp_port->message; ?>" required class="form-control" placeholder="Enter Smtp Port"/>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">Smtp User<span style="color:red;">*</span></label>
                                                        <input name="smtp_user" type="text" value="<?= $smtp_user->message; ?>" required class="form-control" placeholder="Enter Smtp User"/>
                                                    </div>
                                                </div>
                                                
                                                 <div class="form-group row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">Smtp Pass<span style="color:red;">*</span></label>
                                                        <input name="smtp_pass" type="text" value="<?= $smtp_pass->message; ?>" required class="form-control" placeholder="Enter Smtp Pass"/>
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
