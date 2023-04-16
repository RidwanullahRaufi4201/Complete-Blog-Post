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
  
            <div class="card">
                <div class="d-flex justify-content-between align-items-center ">
                    <h1 class="h4 text-gray-800 mx-3">Post</h1>
                    <a href="{{route('post.create')}}" class="btn btn-sm btn-primary mr-3 ">Create Post</a>
                </div>
                <div class="card-body">
                
                    <table class="table table-striped table-sm">
                        <thead>
                          <tr>
                            <th >ID</th>
                            <th >Sub-Title</th>
                            <th >Title</th>
                            <th>Action</th>

                         
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                          <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->subtitle}}</td>
                             <td>
                                <a href="{{route('post.edit',['post'=>$post->id])}}" class="btn btn-sm btn-primary rounded"><i class="fa fa-edit "></i></a>
                                <a href="{{route('post.delete',['post'=>$post->id])}}" class="btn btn-sm btn-primary rounded"><i class="fa fa-trash"></i></a>
                             </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
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