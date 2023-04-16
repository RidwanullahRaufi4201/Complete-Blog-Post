@extends('layout.app')

@section('content')
 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

       

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">



              

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a  href="{{route('dashboard')}}" class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                        <img class="img-profile rounded-circle"
                            src="{{asset('backend/img/undraw_profile.svg')}}">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                     
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                     
                      
                        <a class="dropdown-item " href="#">
                            {{-- <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> --}}
                            <form method="POST" action="{{ route('logout') }}" >
                                @csrf
    
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                            
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
  
            <div class="card ">
                <div class="d-flex justify-content-between align-items-center ">
                    <h1 class="h4 text-gray-800 mx-3">Create Post</h1>
                    <a href="{{route('post.index')}}" class="btn btn-sm btn-primary mr-3 ">Back</a>
                </div>
                <div class="card-body p-2">
                
                <form action="{{route('post.store')}}" method="post" class="w-75 mx-auto" enctype="multipart/form-data">
                    @csrf
                          <div class="form-group ">
                                      <label for="" class="fw-bolder">Title</label>
                                      <input type="text" name="title" class="form-control form-control-sm">
                                      @error('title')
                                          <p class="text-danger">
                                              {{ $message }}
                                          </p>
                                      @enderror
                          </div>
                          <div class="form-group">
                            <label for="" class="fw-bolder">SubTitle</label>
                            <input type="text" name="subtitle" class="form-control form-control-sm">
                            @error('subtitle')
                                 <p class="text-danger">{{$message}}</p>
                            @enderror
                </div>
                <div class="form-group">
                    <label for="" class="fw-bolder">Description</label>
                    <textarea class="form-control form-control-sm my-editor" name="description"></textarea>
                    @error('description')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    
                    <input type="submit" value="save" class="btn btn-sm btn-primary">
                   </div>
                </form>
                </div>
              </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
    
@endsection