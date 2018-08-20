<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title text-center">Add Tag</h4>
</div>
<?php echo form_open_multipart(base_url() . 'faq-master/add', array('class' => 'form-horizontal margin-top-30', 'id' => 'add-tag-form')); ?>

<div class="modal-body">

    <div class="row gap-20">

        <div class="col-xs-12 col-sm-12">
			<div class="form-group form-group-lg">
				<label>Question:</label>
				<input name="faq_question" type="text" class="form-control" placeholder="Enter the question..."/>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12">
			<div class="form-group">
				<label>Brief Description(answer):</label>
				<textarea name="faq_answer" class="bootstrap3-wysihtml5 form-control" rows="10"></textarea>
			</div>
		</div>

    </div>

</div>
<div class="modal-footer text-center">
    <span class="message33"></span>
    <button type="submit" class="submit_btn btn btn-primary">Add</button>
    <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
</div>
<?php echo form_close(); ?>