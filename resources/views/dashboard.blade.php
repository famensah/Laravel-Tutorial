@extends('layouts.default')
@section('page-title', 'Dashboard')
@section('content')

    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Three charts -->
    <!-- ============================================================== -->
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Total Tasks Assigned</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li>
                        <div id="sparklinedash3"><canvas width="67" height="30"
                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                    </li>
                    <li class="ms-auto"><span class="counter text-info">{{24}}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Completed Tasks</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li>
                        <div id="sparklinedash"><canvas width="67" height="30"
                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                    </li>
                    <li class="ms-auto"><span class="counter text-success">{{2}}</span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Pending tasks</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li>
                        <div id="sparklinedash2"><canvas width="67" height="30"
                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                    </li>
                    <li class="ms-auto"><span class="counter text-purple">{{8}}</span></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="d-md-flex mb-3">
                    <h3 class="box-title mb-0">Recent sales</h3>
                    <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                        <select class="form-select shadow-none row border-top">
                            <option>March 2021</option>
                            <option>April 2021</option>
                            <option>May 2021</option>
                            <option>June 2021</option>
                            <option>July 2021</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- ============================================================== -->
        <!-- Recent Comments -->
        <!-- ============================================================== -->
        <div class="row">
        <!-- .col -->
        <div class="col-md-12 col-lg-8 col-sm-12">
            <div class="card white-box p-0">
                <div class="card-body">
                    <h3 class="box-title mb-0">Recent Comments</h3>
                </div>
                <div class="comment-widgets">
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row p-3 mt-0">
                        <div class="p-2"><img src="{{asset('assets/plugins/images/users/varun.jpg')}}" alt="user" width="50" class="rounded-circle"></div>
                        <div class="comment-text ps-2 ps-md-3 w-100">
                            <h5 class="font-medium">James Anderson</h5>
                            <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry.It has survived not only five centuries. </span>
                            <div class="comment-footer d-md-flex align-items-center">
                                    <span class="badge bg-primary rounded">Pending</span>
                                    
                                <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">April 14, 2021</div>
                            </div>
                        </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row p-3">
                        <div class="p-2"><img src="{{asset('assets/plugins/images/users/genu.jpg')}}" alt="user" width="50" class="rounded-circle"></div>
                        <div class="comment-text ps-2 ps-md-3 active w-100">
                            <h5 class="font-medium">Michael Jorden</h5>
                            <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry.It has survived not only five centuries. </span>
                            <div class="comment-footer d-md-flex align-items-center">

                                <span class="badge bg-success rounded">Approved</span>
                                
                                <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">April 14, 2021</div>
                            </div>
                        </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row p-3">
                        <div class="p-2"><img src="{{asset('assets/plugins/images/users/ritesh.jpg')}}" alt="user" width="50" class="rounded-circle"></div>
                        <div class="comment-text ps-2 ps-md-3 w-100">
                            <h5 class="font-medium">Johnathan Doeting</h5>
                            <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry.It has survived not only five centuries. </span>
                            <div class="comment-footer d-md-flex align-items-center">

                                <span class="badge rounded bg-danger">Rejected</span>
                                
                                <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">April 14, 2021</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="card white-box p-0">
                <div class="card-heading">
                    <h3 class="box-title mb-0">Chat Listing</h3>
                </div>
                <div class="card-body">
                    <ul class="chatonline">
                        <li>
                            <div class="call-chat">
                                <button class="btn btn-success text-white btn-circle btn" type="button">
                                    <i class="fas fa-phone"></i>
                                </button>
                                <button class="btn btn-info btn-circle btn" type="button">
                                    <i class="far fa-comments text-white"></i>
                                </button>
                            </div>
                            <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                    src="{{asset('assets/plugins/images/users/varun.jpg')}}" alt="user-img" class="img-circle">
                                <div class="ms-2">
                                    <span class="text-dark">Varun Dhavan <small
                                            class="d-block text-success d-block">online</small></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="call-chat">
                                <button class="btn btn-success text-white btn-circle btn" type="button">
                                    <i class="fas fa-phone"></i>
                                </button>
                                <button class="btn btn-info btn-circle btn" type="button">
                                    <i class="far fa-comments text-white"></i>
                                </button>
                            </div>
                            <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                    src="{{asset('assets/plugins/images/users/genu.jpg')}}" alt="user-img" class="img-circle">
                                <div class="ms-2">
                                    <span class="text-dark">Genelia
                                        Deshmukh <small class="d-block text-warning">Away</small></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="call-chat">
                                <button class="btn btn-success text-white btn-circle btn" type="button">
                                    <i class="fas fa-phone"></i>
                                </button>
                                <button class="btn btn-info btn-circle btn" type="button">
                                    <i class="far fa-comments text-white"></i>
                                </button>
                            </div>
                            <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                    src="{{asset('assets/plugins/images/users/ritesh.jpg')}}" alt="user-img" class="img-circle">
                                <div class="ms-2">
                                    <span class="text-dark">Ritesh
                                        Deshmukh <small class="d-block text-danger">Busy</small></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="call-chat">
                                <button class="btn btn-success text-white btn-circle btn" type="button">
                                    <i class="fas fa-phone"></i>
                                </button>
                                <button class="btn btn-info btn-circle btn" type="button">
                                    <i class="far fa-comments text-white"></i>
                                </button>
                            </div>
                            <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                    src="{{asset('assets/plugins/images/users/arijit.jpg')}}" alt="user-img" class="img-circle">
                                <div class="ms-2">
                                    <span class="text-dark">Arijit
                                        Sinh <small class="d-block text-muted">Offline</small></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="call-chat">
                                <button class="btn btn-success text-white btn-circle btn" type="button">
                                    <i class="fas fa-phone"></i>
                                </button>
                                <button class="btn btn-info btn-circle btn" type="button">
                                    <i class="far fa-comments text-white"></i>
                                </button>
                            </div>
                            <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                    src="{{asset('assets/plugins/images/users/govinda.jpg')}}" alt="user-img"
                                    class="img-circle">
                                <div class="ms-2">
                                    <span class="text-dark">Govinda
                                        Star <small class="d-block text-success">online</small></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="call-chat">
                                <button class="btn btn-success text-white btn-circle btn" type="button">
                                    <i class="fas fa-phone"></i>
                                </button>
                                <button class="btn btn-info btn-circle btn" type="button">
                                    <i class="far fa-comments text-white"></i>
                                </button>
                            </div>
                            <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                    src="{{asset('assets/plugins/images/users/hritik.jpg')}}" alt="user-img" class="img-circle">
                                <div class="ms-2">
                                    <span class="text-dark">John
                                        Abraham<small class="d-block text-success">online</small></span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->

@stop