<?php echo ${DS}header; ?><?php echo ${DS}column_left; ?>
    <div id="content">

        <ul class="breadcrumb">
            <?php foreach (${DS}breadcrumbs as ${DS}breadcrumb) { ?>
                <li><a href="<?php echo ${DS}breadcrumb['href']; ?>"><?php echo ${DS}breadcrumb['text']; ?></a></li>
            <?php } ?>
        </ul>

        <div class="page-header">
            <div class="container-fluid">
                <div class="pull-right">
                    <button type="submit" form="form-${NAME}" data-toggle="tooltip"
                            title="<?php echo ${DS}button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i>
                    </button>
                    <a target="_blank" onclick="location = '<?php echo ${DS}support_url; ?>';" data-toggle="tooltip"
                       title="<?php echo ${DS}button_support; ?>" class="btn btn-default"><i
                            class="fa fa-life-ring"></i></a>
                    <a href="<?php echo ${DS}cancel; ?>" data-toggle="tooltip" title="<?php echo ${DS}button_cancel; ?>"
                       class="btn btn-default"><i class="fa fa-reply"></i></a>
                </div>
                <h1><i class="fa fa-puzzle-piece"></i> <?php echo ${DS}heading_title; ?></h1>
            </div>
        </div>

        <div class="container-fluid">
            <?php if (${DS}error_warning) { ?>
                <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo ${DS}error_warning; ?>
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            <?php } ?>


            <form action="<?php echo ${DS}action; ?>" method="post" enctype="multipart/form-data" id="form-${NAME}"
                  class="form-horizontal">

                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-settings" data-toggle="tab"><?php echo ${DS}entry_settings; ?></a>
                    </li>

                </ul>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo ${DS}text_edit_description; ?>
                        </h3>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"
                               for="input-status"><?php echo ${DS}entry_status; ?></label>
                        <div class="col-sm-10">
                            <select name="status" id="input-status" class="form-control">
                                <?php if (${DS}status) { ?>
                                    <option value="1" selected="selected"><?php echo ${DS}text_enabled; ?></option>
                                    <option value="0"><?php echo ${DS}text_disabled; ?></option>
                                <?php } else { ?>
                                    <option value="1"><?php echo ${DS}text_enabled; ?></option>
                                    <option value="0" selected="selected"><?php echo ${DS}text_disabled; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="panel panel-settings">
                    <div class="form-group">

                    </div>
                </div>
                
            </form>
        </div>
        
    </div>
    
    <script type="application/javascript">

    </script>


<?php echo ${DS}footer; ?>