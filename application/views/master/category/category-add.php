<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title text-center">Add Category</h4>
</div>
<?php echo form_open_multipart(base_url() . 'category-master/add', array('class' => 'form-horizontal margin-top-30', 'id' => 'add-category-form')); ?>

<div class="modal-body">

    <div class="row gap-20">

        <div class="col-sm-12 col-md-12">
            <div class="form-group form-group-lg">
                <label>Category Name:</label>
                <input name="category_name" type="text" class="form-control" placeholder="Enter the category name..."/>
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