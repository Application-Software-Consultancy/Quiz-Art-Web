<!DOCTYPE html>
<html lang="en">
    <head>        
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Questions for Quiz | Questioner</title>   

        <?php base_url() . include 'include.php'; ?>  
        <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>
    </head>

    <body>
        <div id="app">
            <div class="main-wrapper">
                <?php base_url() . include 'questioner_header.php'; ?>  

                <!-- Main Content -->
                <div class="main-content">
                    <section class="section">
                        <div class="section-header">
                            <h1>Edit Question</h1>
                        </div>
                        <div class="section-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Add Questions</h4>
                                        </div>
                                        <div class="card-body">
                                            <form id="frmQuestion" method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
                                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                                <input type="hidden" id="edit_id" name="edit_id" required value="<?= $question_data->id ?>" aria-required="true">
                                                <div class="form-group row">                                               
                                                    <div class="col-md-4 col-sm-12">
                                                        <label class="control-label">Category</label>
                                                        <select id="category" name="category" class="form-control select-category" required>
                                                            <option value="">Select Main Category</option>
                                                            <?php foreach($category as $res){?>
                                                            <option value="<?= $res->id; ?>" <?php if($res->id == $question_data->category){ echo "selected"; }?>><?= $res->name; ?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <label class="control-label">Sub Category</label>
                                                        <div class="add-subcategory">
                                                            <select name="sub_category" class="form-control sub_category" required>
                                                                <option value = "<?= $question_data->subject; ?>"><?= $question_data->sub_name; ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <label class="control-label">Class</label>
                                                        <div class="select_class">
                                                            <select name="class" class="form-control edit_class" required>
                                                                <option value = "<?= $question_data->class; ?>"><?= $question_data->class_name; ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <label class="control-label">Subject</label>
                                                        <div class="select_subject">
                                                            <select name="subject" class="form-control edit_subject" required>
                                                                <option value = "<?= $question_data->subject; ?>"><?= $question_data->subject_name; ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <label class="control-label">Chapter</label>
                                                        <div class="select_chapter">
                                                            <select id="category" name="chapter" class="form-control edit_chapter" required>
                                                                <option value = "<?= $question_data->chapter; ?>"><?= $question_data->chapter_name; ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="control-label">Question</label>
                                                        <textarea id="question" name="question" class="form-control" required><?= $question_data->question; ?></textarea>
                                                    </div>                                                   
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="control-label">Option A</label>                                                
                                                        <textarea class="form-control" id="a" name="a" required><?= $question_data->optiona; ?></textarea>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="control-label">Option B</label>
                                                        <textarea class="form-control" id="b" name="b" required><?= $question_data->optionb; ?></textarea>
                                                    </div>
                                                </div>
                                                <div id="tf">
                                                    <div class="form-group row">                                                   
                                                        <div class="col-md-6 col-sm-6">
                                                            <label class="control-label">Option C</label>
                                                            <textarea class="form-control" id="c" name="c" required><?= $question_data->optionc; ?></textarea>
                                                        </div>                                                    
                                                        <div class="col-md-6 col-sm-6">
                                                            <label class="control-label">Option D</label>
                                                            <textarea class="form-control" id="d" name="d" required><?= $question_data->optiond; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">Correct Answer</label>                                                  
                                                        <select name='answer' id='answer' class='form-control' required>
                                                            <option value=''>Select Right Answer</option>
                                                            <option value='a' <?= ($question_data->answer == "a")?"selected":""; ?>>A</option>
                                                            <option value='b' <?= ($question_data->answer == "b")?"selected":""; ?>>B</option>
                                                            <option class='ntf' value='c' <?= ($question_data->answer == "c")?"selected":""; ?>>C</option>
                                                            <option class='ntf' value='d' <?= ($question_data->answer == "d")?"selected":""; ?>>D</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="control-label">Marks</label>
                                                        <input type='number' name='level' class='form-control' required min="0" value="<?= $question_data->level; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">                                                    
                                                    <div class="col-md-12 col-sm-12">
                                                        <label class="control-label">Explanation</label>
                                                        <textarea class="form-control" id="e" name="note" required><?= $question_data->note; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="submit" name="btnupdate" value="Submit" class="<?= BUTTON_CLASS ?>"/>
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

        <script type="text/javascript">
            MathJax = {
                tex: {
                    inlineMath: [['$', '$'], ['\\(', '\\)']]
                }
            };
        </script>
        
        <script>
            $('.select-category').on('change', function (e) {
                var ids = $(this).val();
                var base_url = "<?php echo base_url(); ?>";
                $(".add-subcategory").html("");
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
                var base_url = "<?php echo base_url(); ?>";
                $(".select_class").html("");
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
                var base_url = "<?php echo base_url(); ?>";
                $(".select_subject").html("");
                $.ajax({
                    type: "GET",
                    url: base_url + 'get-subject',
                    data: 'ids=' + ids,
                    success: function (result) {
                        $(".select_subject").html(result);
                    }
                });
            });
            
            $(document).on('change', '.subject_select', function() {
                var ids = $(this).val();
                var base_url = "<?php echo base_url(); ?>";
                $(".select_chapter").html("");
                $.ajax({
                    type: "GET",
                    url: base_url + 'get-chapter',
                    data: 'ids=' + ids,
                    success: function (result) {
                        $(".select_chapter").html(result);
                    }
                });
            });
        </script>
        
        <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js"></script>
        <script type="text/javascript">
            function ckeditor_initialize() {
                const CKEDITOR_CONFIG = {
                    extraPlugins: 'mathjax,notification',
                    mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
                    height: 100,
                    removeButtons: 'PasteFromWord,Anchor'
                    };

                    const requiredFieldWarning = 'This field is required.';

                    var editorIds;

                    <?php if (is_option_e_mode_enabled()) { ?>
                        editorIds = ['question', 'a', 'b', 'c', 'd', 'e', 'note'];
                    <?php }else{ ?>
                        editorIds = ['question', 'a', 'b', 'c', 'd','note'];
                    <?php } ?>


                    const editors = editorIds.map(id => {
                    const editor = CKEDITOR.replace(id, CKEDITOR_CONFIG);
                    editor.on('required', evt => {
                        editor.showNotification(requiredFieldWarning, 'warning');
                        evt.cancel();
                    });
                return editor;
                });
                if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
                    document.getElementById('ie8-warning').className = 'tip alert';
                }
            }
            ckeditor_initialize();
        </script>

        <script type="text/javascript">
            $('#filter_btn').on('click', function (e) {
                $('#question_list').bootstrapTable('refresh');
            });
            $('#delete_multiple_questions').on('click', function (e) {
                var base_url = "<?php echo base_url(); ?>";
                sec = 'tbl_question';
                is_image = 1;
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
            var sess_language_id = '<?= $sess_language_id ?>';
            var sess_category = '<?= $sess_category ?>';
            var sess_subcategory = '<?= $sess_subcategory ?>';
            $(document).ready(function () {
                if (sess_language_id != '0' || sess_category != '0') {
<?php if (is_language_mode_enabled()) { ?>
                        $('#language_id').val(sess_language_id).trigger("change", [sess_language_id, sess_category, sess_subcategory]);
<?php } else { ?>
                        $('#category').val(sess_category).trigger("change", [sess_category, sess_subcategory]);
<?php } ?>
                }
            });
            $('#language_id').on('change', function (e, row_language_id, row_category, row_subcategory) {
                var language_id = $('#language_id').val();
                $.ajax({
                    type: 'POST',
                    url: base_url + 'get_categories_of_language',
                    data: 'language_id=' + language_id + '&type=' + type,
                    beforeSend: function () {
                        $('#category').html('<option value="">Please wait..</option>');
                    },
                    success: function (result) {
                        $('#category').html(result).trigger("change");
                        if (language_id == row_language_id && row_category != 0)
                            $('#category').val(row_category).trigger("change", [row_category, row_subcategory]);
                    }
                });
            });

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

            $('#category').on('change', function (e, row_category, row_subcategroy) {
                var category_id = $('#category').val();
                $.ajax({
                    type: 'POST',
                    url: base_url + 'get_subcategories_of_category',
                    data: 'category_id=' + category_id,
                    beforeSend: function () {
                        $('#subcategory').html('<option value="">Please wait..</option>');
                    },
                    success: function (result) {
                        $('#subcategory').html(result);
                        if (category_id == row_category && row_subcategroy != 0)
                            $('#subcategory').val(row_subcategroy);
                    }
                });
            });

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
            $('input[name="question_type"]').on("click", function (e) {
                var question_type = $(this).val();
                if (question_type == "2") {
                    $('#tf').hide('fast');
                    $('#a').val("<?= is_settings('true_value') ?>");
                    $('#b').val("<?= is_settings('false_value') ?>");
                    $('#c').removeAttr('required');
                    $('#d').removeAttr('required');
                    $('#e').removeAttr('required');
                    $('#answer').val('');
                    $('.ntf').hide('fast');

                    $(document).ready(function () {
                        ckeditor_initialize();
                    });
                    const editorIds = ['c', 'd', 'e'];
                    editorIds.forEach(id => {
                        const editor = CKEDITOR.instances[id];
                        if (editor) {
                            editor.removeAllListeners();
                        }
                    });
                } else {
                    $('#a').val('');
                    $('#b').val('');
                    $('#tf').show('fast');
                    $('.ntf').show('fast');
                    $('#c').attr("required", "required");
                    $('#d').attr("required", "required");
                    $('#e').attr("required", "required");
                    $('#answer').val('');

                    $(document).ready(function () {
                        ckeditor_initialize();
                    });
                    
                    // Get the CKEditor instance
                    const editorIds = ['a', 'b', 'c', 'd', 'e'];    
                    const requiredFieldWarning = 'This field is required.';

                    editorIds.forEach(id => {
                        const editor = CKEDITOR.instances[id];
                        if (editor) {
                            editor.on('required', evt => {
                                editor.showNotification(requiredFieldWarning, 'warning');
                                evt.cancel();
                            });
                        }
                    });
                }
            });
           
        </script>

        <script type="text/javascript">
            if(<?= json_encode($question_id)?>){
                var question_type = "<?= $sess_question_type?>"
                if (question_type == "2") {
                    $('#tf').hide('fast');
                    $('#c').removeAttr('required').hide('fast');
                    $('#d').removeAttr('required').hide('fast');
                    $('#e').removeAttr('required').hide('fast');
                    $('.ntf').hide('fast');

                    $(document).ready(function () {
                        ckeditor_initialize();
                    });

                    const requiredFieldWarning = 'This field is required.';
                
                    const editorIds = ['c', 'd', 'e'];
                    editorIds.forEach(id => {
                        const editor = CKEDITOR.instances[id];
                        if (editor) {
                            editor.removeAllListeners();
                        }
                    });
                }else{
                    $('#tf').show('fast');
                    $('.ntf').show('fast');
                    $('#c').attr("required", "required").show();
                    $('#d').attr("required", "required").show();
                    $('#e').attr("required", "required").show();

                    $(document).ready(function () {
                        ckeditor_initialize();
                    });

                    // Get the CKEditor instance
                    const editorIds = ['a', 'b', 'c', 'd', 'e','note'];    
                    const requiredFieldWarning = 'This field is required.';

                    editorIds.forEach(id => {
                        const editor = CKEDITOR.instances[id];
                        if (editor) {
                            editor.on('required', evt => {
                                editor.showNotification(requiredFieldWarning, 'warning');
                                evt.cancel();
                            });
                        }
                    });
                }
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

    </body>
</html>