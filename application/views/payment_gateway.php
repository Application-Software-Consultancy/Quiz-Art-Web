<!DOCTYPE html>
<html lang="en">
    <head>        
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Payment Gateway | Quizart</title>   

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
                            <h1>Payment Gateway</h1>
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
                                                        <label class="control-label">Payment Mode<span style="color:red;">*</span></label>
                                                        <input name="payment_mode" type="text" value="<?= $payment_mode->message; ?>" required class="form-control" placeholder="Enter Payment mode"/>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">Api Key<span style="color:red;">*</span></label>
                                                        <input name="api_key" type="text" value="<?= $api_key->message; ?>" required class="form-control" placeholder="Enter Api key"/>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">Api Secret<span style="color:red;">*</span></label>
                                                        <input name="api_secret" type="text" value="<?= $api_secret->message; ?>" required class="form-control" placeholder="Enter Api Secret"/>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">Payment Gateway Title<span style="color:red;">*</span></label>
                                                        <input name="payment_gateway_title" type="text" value="<?= $payment_gateway_title->message; ?>" required class="form-control" placeholder="Payment Gateway Title"/>
                                                    </div>
                                                </div>
                                                
                                                 <div class="form-group row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">Logo<span style="color:red;">*</span></label>
                                                        <input name="payment_logo" type="file" class="form-control"/>
                                                        <img src="<?= $payment_logo; ?>" width="50" height="50" />
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
