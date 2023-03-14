<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">






  <title>Hello, world!</title>
</head>

<body>
  @if(session()->has('message'))
  <div class="alert alert-success" style="color:white !important">
    {{ session()->get('message') }}
  </div>
  @elseif(session()->has('danger'))
  <div class="alert alert-danger" style="color:white !important">
    {{ session()->get('danger') }}
  </div>
  @endif

  <div class="container">
    <div class="main-content">
      <section class="section">
        <div class="section-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <h4>Companies</h4>
                  <a href="{{route('signout')}}"><button class="btn btn-primary">logout</button></a>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <form action="{{route('company.by.date')}}" method="GET">

                      <div class="form-group row px-5">
                        <div class="col-sm-6">
                          @if($errors->any())
                          <p class="section-title bg-warning rounded px-2">{{$errors->first()}}</p>
                          @endif

                        </div>
                      </div>

                      <div class="form-group row px-5">
                        <label for="date" class="col-form-label col-sm-2">From</label>
                        <div class="col-sm-6">
                          <input type="date" class="form-control input-sm" id="fromdate" name="date" required>

                        </div>
                      </div>


                      <div class="form-group row px-5">
                        <label for="date" class="col-form-label col-sm-2">To</label>
                        <div class="col-sm-6">
                          <input type="date" class="form-control input-sm" id="todate" name="todate" required>

                        </div>
                      </div>

                      <div class="form-group row px-5">
                        <label for="date" class="col-form-label col-sm-2">Search</label>
                        <div class="col-sm-6">
                          <button type="submit" class="btn btn-primary" name="search" title="Search"><i class="fa fa-search" aria-hidden="true"></i></button>

                        </div>



                      </div>
                  </div>
                  </form>

                  <div class="col-md-3">
                    <form action="{{route('company.by.status')}}" method="GET">
                      <label>By Status</label>
                      <select class="custom-select" name="status">
                        <option selected>Choose...</option>
                        <option value="Incorporated">Incorporated</option>
                        <option value="Reserved">Reserved</option>
                      </select>
                      <div class="d-flex mt-4">
                        <label for="date" class="col-form-label">Search</label>
                        <div class="">
                          <button type="submit" class="btn btn-primary ml-3" name="search" title="Search"><i class="fa fa-search" aria-hidden="true"></i></button>

                        </div>
                      </div>
                  </div>

                  </form>

                  <div class="col-md-3">
                    <form action="{{route('company.by.cro')}}" method="GET">
                      <label>By CRO</label>
                      <select class="custom-select" name="cro">
                        <option selected>Choose...</option>
                        @foreach($cro as $cros)
                        <option value="{{$cros->cro}}">{{$cros->cro}}</option>
                        @endforeach
                      </select>
                      <div class="d-flex mt-4">
                        <label for="date" class="col-form-label">Search</label>
                        <div class="">
                          <button type="submit" class="btn btn-primary ml-3" name="search" title="Search"><i class="fa fa-search" aria-hidden="true"></i></button>

                        </div>
                      </div>
                  </div>

                  </form>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th>Company Name</th>
                      <th>Status</th>
                      <th>Cro</th>
                      <th>Reg_Date</th>
                      <!-- <th>Age</th> -->

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $value)
                    <tr>
                      <td>{{$value->name}}</td>
                      <td>{{$value->status}}</td>
                      <td>{{$value->cro}}</td>
                      <td>{{$value->reg_date}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  </div>





  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
   <script>
        $(document).ready(function() {
            $(".alert").delay(5000).slideUp(300);
        });
    </script>
</body>

</html>