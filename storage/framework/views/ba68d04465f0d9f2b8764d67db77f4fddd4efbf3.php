<?php $__env->startSection('pagelevel'); ?>
	<style>
	.tabledes
	{
		color:black;
	}
	</style>
	
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('adminassets/vendors/datatables/css/dataTables.bootstrap.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('adminassets/vendors/datatables/css/buttons.bootstrap.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('adminassets/vendors/datatables/css/colReorder.bootstrap.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('adminassets/vendors/datatables/css/dataTables.bootstrap.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('adminassets/vendors/datatables/css/rowReorder.bootstrap.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('adminassets/vendors/datatables/css/buttons.bootstrap.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('adminassets/vendors/datatables/css/scroller.bootstrap.css')); ?>" />
    <link href="<?php echo e(URL::asset('adminassets/css/pages/tables.css')); ?>" rel="stylesheet" type="text/css"/>
	
    
    <script type="text/javascript" src="<?php echo e(URL::asset('adminassets/vendors/datatables/js/jquery.dataTables.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('adminassets/vendors/jeditable/js/jquery.jeditable.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('adminassets/vendors/datatables/js/dataTables.buttons.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('adminassets/vendors/datatables/js/dataTables.colReorder.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('adminassets/vendors/datatables/js/dataTables.responsive.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('adminassets/vendors/datatables/js/dataTables.rowReorder.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('adminassets/vendors/datatables/js/buttons.colVis.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('adminassets/vendors/datatables/js/buttons.html5.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('adminassets/vendors/datatables/js/buttons.print.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('adminassets/vendors/datatables/js/buttons.bootstrap.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('adminassets/vendors/datatables/js/pdfmake.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('adminassets/vendors/datatables/js/vfs_fonts.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('adminassets/vendors/datatables/js/dataTables.scroller.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('adminassets/js/pages/table-advanced.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<section class="content tabledes">
            <!-- Second Data Table -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="panel panel-default filterable">
                        <div class="panel-heading clearfix">
                            <div class="panel-title pull-left">
                                    <div class="caption">
                                        <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Products Table
                                    </div>
                                </div>
                                <div class="tools pull-right"></div>
                        </div>
					
                        <div class="panel-body table-responsive">
                                <table class="table table-striped table-bordered" id="table1">
								<?php echo e($data->links()); ?>

                                        <thead class="table_head">
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1"
                                            rowspan="1" colspan="1">Id
                                        </th>
										
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                 Member Name
                                            : activate to sort column ascending">Name
                                        </th>
										<th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                 Member Photo
                                            : activate to sort column ascending">Image
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                 Member Profile
                                            : activate to sort column ascending">Price
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                 Points
                                            : activate to sort column ascending">Sale Price
                                        </th>
										<th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                 Active
                                            : activate to sort column ascending">Category
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                 Active
                                            : activate to sort column ascending">Active
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                 Edit
                                            : activate to sort column ascending">Edit
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                 Delete
                                            : activate to sort column ascending">Delete
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr role="row">
                                        <td><?php echo e($product->id); ?></td>
                                        <td><?php echo e($product->name); ?></td>
										<td><img src="<?php echo e(URL::asset('images/products/')); ?>/<?php echo e($product->productimg); ?>" alt="This is an image" width="50px" height="50px"/></td>
                                        <td><?php echo e($product->price); ?></td>
										<td><?php echo e($product->saleprice); ?></td>
										<td><?php echo e($product->category); ?></td>
                                        <td><?php echo e($product->active); ?></td>
                                        <td>
											<form action='products/<?php echo e($product->id); ?>/edit' method="get">
												<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
												<button type="submit" class="updateRecord" data-id="<?php echo e($product->id); ?>" >Update</button>
											</form>
                                        </td>
                                        <td>
											<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
                                            <button class="deleteRecord" data-id="<?php echo e($product->id); ?>" >Delete</button>
                                        </td>
                                    </tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									
                                    </tbody>
                                </table>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal for showing delete confirmation -->
			<div class="modal fade" id="deleteconfirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="user_delete_confirm_title">
								Delete User
							</h4>
						</div>
						<div class="modal-body">
							Are you sure to delete this user? This operation is irreversible.
						</div>
						<div class="modal-footer">
							<button type="button" name="okbutton" id="okbutton" class="btn btn-danger">OK</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		<!--end of modal-->
        <div class="modal fade" id="editConfirmModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Confirm</h4>
                    </div>
                    <div class="modal-body">
                        <p>You are already editing a row, you must save or cancel that row before editing/deleting a new
                            row</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="saveConfirmModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Save Row</h4>
                    </div>
                    <div class="modal-body">
                        <p>Updated successfully, Do not forget to do some ajax to sync with backend.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
		<script>
			var id;
				var el,token ;
				$(".deleteRecord").click(function(){
					$('#deleteconfirm').modal('show');
					id = $(this).data("id");
					el = this;
					token = $("meta[name='csrf-token']").attr("content");
				});
				$('#okbutton').click(function(){
					$.ajax(
					{
						url: "products/destroy/"+id,
						type:"delete",
						data: {
							"id": id,
							"_token": token,
						},
						success: function ($data){
							setTimeout(function(){
								$('#deleteconfirm').modal('hide');
								$(el).closest( "tr" ).remove();
							}, 1000);
						}
					});
				});
		</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\grovers\resources\views/admin/products/listing.blade.php ENDPATH**/ ?>