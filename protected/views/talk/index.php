<div class="row">
    <div class="col-xs-12">
        <?php echo CHtml::tag('ul', array('id' => 'chat')) ?>
    </div>
    <div class="col-xs-12">
        <?php echo CHtml::tag('div', array('id' => 'error')) ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id'=>'chat-form',
            'enableAjaxValidation'=>true,
            'enableClientValidation'=>true,
        )); ?>
        <?php echo $form->textField($phrase,'text', array('id' => 'message-text-field')); ?>
        <?php echo CHtml::Button('Отправить', array('id' => 'message-add-button', 'name' => 'message-add-button')) ?>
        <?php $this->endWidget(); ?>
    </div>
</div>
<script id="chat-line" type="text/template">
    <span><%= time %></span><%= text %>
</script>