@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Perfil</h1>
@stop

@section('content')
    <p>Mi perfil.</p>
    <div class="wrapper">
        <div class="container">
    
            <div class="wraper">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="bg-picture text-center">
                            <div class="bg-picture-overlay"></div>
                            <div class="profile-info-name">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                <h3 class="text-white">John Deon</h3>
                            </div>
                        </div>
                        <!--/ meta -->
                    </div>
                </div>
                <div class="row user-tabs">
                    <div class="col-lg-6 col-md-9 col-sm-9">
                        <ul class="nav nav-tabs tabs" style="width: 100%;">
                            <li class="active tab" style="width: 25%;">
                                <a href="#home-2" data-toggle="tab" aria-expanded="false" class="active">
                                    <span class="visible-xs"><i class="fa fa-home"></i></span>
                                    <span class="hidden-xs">About Me</span>
                                </a>
                            </li>
                            <li class="tab" style="width: 25%;">
                                <a href="#profile-2" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-user"></i></span>
                                    <span class="hidden-xs">Activities</span>
                                </a>
                            </li>
                            <li class="tab" style="width: 25%;">
                                <a href="#messages-2" data-toggle="tab" aria-expanded="true">
                                    <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                                    <span class="hidden-xs">Projects</span>
                                </a>
                            </li>
                            <li class="tab" style="width: 25%;">
                                <a href="#settings-2" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                    <span class="hidden-xs">Settings</span>
                                </a>
                            </li>
                            <div class="indicator" style="right: 476px; left: 0px;"></div>
                            <div class="indicator" style="right: 476px; left: 0px;"></div>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-3 col-sm-3 hidden-xs">
                        <div class="pull-right">
                            <div class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle btn-rounded btn btn-primary waves-effect waves-light" href="#"> Following <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    <li><a href="#">Poke</a></li>
                                    <li><a href="#">Private message</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Unfollow</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
    
                        <div class="tab-content profile-tab-content">
                            <div class="tab-pane active" id="home-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Personal Information</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="about-info-p">
                                                    <strong>Full Name</strong>
                                                    <br>
                                                    <p class="text-muted">Johnathan Deo</p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Mobile</strong>
                                                    <br>
                                                    <p class="text-muted">(123) 123 1234</p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Email</strong>
                                                    <br>
                                                    <p class="text-muted">johnathandeon @moltran.com</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Location</strong>
                                                    <br>
                                                    <p class="text-muted">USA</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Personal-Information -->
    
                                        <!-- Languages -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Languages</h3>
                                            </div>
                                            <div class="panel-body">
                                                <ul>
                                                    <li>English</li>
                                                    <li>Franch</li>
                                                    <li>Greek</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Languages -->
    
                                    </div>
    
                                    <div class="col-md-8">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Biography</h3>
                                            </div>
                                            <div class="panel-body">
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
    
                                                <p><strong>But also the leap into electronic typesetting, remaining essentially unchanged.</strong></p>
    
                                                <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                            </div>
                                        </div>
                                        <!-- Personal-Information -->
    
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Skills</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="m-b-15">
                                                    <h5>Angular Js <span class="pull-right">60%</span></h5>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-primary wow animated progress-animated" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%; visibility: hidden; animation-name: none;">
                                                            <span class="sr-only">60% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="m-b-15">
                                                    <h5>Javascript <span class="pull-right">90%</span></h5>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-pink wow animated progress-animated" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%; visibility: hidden; animation-name: none;">
                                                            <span class="sr-only">90% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="m-b-15">
                                                    <h5>Wordpress <span class="pull-right">80%</span></h5>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-purple wow animated progress-animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%; visibility: hidden; animation-name: none;">
                                                            <span class="sr-only">80% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="m-b-0">
                                                    <h5>HTML5 &amp; CSS3 <span class="pull-right">95%</span></h5>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-info wow animated progress-animated" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%; visibility: hidden; animation-name: none;">
                                                            <span class="sr-only">95% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
    
                                            </div>
                                        </div>
    
                                    </div>
    
                                </div>
                            </div>
    
                            <div class="tab-pane" id="profile-2">
                                <!-- Personal-Information -->
                                <div class="panel panel-default panel-fill">
    
                                    <div class="panel-body">
                                        <div class="timeline-2">
                                            <div class="time-item">
                                                <div class="item-info">
                                                    <div class="text-muted">5 minutes ago</div>
                                                    <p><strong><a href="#" class="text-info">John Doe</a></strong> Uploaded a photo <strong>"DSC000586.jpg"</strong></p>
                                                </div>
                                            </div>
    
                                            <div class="time-item">
                                                <div class="item-info">
                                                    <div class="text-muted">30 minutes ago</div>
                                                    <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                                    <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                                </div>
                                            </div>
    
                                            <div class="time-item">
                                                <div class="item-info">
                                                    <div class="text-muted">59 minutes ago</div>
                                                    <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                                    <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                                </div>
                                            </div>
    
                                            <div class="time-item">
                                                <div class="item-info">
                                                    <div class="text-muted">5 minutes ago</div>
                                                    <p><strong><a href="#" class="text-info">John Doe</a></strong>Uploaded 2 new photos</p>
                                                </div>
                                            </div>
    
                                            <div class="time-item">
                                                <div class="item-info">
                                                    <div class="text-muted">30 minutes ago</div>
                                                    <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                                    <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                                </div>
                                            </div>
    
                                            <div class="time-item">
                                                <div class="item-info">
                                                    <div class="text-muted">59 minutes ago</div>
                                                    <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                                    <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                                </div>
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                                <!-- Personal-Information -->
                            </div>
    
                            <div class="tab-pane" id="messages-2">
                                <!-- Personal-Information -->
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">My Projects</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Project Name</th>
                                                        <th>Start Date</th>
                                                        <th>Due Date</th>
                                                        <th>Status</th>
                                                        <th>Assign</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Moltran Admin</td>
                                                        <td>01/01/2015</td>
                                                        <td>07/05/2015</td>
                                                        <td><span class="label label-info">Work in Progress</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Moltran Frontend</td>
                                                        <td>01/01/2015</td>
                                                        <td>07/05/2015</td>
                                                        <td><span class="label label-success">Pending</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Moltran Admin</td>
                                                        <td>01/01/2015</td>
                                                        <td>07/05/2015</td>
                                                        <td><span class="label label-pink">Done</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Moltran Frontend</td>
                                                        <td>01/01/2015</td>
                                                        <td>07/05/2015</td>
                                                        <td><span class="label label-purple">Work in Progress</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Moltran Admin</td>
                                                        <td>01/01/2015</td>
                                                        <td>07/05/2015</td>
                                                        <td><span class="label label-warning">Coming soon</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
    
                                                </tbody>
                                            </table>
                                        </div>
    
                                    </div>
                                </div>
                                <!-- Personal-Information -->
                            </div>
    
                            <div class="tab-pane" id="settings-2">
                                <!-- Personal-Information -->
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Profile</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form role="form">
                                            <div class="form-group">
                                                <label for="FullName">Full Name</label>
                                                <input type="text" value="John Doe" id="FullName" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="Email">Email</label>
                                                <input type="email" value="first.last@example.com" id="Email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="Username">Username</label>
                                                <input type="text" value="john" id="Username" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="Password">Password</label>
                                                <input type="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="RePassword">Re-Password</label>
                                                <input type="password" placeholder="6 - 15 Characters" id="RePassword" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="AboutMe">About Me</label>
                                                <textarea style="height: 125px" id="AboutMe" class="form-control">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</textarea>
                                            </div>
                                            <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
                                        </form>
    
                                    </div>
                                </div>
                                <!-- Personal-Information -->
                            </div>
                        </div>
                    </div>
                </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
