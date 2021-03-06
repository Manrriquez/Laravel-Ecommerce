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

                    <form class="forms-sample" action="{{ url('admin/updateAdminPassword') }} method="post">
                        @csrf
                        <div class="form-group">
                            <label >E-mail</label>
                            <input type="text" class="form-control" value="{{ $adminDetails['email'] }}" readonly="">
                        </div>

                        <div class="form-group">
                            <label>Tipo</label>
                            <input type="text" class="form-control" value="{{ $adminDetails['type'] }}" readonly="">
                        </div>

                        <div class="form-group">
                            <label >Atual Senha</label>
                            <input type="password" name="current_name" id="current_name" class="form-control" placeholder="Password" value="{{ $adminDetails['password'] }}" readonly="">
                            <span id="check_password"></span>
                        </div>
                        <div class="form-group">
                            <label >Senha nova</label>
                            <input id="new_password" name="new_password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label >Confirmar Senha</label>
                            <input type="password" name="confirm_Password" id="confirm_password" class="form-control" placeholder="Password" required>
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