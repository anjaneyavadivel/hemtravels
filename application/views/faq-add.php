
<?php
$id=$faqdetail['id'];
$question=$faqdetail['question'];
$answer=$faqdetail['answer'];
?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">faq <?=$title;?></h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<!-- Modal body -->
		<div class="modal-body">
			<?php echo form_open_multipart(base_url().$url,array('class'=>'form-horizontal','id'=>''));?>
					<div class="row gap-20">
						<div class="col-xs-12 col-sm-12">
							<div class="form-group form-group-lg">
								<label>Question:</label>
								<input name="question" type="text" class="form-control" placeholder="Enter the question..."/>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<label>Brief Description(answer):</label>
								<textarea name="answer" class="bootstrap3-wysihtml5 form-control" rows="10"></textarea>
							</div>
						</div>
					</div>
				<div class="modal-footer text-center">
					<span class="message33"></span>
					<button type="submit" class="submit_btn btn btn-primary">Add</button>
					<button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
				</div>
			<?php echo form_close(); ?>
		</div>
		<!--End Modal body -->
	</div>
</div>

