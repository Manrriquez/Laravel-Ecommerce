@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Configurações</h3>
              <h6 class="font-weight-normal mb-0">Atualizar Senha Admin!</h6>
            </div>
            <div class="col-12 col-xl-4">
             <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                 <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                  <a class="dropdown-item" href="#">January - March</a>
                  <a class="dropdown-item" href="#">March - June</a>
                  <a class="dropdown-item" href="#">June - August</a>
                  <a class="dropdown-item" href="#">August - November</a>
                </div>
              </div>
             </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Atualizar Senha Admin</h4>
                    @if(Session::has('error_message'))

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error: </strong> {{ Session::get('error_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                     @endif

                     @if(Session::has('success_message'))

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success: </strong> {{ Session::get('success_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                      @endif
                      
                      @if($errors->any())

                          <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>

                                <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                    @foreach ($errors->all as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                          </div>

                      @endif

                    <form class="forms-sample" action="{{ url('admin/updateAdminDetails') }} method="post">
                        @csrf
                        <div class="form-group">
                            <label >E-mail</label>
                            <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly="">
                        </div>

                        <div class="form-group">
                            <label>Tipo</label>
                            <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->password }}" readonly="">
                        </div>

                        <div class="form-group">
                            <label for="admin_name">Nome</label>
                            <input type="type" class="form-control" id="admin_name" placeholder="Password" value="{{ Auth::guard('admin')->user()->name }}"  readonly="">
                        </div>
                        <div class="form-group">
                            <label for="admin_mobile">Celular</label>
                            <input type="text" name="admin_mobile" id="admin_mobile" class="form-control" placeholder="(11) 93229-5240" value="{{ Auth::guard('admin')->user()->mobile }}" required maxlength="15" minlength="10">
                        </div>
                        
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                    </div>
                </div>
            </div>
      </div>
    </div>
</div>
@endsection