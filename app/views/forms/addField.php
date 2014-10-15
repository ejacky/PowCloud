<?php echo $header; ?>
    <div class="">
        <?php echo \Utils\FormBuilderHelper::begin(); //注册表单JS ?>
        <form id="forms" class="form-horizontal child_form" method="post">
            <fieldset>
                <legend>添加字段</legend>
                <div class="control-group">
                    <label for="field" class="control-label">字段:</label>

                    <div class="controls">
                        <input name="field" class="form-control" value="" type="text" placeholder="" id="field">
                    </div>
                </div>

                <div class="control-group">
                    <label for="label" class="control-label">标签*:</label>

                    <div class="controls">
                        <input name="label" class="form-control" value="" type="text" placeholder="" id="label">
                    </div>
                </div>
                <!--                <div class="control-group">-->
                <!--                    <label for="dataType" class="control-label">数据类型*:</label>-->
                <!--                    <div class="controls">-->
                <!--                        --><?php //echo Form::select('dataType',Config::get('params.dataType'),'',array('class'=>'form-control')); ?>
                <!--                    </div>-->
                <!--                </div>-->
                <div class="control-group">
                    <label for="type" class="control-label">类型*:</label>

                    <div class="controls">
                        <?php echo Form::select('type', Config::get('params.formField'), '', array('class' => 'form-control JFieldType')); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label for="default_value" class="control-label">默认值:</label>

                    <div class="controls JDefaultValue">
                        <input name="default_value" class="form-control" type="text" value="" placeholder="默认值"
                               id="default_value">
                    </div>
                </div>

                <div class="control-group">
                    <label for="rules" class="control-label">验证规则:</label>

                    <div class="controls">
                        <?php echo Form::textarea('rules', '', array('class' => 'form-control')) ?>
                    </div>
                </div>
                <div class="control-group">
                    <label for="rank" class="control-label">排序:</label>

                    <div class="controls">
                        <input name="rank" class="form-control" type="text" value="" placeholder="默认值" id="rank">
                    </div>
                </div>
                <div class="control-group">
                    <label for="rank" class="control-label">列表是否可见:</label>

                    <div class="controls">
                        <?php echo Form::select('isVisible', array('1' => '可见', '0' => '不可见'), '', array('class' => 'form-control')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label for="isEditable" class="control-label">是否可输入:</label>

                    <div class="controls">
                        <?php echo Form::select('isEditable', array(1 => '可输入', 0 => '不可输入'), (int)1, array('class' => 'form-control')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label for="isEditable" class="control-label">角色可见:</label>

                    <div class="controls">
                        <?php echo Form::select('visibleByGroup', array('0' => '无限制') + Group::getGroups(), (int)0, array('class' => 'form-control')); ?>
                    </div>
                </div>

                <input type="hidden" value="<?php echo $table->id ?>" name="models_id">

                <div class="form-actions">
                    <button id="JS_Sub" class="btn btn-primary" type="submit">修改</button>
                    <button class="btn" onclick="history.back();">取消</button>
                </div>
            </fieldset>
        </form>
        <?php echo \Utils\FormBuilderHelper::staticEnd('forms',
            array( //表单规则
                'label' => array('required' => true),
            ),
            URL::action('FormsController@storeField', array('table' => $table->id)),
            'POST'
        );//注册表单JS
        ?>
    </div>
<?php echo $footer; ?>
<?php echo $ajaxInput; ?>