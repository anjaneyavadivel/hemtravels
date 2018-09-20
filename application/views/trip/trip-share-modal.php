<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title text-center">Share Link</h4>
</div>

<div class="modal-body">

    <div class="row gap-20">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link " data-toggle="tab" href="#vendor" role="tab">Vendor Share</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link " data-toggle="tab" href="#link" role="tab">Link Share</a>
            </li>        
        </ul>

        <!-- Tab panes {Fade}  -->
        <div class="tab-content">
            <div class="tab-pane fade in" id="vendor" name="attributes" role="tabpanel"></div>
            <div class="tab-pane fade in active" id="link" name="attributes" role="tabpanel">
                <ul>
                    <li>Facebook : <a  target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url('trip-view/'.$tripCode)?>">Share on Facebook</a></li>
                    <li>Twitter : <a target="_blank" href="https://twitter.com/home?status=<?php echo base_url('trip-view/'.$tripCode)?>">Share on Twitter</a></li>
                    <li>Google Plus:<a target="_blank" href="https://plus.google.com/share?url=<?php echo base_url('trip-view/'.$tripCode)?>">Share on Google+</a></li>
                    <li>LinkedIn:<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=<?php echo base_url('trip-view/'.$tripCode)?>">Share on LinkedIn</a></li>
                    <li>Email:<a target="_blank" href="mailto:<?php echo base_url('trip-view/'.$tripCode)?>">Send Email</a></li>
                </ul>
                
            </div>
        </div>   

    </div>

</div>
<div class="modal-footer text-center">
    <span class="message33"></span>
    
    <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
</div>
