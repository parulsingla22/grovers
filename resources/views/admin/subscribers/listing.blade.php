@extends('admin.layouts.master')
@section('pagelevel')
	<style>
	.tabledes,.modal
	{
		color:black;
	}
	</style>
@endsection
@section('content')
	<section class="content tabledes">
            <!-- Second Data Table -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="panel panel-danger table-edit">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                    <span>
                                    <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff"
                                       data-hc="white"></i>
                                    Subscribers Table</span>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div id="sample_editable_1_wrapper" class="">
                                <table class="table table-striped table-bordered table-hover dataTable no-footer"
                                       id="menutable" role="grid">
                                    <thead class="table_head">
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1"
                                            rowspan="1" colspan="1">Id
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                 Full Name
                                            : activate to sort column ascending">Email Id
                                        </th>
										<th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                 Full Name
                                            : activate to sort column ascending">Active
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                 Delete
                                            : activate to sort column ascending">Delete
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
									@foreach ($data as $subscribe)
                                    <tr role="row">
                                        <td>{{ $subscribe->id }}</td>
                                        <td>{{ $subscribe->emailid }}</td>
                                        <td>{{ $subscribe->active }}</td>
                                        <td>
											<meta name="csrf-token" content="{{ csrf_token() }}">
                                            <button id="deleteRecord" data-id="{{ $subscribe->id }}" >Delete</button>
                                        </td>
                                    </tr>
									@endforeach
                                    </tbody>
									{{ $data->links()}}
                                </table>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- content -->
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
        <div class="modal fade" id="editconfirm" tabindex="-1" role="dialog">
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
						<button type="button" name="editbutton" id="editbutton" class="btn btn-danger">OK</button>
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
			$("#deleteRecord").click(function(){
				$('#deleteconfirm').modal('show');
				id = $(this).data("id");
				el = this;
				token = $("meta[name='csrf-token']").attr("content");
			});
				$('#okbutton').click(function(){
					$.ajax(
					{
						url: "subscribers/destroy/"+id,
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
@endsection
