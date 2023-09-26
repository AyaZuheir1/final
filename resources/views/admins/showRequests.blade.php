@include('../layouts/header')
<!-- <!DOCTYPE html>

<html lang="en">
	begin::Head-->
	<head><base href="../../">
		
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		
		<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />

	</head>

	<body id="kt_body" class="header-tablet-and-mobile-fixed aside-enabled" style="background-color: white;">
		
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
				
				
							
							
				
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Layout-->
								<div class="d-flex flex-column flex-lg-row">
									<!--begin::Content-->
									<div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
										
										<div class="card card-flush pt-3 mb-5 mb-xl-10">
											<!--begin::Card header-->
											<div class="card-header">
												<!--begin::Card title-->
												<div class="card-title">
													<h2>Requests</h2>
												</div>
												
											</div>
											
											<div class="card-body pt-2">
												<div id="kt_referred_users_tab_content" class="tab-content">
													<!--begin::Tab panel-->
													<div id="kt_customer_details_invoices_1" class="tab-pane fade show active" role="tabpanel">
														<!--begin::Table wrapper-->
														<div class="table-responsive">
															<!--begin::Table-->
															<table id="kt_customer_details_invoices_table_1" border="2" class="table table-hover align-middle table-row-dashed fs-6 fw-bolder gs-0 gy-4 p-0 m-0">
																<!--begin::Thead-->
																<thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
																	<tr class="text-start text-gray-400">
																		<th class="min-w-100px">UserName</th>
																		<th class="min-w-100px">HallName</th>
																		<th class="min-w-100px">day</th>
																		<th class="min-w-100px">date</th>
																		<th class="min-w-125px">Start Time</th>
																		<th class="min-w-125px">end Time</th>
																		<th class="min-w-100px">Status</th>

																	</tr>
																</thead>
																<!--end::Thead-->
																<!--begin::Tbody-->
																<tbody class="fs-6 fw-bold text-gray-600">
																@foreach($bookingRequests as $request)
                                                                <tr>
																		<td>
																			<a href="#" class="text-gray-600 text-hover-primary">{{ $request->user->first_name}}</a>
																		</td>
																		<td>
																			<a href="#" class="text-gray-600 text-hover-primary">{{$request->hall->name}}</a>
																		</td>
																		<td > {{ Carbon\Carbon::parse($request->start_time )->format('l') }}  </td>
																		<td > {{ Carbon\Carbon::parse($request->start_time )->format('d-m-y') }}  </td>
																		<td > {{ Carbon\Carbon::parse($request->start_time )->format('H:i:s') }}  </td>
																		<td > {{ Carbon\Carbon::parse($request->end_time )->format('H:i:s') }}  </td>
																		<!-- <td > {{ $request->start_time }} </td> -->
																		<!-- <td > {{ $request->end_time }} </td> -->
																		<!-- <td>Oct 24, 2020</td>
																		<td>Nov 01, 2020</td> -->
																		<td class="">
																			<form method="post" action="{{ route('requestStatus',$request) }}">
																				@csrf
																				@method('put')
																			<button name="status" value="approved" class="btn btn-sm btn-light btn-active-light-primary">Accept</button>
																			<button name="status" value="denied" class="btn btn-sm btn-light btn-active-light-primary">Reject</button>
																			<input type="text" name="reason" class="">	
																		</form>
																		</td>
																	</tr>
																	@endforeach
																
																
																</tbody>
																<!--end::Tbody-->
															</table>
															<!--end::Table-->
														</div>
														<!--end::Table wrapper-->
													</div>
												
													<!--end::Tab panel-->
												</div>
												<!--end::Tab Content-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Content-->
									<!--begin::Sidebar-->
									<div class="flex-column flex-lg-row-auto w-lg-250px w-xl-300px mb-10 order-1 order-lg-2">
									
									</div>
								</div>
							</div>
						</div>
					</div>
		
				</div>
			</div>
		</div>
	
		<script>var hostUrl = "{{ asset('assets/')}}";</script>
	
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>
	
		<script src="{{ asset('assets/js/custom/widgets.js')}}"></script>
		<script src="{{ asset('assets/js/custom/apps/chat/chat.js')}}"></script>
		<script src="{{ asset('assets/js/custom/modals/create-app.js')}}"></script>
		<script src="{{ asset('assets/js/custom/modals/upgrade-plan.js')}}"></script>
		
	</body>
</html>