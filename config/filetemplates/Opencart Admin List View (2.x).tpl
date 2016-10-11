<?php echo ${DS}header; ?>
<?php echo ${DS}column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><a href="<?php echo ${DS}add; ?>" data-toggle="tooltip" title="<?php echo ${DS}button_add; ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="button" data-toggle="tooltip" title="<?php echo ${DS}button_delete; ?>" class="btn btn-danger" onclick="confirm('<?php echo ${DS}text_confirm; ?>') ? ${DS}('#form-option').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1><?php echo ${DS}heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach (${DS}breadcrumbs as ${DS}breadcrumb) { ?>
        <li><a href="<?php echo ${DS}breadcrumb['href']; ?>"><?php echo ${DS}breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if (${DS}error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo ${DS}error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <?php if (${DS}success) { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo ${DS}success; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> <?php echo ${DS}text_list; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo ${DS}delete; ?>" method="post" enctype="multipart/form-data" id="form-option">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="${DS}('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-right"></td>
                  <td class="text-left"></td>
                  <td class="text-left"></td>
                  <td class="text-right"><?php echo ${DS}column_action; ?></td>
                </tr>
              </thead>
              <tbody>
               
              </tbody>
            </table>
          </div>
        </form>
        <div class="row">
          <div class="col-sm-6 text-left"><?php echo ${DS}pagination; ?></div>
          <div class="col-sm-6 text-right"><?php echo ${DS}results; ?></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo ${DS}footer; ?>