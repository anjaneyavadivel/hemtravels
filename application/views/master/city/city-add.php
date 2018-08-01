<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title text-center">Add city</h4>
</div>
<?php echo form_open_multipart(base_url() . 'city-master/add', array('class' => 'form-horizontal margin-top-30', 'id' => 'add-city-form')); ?>

<div class="modal-body">

    <div class="row gap-20">

        <div class="col-sm-12 col-md-12">
            <div class="form-group form-group-lg">
                <label>city Name:</label>
                <input name="city_name" type="text" class="form-control" placeholder="Enter the city name..."/>
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