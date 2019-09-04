
<!DOCTYPE html>
<html>
 <head>
  <title>Response Statistics</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />

  <div class="container">
   <h3 align="center">Unsubscriptions Statistics</h3>
    <br />
   @if(count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif

   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   <form method="post" enctype="multipart/form-data" action="{{ url('/unsubscription/import') }}">
    {{ csrf_field() }}
    <div class="form-group">
     <table class="table">
      <tr>
       <td width="40%" align="right"><label>Select File for Upload</label></td>
       <td width="30">
        <input type="file" name="select_file" />
       </td>
       <td width="30%" align="left">
        <input type="submit" name="upload" class="btn btn-primary" value="Upload">
       </td>
      </tr>
      <tr>
       <td width="40%" align="right"></td>
       <td width="30"><span class="text-muted">.xls, .xlsx</span></td>
       <td width="30%" align="left"></td>
      </tr>
     </table>
    </div>
   </form>

   <br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Panel Data</h3>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-bordered table-striped">
       <tr>
        <th>Pseudonym</th>
        <th>Panel Status</th>
        <th>Panel Credit Points</th>
        <th>Panel Enterance Date</th>
        <th>Recruitment Source</th>
        <th>Age</th>
        <th>Gender</th>
        <th>ATS</th>
        <th>Date</th>
        <th>RTS1</th>
        <th>RTS2</th>


       </tr>
       @foreach($data as $row)
       <tr>
        <td>{{$row->psudonym}}</td>
        <td>{{$row->pstatus}}</td>
        <td>{{$row->pcredit_points}}</td>
        <td>{{$row->penter_date}}</td>
        <td>{{$row->reg_code}}</td>
        <td>{{$row->m_age}}</td>
        <td>{{$row->m_gender_expanded}}</td>
        <td>{{$row->ats}}</td>
        <td>{{$row->datetime}}</td>
        <td>{{$row->rts2082}}</td>
        <td>{{$row->rts2084}}</td>

       </tr>
       @endforeach
      </table>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
