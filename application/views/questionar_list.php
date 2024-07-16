<!DOCTYPE html>
<html lang="en">
    <head>        
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Create and Manage Main Category | <?php echo ($app_name) ? $app_name['message'] : "" ?></title>   

        <?php base_url() . include 'include.php'; ?>  
    </head>
    <style>
        .table-head{
            background-color: #1e1295;
        }
        .table-color div{
            color:white;
        }
    </style>
    <body>
        <div id="app">
            <div class="main-wrapper">
                <?php base_url() . include 'header.php'; ?>  

                <!-- Main Content -->
                <div class="main-content">
                    <section class="section">
                        <div class="section-body mt-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Registered Questioner</h3>
                                        </div>

                                        <div class="card-body">
                                            
                                            <div id="toolbar">
                                                <?php if (has_permissions('delete', 'categories')) { ?>						
                                                    <button class="btn btn-danger" id="delete_multiple_categories" title="Delete Selected Categories"><em class='fa fa-trash'></em></button>
                                                    <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDataModal">Add New</button>-->
                                                <?php } ?>
                                            </div>
                                            <table aria-describedby="mydesc" class='table-striped' id='category_list' 
                                                   data-toggle="table" data-url="<?= base_url() . 'Table/questionar_list' ?>"
                                                   data-click-to-select="true" data-side-pagination="server" 
                                                   data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200, All]" 
                                                   data-search="true" data-toolbar="#toolbar" 
                                                   data-show-columns="true" data-show-refresh="true"
                                                   data-trim-on-search="false" data-mobile-responsive="true"
                                                   data-sort-name="id" data-sort-order="desc"    
                                                   data-pagination-successively-size="3" data-maintain-selected="true"
                                                   data-show-export="true" data-export-types='["csv","excel","pdf"]'
                                                   data-export-options='{ "fileName": "category-list-<?= date('d-m-y') ?>" }'
                                                   data-query-params="queryParams">
                                                <thead class="table-head">
                                                    <tr>
                                                        <th class="table-color" scope="col" data-field="state" data-checkbox="true"></th>
                                                        <th class="table-color" scope="col" data-field="sno" data-sortable="false">S.No</th>
                                                        <th class="table-color" scope="col" data-field="action" data-sortable="false">Action</th>
                                                        <th class="table-color" scope="col" data-field="status" data-sortable="true">Status</th>
                                                        <th class="table-color" scope="col" data-field="stand" data-sortable="true">Stand</th>
                                                        <th class="table-color" scope="col" data-field="image" data-sortable="false">Image</th>
                                                        <th class="table-color" scope="col" data-field="name" data-sortable="true">Questioner Name</th>
                                                        <th class="table-color" scope="col" data-field="contact" data-sortable="true">Contact No</th>
                                                        <th class="table-color" scope="col" data-field="regestration" data-sortable="true">Reg Date</th>
                                                        <th class="table-color" scope="col" data-field="expiry_date" data-sortable="true">Expiry Date</th>
                                                        <th class="table-color" scope="col" data-field="category_name" data-sortable="true">Category</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </div>
        
        <!--------------View------------>
        <div class="modal fade" tabindex="-1" role="dialog" id="viewDataModal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">View Questioner</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
                                <input type="hidden" name='image_url' id="image_url_view" value="" />
                                <input type="hidden" name="type" value="<?= $this->uri->segment(1) ?>" required/>

                                <div class="form-group row">                                                    
                                    <div class="col-md-6">
                                        <label class="control-label">Questioner Name</label>
                                        <input id="view-category-name" name="name" type="text" class="form-control" placeholder="Enter Category Name" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">User Name</label>
                                        <input id="view-username" name="name" type="text" class="form-control" placeholder="Enter Category Name" readonly>
                                    </div>
                                </div>
                                
                                <div class="form-group row">                                                    
                                    <div class="col-md-6">
                                        <label class="control-label">Designation</label>
                                        <input id="view-designation" name="name" type="text" class="form-control" placeholder="Enter Category Name" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">category</label>
                                        <select name="category" id="view-category" class="form-control" disabled>
                                            <option value = "">Select Category</option>
                                            <?php foreach($category as $res){?>
                                            <option value = "<?= $res->id ?>"><?= $res->name ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">                                                 
                                    <div class="col-md-6">
                                        <label class="control-label">Contact No</label>
                                        <input id="view-contact" name="contact" type="text" class="form-control" required placeholder="Enter Contact" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Identity No</label>
                                        <input id="view-identity_no" name="contact" type="text" class="form-control" required placeholder="Enter Contact" readonly>
                                    </div>
                                </div>
                                
                                <div class="form-group row">                                                 
                                    <div class="col-md-6">
                                        <label class="control-label">Email Id</label>
                                        <input id="view-email" name="contact" type="text" class="form-control" required placeholder="Enter Contact" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Identity Type</label>
                                        <input id="view-identity-type" name="registration" type="text" class="form-control" required placeholder="Enter Registration" readonly>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label class="control-label">Status</label>
                                        <div id="view_is_status"></div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="control-label">Stand</label>
                                        <div id="view_is_stand"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label class="control-label">Questioner Image</label>
                                        <div id="view_image"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="control-label">Identity Image</label>
                                        <div id="view_identity_image"></div>
                                    </div>
                                </div>

                                <div class="float-right">                                    
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="editDataModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Questioner</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <input type='hidden' name="edit_id" id="edit_id" value="" />
                                <input type="hidden" name='image_url' id="image_url" value="" />
                                <input type="hidden" name="type" value="<?= $this->uri->segment(1) ?>" required/>

                                <div class="form-group row">                                                    
                                    <div class="col-md-12 col-sm-12">
                                        <label class="control-label">Contributor Name</label>
                                        <input id="edit-category-name" name="name" type="text" class="form-control" readonly placeholder="Enter Category Name">
                                    </div>                                   
                                </div>
                                
                                 <div class="form-group row">                                                 
                                    <div class="col-md-12 col-sm-12">
                                        <label class="control-label">Select category</label>
                                        <select name="category" id="edit-category" class="form-control" disabled>
                                            <option value = "">Select Category</option>
                                            <?php foreach($category as $res){?>
                                            <option value = "<?= $res->id ?>"><?= $res->name ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">                                                 
                                    <div class="col-md-12 col-sm-12">
                                        <label class="control-label">Contact No</label>
                                        <input id="edit-contact" name="contact" type="text" class="form-control" required placeholder="Enter Contact" readonly>
                                    </div>
                                </div>
                                
                                <div class="form-group row">                                                 
                                    <div class="col-md-12 col-sm-12">
                                        <label class="control-label">Reg Date</label>
                                        <input id="edit-reg" name="registration" type="text" class="form-control" required placeholder="Enter Registration" readonly>
                                    </div>
                                </div>

                                <!--<div class="form-group row">                                                 -->
                                <!--    <div class="col-md-12 col-sm-12">-->
                                <!--        <label class="control-label">Image <small>( Leave it blank for no change )</small></label>-->
                                <!--        <input id="update_file" name="image" type="file" accept="image/*" class="form-control" readonly>-->
                                <!--        <small class="text-danger">Image type supported (png, jpg and jpeg)</small>-->
                                <!--        <p style="display: none" id="up_img_error_msg" class="badge badge-danger"></p>-->
                                <!--    </div>-->
                                <!--</div>-->
                                
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label class="control-label">Status</label>
                                        <label class="custom-switch d-block pl-0">
                                            <input type="checkbox" id="edit_is_status_switch" data-plugin="switchery">
                                        </label>
                                        <input type="hidden" id="edit_is_status" name="status" value="0">
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="control-label">Stand</label>
                                        <label class="custom-switch d-block pl-0">
                                            <input type="checkbox" id="edit_is_stand_switch" data-plugin="switchery">
                                        </label>
                                        <input type="hidden" id="edit_is_stand" name="stand" value="0">
                                    </div>
                                </div>

                                <div class="float-right">                                    
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input name="btnupdate" type="submit" value="Save changes" id="edit-form-save-button" class="<?= BUTTON_CLASS ?>">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php base_url() . include 'footer.php'; ?>
        
        <script type="text/javascript">
            $(document).on('click', '.edit-cat-data', function () {
                 $('#edit_id').val($(this).data('id'));
                 $('#image_url').val($(this).data('image'));
                 $('#edit-category-name').val($(this).data('cat_name'));
                 $('#edit-category').val($(this).data('cat_id'));
                 $('#edit-contact').val($(this).data('contact'));
                 $('#edit-reg').val($(this).data('regestration'));
                 var status = $(this).data('status');
                 var stand = $(this).data('stand');
                 if (status == 1) {
                     $('#edit_is_status').val(1);
                     var checkbox = $('#edit_is_status_switch');
                     checkbox.prop('checked', true);
                     checkbox.get(0).dispatchEvent(new Event('change'));
                 }else{
                     $('#edit_is_status').val(0);
                     var checkbox = $('#edit_is_status_switch');
                     checkbox.prop('checked', false);
                     checkbox.get(0).dispatchEvent(new Event('change'));
                 }
                 if (stand == 1) {
                     $('#edit_is_stand').val(1);
                     var checkbox = $('#edit_is_stand_switch');
                     checkbox.prop('checked', true);
                     checkbox.get(0).dispatchEvent(new Event('change'));
                 }else{
                     $('#edit_is_stand').val(0);
                     var checkbox = $('#edit_is_stand_switch');
                     checkbox.prop('checked', false);
                     checkbox.get(0).dispatchEvent(new Event('change'));
                 }
            });
            
            
            $(document).on('click', '.view-cat-data', function () {
                 $('#image_url_view').val($(this).data('image'));
                 $('#view-category-name').val($(this).data('cat_name'));
                 $('#view-category').val($(this).data('cat_id'));
                 $('#view-contact').val($(this).data('contact'));
                 $('#view-reg').val($(this).data('regestration'));
                 
                 $('#view-username').val($(this).data('username'));
                 $('#view-designation').val($(this).data('designation'));
                 $('#view-identity_no').val($(this).data('identity_number'));
                 $('#view-email').val($(this).data('email'));
                 $('#view-identity-type').val($(this).data('identity_type'));
                 
                 var status = $(this).data('status');
                 var stand = $(this).data('stand');
                 $('#view_is_status').text("");
                 $('#view_is_stand').text("");
                 $('#view_image').text("");
                 $('#view_identity_image').text("");
                 $('#view_image').append('<img src="'+$(this).data('image')+'" height="50," width="50">');
                 $('#view_identity_image').append('<img src="'+$(this).data('identity_image')+'" height="50," width="50">');
                 if (status == 1) {
                     $('#view_is_status').append('<span class="badge badge-success">Active</span>');
                 }else{
                     $('#view_is_status').append('<span class="badge badge-danger">Deactive</span>');
                 }
                 if (stand == 1) {
                     $('#view_is_stand').append('<span class="badge badge-success">Active</span>');
                 }else{
                     $('#view_is_stand').append('<span class="badge badge-danger">Deactive</span>');
                 }
            });
        </script>

        <script type="text/javascript">
            $('[data-plugin="switchery"]').each(function(index, element) {
                var init = new Switchery(element, {
                    size: 'small',
                    color: '#1abc9c',
                    secondaryColor: '#f1556c'
                });
            });

            var changeIsPremiumSwitch = document.querySelector('#edit_is_stand_switch');
            changeIsPremiumSwitch.onchange = function() {
                if (changeIsPremiumSwitch.checked){
                    $('#edit_is_stand').val(1);
                }
                else{
                    $('#edit_is_stand').val(0);
                }
            };
            
            var changeEditIsPremiumSwitch = document.querySelector('#edit_is_status_switch');
            changeEditIsPremiumSwitch.onchange = function() {
                if (changeEditIsPremiumSwitch.checked){
                    $('#edit_is_status').val(1);
                }
                else{
                    $('#edit_is_status').val(0);
                }
            };

            $('#filter_btn').on('click', function (e) {
                $('#category_list').bootstrapTable('refresh');
            });
            $('#delete_multiple_categories').on('click', function (e) {
                var base_url = "<?php echo base_url(); ?>";
                sec = 'tbl_questioner_list';
                is_image = 1;
                table = $('#category_list');
                delete_button = $('#delete_multiple_categories');
                selected = table.bootstrapTable('getSelections');
                ids = "";
                $.each(selected, function (i, e) {
                    ids += e.id + ",";
                });
                ids = ids.slice(0, -1);
                if (ids == "") {
                    alert("Please select some categories to delete!");
                } else {
                    if (confirm("Are you sure you want to delete all selected categories?")) {
                        $.ajax({
                            type: "POST",
                            url: base_url + 'delete_multiple',
                            data: 'ids=' + ids + '&sec=' + sec + '&is_image=' + is_image,
                            beforeSend: function () {
                                delete_button.html('<i class="fa fa-spinner fa-pulse"></i>');
                            },
                            success: function (result) {
                                if (result == 1) {
                                    alert("Categories deleted successfully");
                                } else {
                                    alert("Could not delete Categories. Try again!");
                                }
                                delete_button.html('<i class="fa fa-trash"></i>');
                                table.bootstrapTable('refresh');
                            }
                        });
                    }
                }
            });
        </script>

        <script type="text/javascript">
            window.actionEvents = {
                'click .edit-data': function (e, value, row, index) {
                    $('#edit_id').val(row.id);
                    $('#image_url').val(row.image_url);
                    $('#edit-category-slug').val(row.slug);
                    $('#language_id').val(row.language_id);
                    $('#edit-category-name').val(row.category_name);
                    var event = new Event('change');

                    if (row.is_premium == 1) {
                        $('#edit_is_premium').val(1);
                        var checkbox = $('#edit_is_premium_switch');
                        checkbox.prop('checked', true);
                        checkbox.get(0).dispatchEvent(new Event('change'));
                        $('.edit_coins').val(row.coins);
                    }else{
                        $('#edit_is_premium').val(0);
                        var checkbox = $('#edit_is_premium_switch');
                        checkbox.prop('checked', false);
                        checkbox.get(0).dispatchEvent(new Event('change'));
                        $('.edit_coins').val("");
                    }
                }
            };
        </script>

        <script type="text/javascript">
            $(document).on('click', '.delete-data', function () {
                if (confirm('Are you sure? Want to delete category? All related data will also be deleted')) {
                    var base_url = "<?php echo base_url(); ?>";
                    id = $(this).data("id");
                    image = $(this).data("image");
                    $.ajax({
                        url: base_url + 'delete_category',
                        type: "POST",
                        data: 'id=' + id + '&image_url=' + image,
                        success: function (result) {
                            if (result) {
                                $('#category_list').bootstrapTable('refresh');
                            } else {
                                var PERMISSION_ERROR_MSG = "<?= PERMISSION_ERROR_MSG; ?>";
                                ErrorMsg(PERMISSION_ERROR_MSG);
                            }
                        }
                    });
                }
            });
        </script>

        <script type="text/javascript">
            function queryParams(p) {
                return {
                    "type": '<?= $this->uri->segment(1) ?>',
                    "language": $('#filter_language').val(),
                    sort: p.sort,
                    order: p.order,
                    offset: p.offset,
                    limit: p.limit,
                    search: p.search
                };
            }
        </script>

        <script type="text/javascript">
            var _URL = window.URL || window.webkitURL;

            $("#file").change(function (e) {
                var file, img;

                if ((file = this.files[0])) {
                    img = new Image();
                    img.onerror = function () {
                        $('#file').val('');
                        $('#img_error_msg').html('<?= INVALID_IMAGE_TYPE; ?>');
                        $('#img_error_msg').show().delay(3000).fadeOut();
                    };
                    img.src = _URL.createObjectURL(file);
                }
            });

            $("#update_file").change(function (e) {
                var file, img;

                if ((file = this.files[0])) {
                    img = new Image();
                    img.onerror = function () {
                        $('#update_file').val('');
                        $('#up_img_error_msg').html('<?= INVALID_IMAGE_TYPE; ?>');
                        $('#up_img_error_msg').show().delay(3000).fadeOut();
                    };
                    img.src = _URL.createObjectURL(file);
                }
            });

            function isPremiumFormatter(value, row) {
                let html = "";
                if (row.is_premium == 1) {
                    html = "<span class='badge badge-success'>Yes</span>";
                } else{
                    html = "<span class='badge badge-danger'>No</span>";
                }
                return html;
            }
        </script>


        <script>
            var base_url = "<?php echo base_url(); ?>";

            const getCategorySlug = (categoryElement,slugElement) => {
                categoryElement.keyup(function(){
                    let editId = slugElement.parent().parent().parent().find('#edit_id').val();
                    $.ajax({
                        type: "POST",
                        url: base_url + 'get-category-slug',
                        data: {'id' : editId, 'category_name': $(this).val() },
                        beforeSend:function(){
                            slugElement.attr('readonly',true).val('Please wait....')
                        },
                        success: function(slug) {
                            if(slug != null) {
                                slugElement.removeAttr('readonly');
                                slugElement.val(slug);
                            }
                        }
                    });
                })   
            }
            getCategorySlug($('#category-name'),$('#category-slug'))
            getCategorySlug($('#edit-category-name'),$('#edit-category-slug'))
        </script>
    </body>
</html>