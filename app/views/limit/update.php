<?php echo $header; ?>

<div class="" style="margin-top:20px;">
    <?php echo \Utils\FormBuilderHelper::begin(); //注册表单JS ?>
    <form data-status="0" id="group_form" class="form-horizontal" onsubmit="return check_form(this)">
        <div class="form-group">
            <label for="groupName" class="control-label">用户组名*:</label>

            <div class="controls col-md-5">
            <input name="group[groupName]" class="form-control" value="<?php echo $limit->groupName; ?>" type="text"
                       placeholder="用户组名称" id="name">
            </div>
        </div>
        <?php foreach ($models as $model): ?>
            <div class="form-group clearfix">

                <label for="<?php echo $model->table_name; ?>" class="control-label"><?php echo $model->table_alias; ?>
                    *:</label>

                <div class="controls" style="float: left; overflow: hidden; margin: 5px 0 0 15px; padding-left:5px;">
                <?php
                    if (!isset($dataModel[$model->table_name])) {
                        $default_check = true;

                    } else {
                        $default_check = ((count(array_unique($dataModel[$model->table_name])) == 1) && (reset($dataModel[$model->table_name]) != 2)) || !isset($dataModel[$model->table_name]);
                    }
                    ?>
                    <?php echo Form::radio('limit[' . $model->table_name . ']', 1, ($default_check) ? 'checked' : ''); ?>
                    无权限
                    <?php echo Form::radio('limit[' . $model->table_name . ']', 2, (isset($dataModel[$model->table_name]['read']) && $dataModel[$model->table_name]['read'] == 2 ? 'checked' : '')); ?>
                    只看权限
                    <?php echo Form::radio('limit[' . $model->table_name . ']', 3, (isset($dataModel[$model->table_name]['edit']) && $dataModel[$model->table_name]['edit'] == 2 ? 'checked' : '')); ?>
                    修改权限
                </div>
            </div>
        <?php endforeach; ?>
        <div class="form-actions">
            <button id="JS_Sub" class="btn btn-primary">更新</button>
            <a href="javascript:void (0)" class="btn btn-warning" onclick="history.back();">取消</a>
        </div>
    </form>
</div>
<script>
    $().ready(function () {
        $.validator.setDefaults({
            errorClass: 'error help-inline',
            errorElement: 'span',
            errorPlacement: function (error, element) {
                element.parent().parent().addClass('error');
                error.appendTo(element.parent());
            },
            success: function (label) {
                label.parent().parent().removeClass('error').addClass('success');
                label.html('<i class="glyphicon glyphicon-ok"></i>');
            }
        });
        var validate = $("#group_form").validate({
            rules: {"group[groupName]": "required"}
        });
    });

    function check_form(form) {
        $.ajax({
            url: '<?php echo URL::action('LimitController@update',array('limit'=>$limit->id));?>',
            data: $(form).serialize(),
            type: 'PUT',
            beforeSend: function () {
                $('#JS_Sub').attr('disabled', true);
            },
            success: function (re) {
                re = $.parseJSON(re);
                if (re.status == 'fail') {
                    alert(re.message);
                    $('#JS_Sub').attr('disabled', false);
                    return false;
                }
                alert('更新字段成功');
                location.href = re.successRedirect;
            }
        });

        return false;
    }
</script>
<?php echo $footer; ?>
