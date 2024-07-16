<!DOCTYPE html>
<html lang="en">
    <head>        
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Questions for Quiz | Quizart</title>   

        <?php base_url() . include 'include.php'; ?>  
        <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>
    </head>

    <body>
        
        <div id="app">
            <div class="main-wrapper">
                <?php base_url() . include 'header.php'; ?>  

                <!-- Main Content -->
                <div class="main-content">
                    <section class="section">
                        <div class="section-header">
                            <h1>All Questions</h1>
                        </div>
                        <div class="section-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <select id="filter_category" name="category" class="form-control select-category" required>
                                                        <option value="">Select Main Category</option>
                                                        <?php foreach ($category as $cat) { ?>
                                                            <option value="<?= $cat->id ?>"><?= $cat->name ?></option>
                                                        <?php } ?> 
                                                    </select>
                                                </div>
                                                <div class='col-md-3'>
                                                    <div class="add-subcategory">
                                                        <select class="form-control sub_category" required>
                                                            <option value = "">Select Sub Category</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class='col-md-3'>
                                                    <div class="select_class">
                                                        <select name="class" class="form-control" required>
                                                            <option value = "">Select Class</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class='col-md-3'>
                                                    <button class='<?= BUTTON_CLASS ?> btn-block form-control' id='filter_btn'>Filter Data</button>
                                                </div>
                                            </div>
                                            <div id="toolbar">
                                                <?php if (has_permissions('delete', 'questions')) { ?>
                                                    <!--<button class="btn btn-danger"  id="delete_multiple_questions" title="Delete Selected Questions"><em class='fa fa-trash'></em></button>					  -->
                                                <?php } ?>
                                            </div> 
                                            <table aria-describedby="mydesc" class='table-striped' id='question_list' 
                                                   data-toggle="table" data-url="<?= base_url() . 'Table/admin_question' ?>"
                                                   data-click-to-select="true" data-side-pagination="server" 
                                                   data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200, All]" 
                                                   data-search="true" data-toolbar="#toolbar" 
                                                   data-show-columns="true" data-show-refresh="true" 
                                                   data-trim-on-search="false" data-mobile-responsive="true"
                                                   data-sort-name="id" data-sort-order="desc"  
                                                   data-pagination-successively-size="3" data-maintain-selected="true"
                                                   data-show-export="true" data-export-types='["csv","excel","pdf"]'
                                                   data-export-options='{ "fileName": "question-list-<?= date('d-m-y') ?>" }'
                                                   data-query-params="queryParams">
                                                <thead>
                                                    <tr>
                                                        <!--<th scope="col" data-field="state" data-checkbox="true"></th>-->
                                                        <th scope="col" data-field="sn" data-sortable="true" data-visible='true'>S No</th>
                                                        <th scope="col" data-field="name" data-sortable="true" data-visible='true'>Questioner</th>
                                                        <th scope="col" data-field="status" data-sortable="true" data-visible='true'>Status</th>
                                                        <th scope="col" data-field="category" data-sortable="true" data-visible='true'>Category</th>
                                                        <th scope="col" data-field="subcategory" data-sortable="true" data-visible='true'>Sub Category</th>
                                                        <th scope="col" data-field="class" data-sortable="true" data-visible='true'>Class</th>
                                                        <th scope="col" data-field="subject" data-sortable="true" data-visible='true'>Subject</th>
                                                        <th scope="col" data-field="chapter" data-sortable="true" data-visible='true'>Chapter</th>
                                                        <th scope="col" data-field="question" data-sortable="true">Question</th>
                                                        <th scope="col" data-field="answer" data-sortable="true" data-visible='true'>Correct Answer</th>
                                                        <th scope="col" data-field="lavel" data-sortable="true" data-visible='true'>Lavel</th>
                                                        <th scope="col" data-field="points" data-sortable="true" data-visible='true'>Points</th>
                                                        <th scope="col" data-field="operate" data-sortable="false">Action</th>
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
        
        <div class="modal fade" tabindex="-1" role="dialog" id="editDataModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Question Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <input type='hidden' name="edit_id" id="edit_id" value="" />
                                <input type="hidden" name="type" value="<?= $this->uri->segment(1) ?>" required/>
                                <input type="hidden" name="max_lavel" id="max_lavel" value="<?= $setting_data->message; ?>" required/>
                                
                                 <div class="form-group row">                                                    
                                    <div class="col-md-12 col-sm-12">
                                        <label class="control-label">Enter Lavel <small style="color:red;">( Max Lavel <?= $setting_data->message; ?> )</small></label>
                                        <input type='number' name="lavel" id="lavel" class="form-control" placeholder="Enter Lavel"/>
                                    </div>                                   
                                </div>
                                
                                <div class="form-group row">                                                    
                                    <div class="col-md-12 col-sm-12">
                                        <label class="control-label">Student Points</label>
                                        <input type='number' name="points" id="points" class="form-control" placeholder="Enter Student points"/>
                                    </div>                                   
                                </div>

                                <div class="form-group row">                                                    
                                    <div class="col-md-12 col-sm-12">
                                        <label class="control-label">Change Status</label>
                                        <select class="form-control" name="status" id="status">
                                           <option value="">Select Status</option> 
                                           <option value="1">Approved</option> 
                                           <option value="2">Disapproved</option> 
                                        </select>
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
                 $('#lavel').val($(this).data('lavel'));
                 $('#status').val($(this).data('status'));
                 $('#points').val($(this).data('points'));
            });
            
            $("#lavel").mouseleave(function(){
                var lavel = $(this).val();
                var max_lavel = $("#max_lavel").val();
                if(parseInt(lavel) > parseInt(max_lavel)){
                     $("#lavel").val(max_lavel);
                }
            });
            
        </script>
        
        <script>
            $(document).ready(function () {
                $('#question_list').on('post-body.bs.table', function() {
                    createCkeditor();
                })
            });
        </script>

        <script type="text/javascript">
            $('#filter_btn').on('click', function (e) {
                $('#question_list').bootstrapTable('refresh');
            });
            $('#delete_multiple_questions').on('click', function (e) {
                var base_url = "<?php echo base_url(); ?>";
                sec = 'tbl_questioner_question';
                is_image = 0;
                table = $('#question_list');
                delete_button = $('#delete_multiple_questions');
                selected = table.bootstrapTable('getSelections');
                ids = "";
                $.each(selected, function (i, e) {
                    ids += e.id + ",";
                });
                ids = ids.slice(0, -1);
                if (ids == "") {
                    alert("Please select some questions to delete!");
                } else {
                    if (confirm("Are you sure you want to delete all selected questions?")) {
                        $.ajax({
                            type: "POST",
                            url: base_url + 'delete_multiple',
                            data: 'ids=' + ids + '&sec=' + sec + '&is_image=' + is_image,
                            beforeSend: function () {
                                delete_button.html('<i class="fa fa-spinner fa-pulse"></i>');
                            },
                            success: function (result) {
                                if (result == 1) {
                                    alert("Questions deleted successfully");
                                } else {
                                    alert("Could not delete Questions. Try again!");
                                }
                                delete_button.html('<i class="fa fa-trash"></i>');
                                table.bootstrapTable('refresh');
                            }
                        });
                    }
                }
            });
            
            $('.select-category').on('change', function (e) {
                var ids = $(this).val();
                $(".add-subcategory").html("");
                var base_url = "<?php echo base_url(); ?>";
                $.ajax({
                    type: "GET",
                    url: base_url + 'get-subcategory',
                    data: 'ids=' + ids,
                    success: function (result) {
                        $(".add-subcategory").html(result);
                    }
                });
            });
            
            $(document).on('change', '.sub_category', function() {
                var ids = $(this).val();
                $(".select_class").html("");
                var base_url = "<?php echo base_url(); ?>";
                $.ajax({
                    type: "GET",
                    url: base_url + 'get-class',
                    data: 'ids=' + ids,
                    success: function (result) {
                        $(".select_class").html(result);
                    }
                });
            });
            
            $(document).on('change', '.class_select', function() {
                var ids = $(this).val();
                $(".select_subject").html("");
                var base_url = "<?php echo base_url(); ?>";
                $.ajax({
                    type: "GET",
                    url: base_url + 'get-subject',
                    data: 'ids=' + ids,
                    success: function (result) {
                        $(".select_subject").html(result);
                    }
                });
            });
            
        </script>

        <script type="text/javascript">
            $(document).on('click', '.delete-data', function () {
                if (confirm('Are you sure? Want to delete question? All related questions report will also be deleted')) {
                    var base_url = "<?php echo base_url(); ?>";
                    id = $(this).data("id");
                    image = $(this).data("image");
                    $.ajax({
                        url: base_url + 'delete_questions',
                        type: "POST",
                        data: 'id=' + id + '&image_url=' + image,
                        success: function (result) {
                            if (result) {
                                $('#question_list').bootstrapTable('refresh');
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
            var base_url = "<?php echo base_url(); ?>";
            var type = 'sub-category';

            $('#update_language_id').on('change', function (e, row_language_id, row_category, row_subcategory) {
                var language_id = $('#update_language_id').val();
                $.ajax({
                    type: 'POST',
                    url: base_url + 'get_categories_of_language',
                    data: 'language_id=' + language_id + '&type=' + type,
                    beforeSend: function () {
                        $('#edit_category').html('<option value="">Please wait..</option>');
                    },
                    success: function (result) {
                        $('#edit_category').html(result).trigger("change");
                        if (language_id == row_language_id && row_category != 0)
                            $('#edit_category').val(row_category).trigger("change", [row_category, row_subcategory]);
                    }
                });
            });

            $('#filter_language').on('change', function (e) {
                var language_id = $('#filter_language').val();
                $.ajax({
                    type: 'POST',
                    url: base_url + 'get_categories_of_language',
                    data: 'language_id=' + language_id + '&type=' + type,
                    beforeSend: function () {
                        $('#filter_category').html('<option value="">Please wait..</option>');
                    },
                    success: function (result) {
                        $('#filter_category').html(result);
                    }
                });
            });

            category_options = '';
            <?php
            $category_options = "<option value=''>Select Category</option>";
            foreach ($category as $cat) {
                $category_options .= "<option value=" . $cat->id . ">" . $cat->category_name . "</option>";
            }
            ?>
            category_options = "<?= $category_options; ?>";

            $('#edit_category').on('change', function (e, row_category, row_subcategroy) {
                var category_id = $('#edit_category').val();
                $.ajax({
                    type: 'POST',
                    url: base_url + 'get_subcategories_of_category',
                    data: 'category_id=' + category_id,
                    beforeSend: function () {
                        $('#edit_subcategory').html('<option value="">Please wait..</option>');
                    },
                    success: function (result) {
                        $('#edit_subcategory').html(result);
                        if (category_id == row_category && row_subcategroy != 0)
                            $('#edit_subcategory').val(row_subcategroy);
                    }
                });
            });

            $('#filter_category').on('change', function (e) {
                var category_id = $('#filter_category').val();
                $.ajax({
                    type: 'POST',
                    url: base_url + 'get_subcategories_of_category',
                    data: 'category_id=' + category_id,
                    beforeSend: function () {
                        $('#filter_subcategory').html('<option value="">Please wait..</option>');
                    },
                    success: function (result) {
                        $('#filter_subcategory').html(result);
                    }
                });
            });
        </script>       

        <script type="text/javascript">
            function queryParams(p) {
                return {
                    "language": $('#filter_language').val(),
                    "category": $('#filter_category').val(),
                    "subcategory": $('#filter_subcategory').val(),
                    sort: p.sort,
                    order: p.order,
                    offset: p.offset,
                    limit: p.limit,
                    search: p.search
                };
            }
        </script>

        <script type="text/javascript">
            $('input[name="edit_question_type"]').on("click", function (e) {
                var edit_question_type = $(this).val();

                if (edit_question_type == "2") {
                    $('#edit_tf').hide('fast');
                    $('#edit_a').val("<?= is_settings('true_value') ?>");
                    $('#edit_b').val("<?= is_settings('false_value') ?>");
                    $('#edit_c').removeAttr('required');
                    $('#edit_d').removeAttr('required');
                    $('#edit_e').removeAttr('required');
                    $('.edit_ntf').hide('fast');
                    $('#edit_answer').val('');
                } else {
                    $('#edit_tf').show('fast');
                    $('.edit_ntf').show('fast');
                    $('#edit_c').attr("required", "required");
                    $('#edit_d').attr("required", "required");
                    $('#edit_e').attr("required", "required");
                }
            });
        </script>

        <script type="text/javascript">
            var _URL = window.URL || window.webkitURL;

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
        </script>


    </body>
</html>