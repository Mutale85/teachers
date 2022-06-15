<?php 
    if (isset($_POST['navigation'])):
    include("includes/db.php");
    $parent_id = $_SESSION['parent_id']; 
?>
<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Searches</div>
                    <div class="widget-subheading">All time Searches</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span><?php echo searchCounter($connect, $parent_id);?></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4 our_clients" id="<?php echo $parent_id?>" style="cursor: pointer;">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Added Clients</div>
                    <div class="widget-subheading">Total Clients Submitted</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span><?php echo fetchAddedClients($connect, $parent_id);?></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-grow-early">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Tokens</div>
                    <div class="widget-subheading"> Remaining Tokens </div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span><?php echo getAvailableTokens($connect, $parent_id);?></span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>