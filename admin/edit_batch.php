<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>
<div class="content-main"><div class="container-fluid"><div class="row"><div class="col-sm-12 col-md-12">
<h3>Edit Batch</h3>
<p>This page helps you to edit batch details such as name.</p>
<hr />
<div class="row q-data"><div class="col-sm-12 col-md-12 col-lg-12"><div class="portlet-body">
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12">
<form class="form-horizontal" id="edit_batch_1" action="/en/admin/batches/1" accept-charset="UTF-8" method="post">
<input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="_method" value="patch" />
<input type="hidden" name="authenticity_token" value="cpAgUJBiyulzllc2f4uT/RXHP34rPyMyEfiHtmIIBNShx46UL5OAaft/RotgyT54qUSvByK5+WwOYqAev9Nz1g==" />
<div class="form-group"><label class="col-sm-3 control-label" for="batch_name">Name</label><div class="col-sm-6">
<input placeholder="Batch name" class="form-control" required="required" maxlength="50" size="50" type="text" value="2016-17" name="batch[name]" id="batch_name" />
<div class="help-block with-errors"></div></div></div>
<br /><hr /><div class="row"><div class="col-md-12"><div class="btn-row">
<input type="submit" name="commit" value="Submit" class="btn green batch-submit-btn vx-cust-btn btn-rgt" data-disable-with="Submit" />
<a class="btn default vx-cust-btn" href="/en/admin/batches">Back</a></div></div></div>
</form></div></div></div></div></div></div></div></div></div></div>
<?php include("includes/footer.php"); ?>
</div>
</body></html>