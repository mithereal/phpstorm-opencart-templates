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
	  <button type="submit" form="form-${NAME}" data-toggle="tooltip" title="<?php echo ${DS}button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
	  <a href="<?php echo ${DS}cancel; ?>" data-toggle="tooltip" title="<?php echo ${DS}button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><i class="fa fa-bars"></i> <?php echo ${DS}heading; ?></h1>
    </div>
  </div>
  <div class="container-fluid">
    <?php if (${DS}error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo ${DS}error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
	<form action="<?php echo ${DS}action; ?>" method="post" enctype="multipart/form-data" id="form-${NAME}" class="form-horizontal">
	<ul class="nav nav-tabs">
        <li class="active"><a href="#tab-general" data-toggle="tab"><?php echo ${DS}tab_general; ?></a></li>
      
    </ul>
	<div class="tab-content">
	    <div class="tab-pane active" id="tab-general">
          
	      <div class="tab-content">
		
          </div>
		</div>
		
	</div>	
    </form>
  </div>
</div>

<?php echo ${DS}footer; ?> 