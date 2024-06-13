<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>Questioner Register | Quizaert</title>

        <?php base_url() . include 'include.php'; ?>
    </head>
    <style>
        .swal-overlay {
            z-index: 2000 !important; /* Adjust the z-index value as needed */
        }
    </style>
    <body >
        <div class="login" style="background-image: url(<?= isset($background_file['message']) && !empty($background_file['message']) ? base_url() . LOGO_IMG_PATH . $background_file['message'] : base_url() . LOGO_IMG_PATH .'background-image-stock.png'; ?>); background-position: center;">
            <div class="overlay">
                <div id="app">
                    <section class="login-section">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="card login_card">
                                        <div class="login-brand" style="margin-bottom: 8px;">
                                            
                                        </div>
                                        <div class="login-welcome-text">
                                            <h2>Register (Questioner)</h2><span style="color:red;">( * Marked Field are Mandatory)</span>
                                        </div>
                                        <div class="card-body" style="margin-top: -5px;">
                                            <form method="POST" id="form-submit" data-action="<?= base_url() ?>questioner-add" enctype="multipart/form-data">
                                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                                
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="email">Select Questioner Category<span style="color:red;">*</span></label>
                                                            <select name="category" class="form-control">
                                                                <option value="">Select category</option>
                                                                <?php foreach($category as $res){?>
                                                                <option value="<?= $res->id; ?>"><?= $res->name; ?> - Fees <?= $res->fees; ?> - <?= $res->validity; ?>Days</option>
                                                                <?php }?>
                                                            </select>
                                                            <span class="error error-category"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="email">Questioner Name<span style="color:red;">*</span></label>
                                                            <input type="text" class="form-control" name="name" placeholder="Enter Questioner Name" autofocus>
                                                            <span class="error error-name"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="email">Designation</label>
                                                            <input type="text" class="form-control" name="degination" placeholder="Enter Degination" autofocus>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="email">Contact No<span style="color:red;">*</span></label>
                                                            <input type="number" class="form-control" name="contact" placeholder="Enter Contact No" autofocus>
                                                            <span class="error error-contact"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="email">E-mail /id<span style="color:red;">*</span></label>
                                                            <input type="email" class="form-control" name="email" placeholder="Enter Email" autofocus>
                                                            <span class="error error-email"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="email">Select identity Type<span style="color:red;">*</span></label>
                                                            <select name="identity_type" class="form-control">
                                                                <option value="">Select Identity Type</option>
                                                                <option value="Aadhaar card">Aadhaar Card</option>
                                                                <option value="DL">DL</option>
                                                                <option value="ND">ND</option>
                                                                <option value="Pan Card">Pan Card</option>
                                                            </select>
                                                            <span class="error error-identity_type"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="email">Identity No<span style="color:red;">*</span></label>
                                                            <input type="text" class="form-control" name="identity_no" placeholder="Enter Identity No" autofocus>
                                                            <span class="error error-identity_no"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label">Identity image</label>
                                                        <input id="update_file" name="identity_image" type="file" accept="image/*" class="form-control">
                                                        <span class="error error-identity_image"></span>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <label class="control-label">Questioner image</label>
                                                        <input id="update_file" name="questioner_image" type="file" accept="image/*" class="form-control">
                                                        <span class="error error-questioner_image"></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="email">User Name<span style="color:red;">*</span></label>
                                                            <input type="text" class="form-control" name="username" placeholder="Enter Username" autofocus>
                                                            <span class="error error-username"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="email">Password<span style="color:red;">*</span></label>
                                                            <input type="text" class="form-control" name="password" placeholder="8 Characters" autofocus>
                                                            <span class="error error-password"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="email">Confirm Password<span style="color:red;">*</span></label>
                                                            <input type="text" class="form-control" name="confirm_password" placeholder="8 Characters" autofocus>
                                                            <span class="error error-confirm_password"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group text-right">
                                                    <a href="<?= base_url() ?>questioner-login"><button type="button" class="btn btn-info btn-lg">
                                                        Close
                                                    </button></a>
                                                    <input type="submit" name="btnadd" class="btn btn-primary btn-lg" value="Register">
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        

        <!-- General JS Scripts -->
        <script src="<?= base_url(); ?>assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- Template JS File -->
        <script src="<?= base_url(); ?>assets/js/stisla.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>assets/js/scripts.js" type="text/javascript"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <!-- Toast JS -->
        <script src="<?= base_url(); ?>assets/js/iziToast.min.js"></script>

        <?php if ($this->session->flashdata('error')) { ?>
            <script type='text/javascript'>
                iziToast.error({
                    message: '<?= $this->session->flashdata('error'); ?>',
                    position: 'topRight'
                });
            </script>
        <?php } ?>
        
        <script>
          $(document).on('submit','#form-submit',function(e){
           e.preventDefault();
           var action = $(this).data("action");
           var fd = new FormData(this);
            $.ajax({
                url: action,
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    console.log(response.msg);
                    if(response.status == "false"){
                            $(".error").text(" ");
                            $.each(response.msg, function (key, val) {
                                console.log(key);
                                $(".error-"+key).text(val).css('color', '#eb3d3d');
                        });
                    }else{
                        $('.login_card').css('display', 'none');
                        Swal.fire({
                            title: "Success !",
                            text: response.msg,
                            confirmButtonColor: '#17a2b8',
                            type: "success"
                        }).then(function() {
                            window.location.href = response.return_url;
                        });
                    }
                }
            });
           
        });
    </script>
        
    </body>

</html>
