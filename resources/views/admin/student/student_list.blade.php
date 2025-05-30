@extends('admin.layout')

@section('customCss')
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@endsection

@section('content')
<div class="content-wrapper">

    <section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
    <h1>student list</h1>
    </div>
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Student list</li>
    </ol>
    </div>
    </div>
    </div>
    </section>

    <section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">

    <div class="card">

        @if (Session::has('success'))
        <div class="alert alert-success">
          {{ Session::get('success') }}
        </div>
      @endif

    <div class="card-header">

    <form action="">
        <div class="row">
        <div class="col-md-4">
            <select name="academic_year_id" id="" class="form-control">
                <option value="" disabled selected>Select Academic Year</option>
                @foreach ($academic_year as $item)
                   <option value="{{ $item->id }}" {{ $item->id==request('academic_year_id') ? 'selected': ' ' }}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <select name="class_id" id="" class="form-control">
                <option value="" disabled selected>Select Class</option>
                @foreach ($classes as $item)
                   <option value="{{ $item->id }}" {{ $item->id==request('class_id') ? 'selected': ' ' }} >{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
         <div class="col-md-4">
            <input type="submit" value="Filter" class="btn btn-primary btn-sm">
         </div>
    </div>
    </form>
    </div>

    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Academic Year</th>
    <th>Class</th>
    <th>Father's Name</th>
    <th>Mother's Name</th>
    <th>Mobile Number</th>
    <th>Email</th>
    <th>Created Time</th>
    <th>Edit </th>
    <th>Delete</th>
    </tr>
    </thead>
    <tbody>
        @foreach($students as $item)
    <tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->name }} </td>
    <td>{{ $item->studentAcademicYear->name }} </td>
    <td>{{ $item->studentClass->name }} </td>
    <td>{{ $item->father_name }} </td>
    <td>{{ $item->mother_name }} </td>
    <td>{{ $item->mobno }} </td>
    <td>{{ $item->email }} </td>
    <td>{{ $item->created_at }}</td>
    <td> <a href="{{ route('student.edit',$item->id) }}" class="btn btn-primary">Edit</a></td>
    <td> <a href="{{ route('student.delete',$item->id) }}" onclick="return confirm('Are you sure want to delete?');" class="btn btn-danger">Delete</a></td>
    </tr>
    @endforeach


    </tbody>
    {{-- <tfoot>
    <tr>
    <th>Rendering engine</th>
    <th>Browser</th>
    <th>Platform(s)</th>
    <th>Engine version</th>
    <th>CSS grade</th>
    </tr>
    </tfoot> --}}
    </table>
    </div>

    </div>

    </div>

    </div>

    </div>

    </section>

    </div>
@endsection
@section('customJs')
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="dist/js/adminlte.min2167.js?v=3.2.0"></script>

<script src="dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

@endsection
