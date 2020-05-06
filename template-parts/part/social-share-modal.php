<!-- Social Share Modal -->
<div class="modal fade" id="socialShare" tabindex="-1" role="dialog" aria-labelledby="socialShareLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center;">
                <h2>Share This Message</h2>
            </div>
            <div class="modal-body" style="text-align:center;">
                <div class="row">
                    <div class="col-xs-4">
                        <?php $lqd_share_url = get_permalink() ?>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $lqd_share_url ?>"
                           target="_blank"
                           onclick="window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="https://twitter.com/intent/tweet?url=<?php echo $lqd_share_url ?>&hashtags=liquidchurch"
                           target="_blank"
                           onclick="window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="mailto:?subject=Watch this message from Liquid Church&body=<?php echo $lqd_share_url ?>"><i
                                class="fa fa-envelope"></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label name="Link to Current Message">
                            <input id="lqdCopyLinkInput" style="margin-top: 25px;" type="text" value="<?php echo $lqd_share_url ?>">
                        </label>
                        <br>
                        <span id="lqdCopyLinkClick" style="margin-top:15px;"><button id="lqdCopyButton" class="btn">Copy Link</button></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- /Social Share Modal -->
