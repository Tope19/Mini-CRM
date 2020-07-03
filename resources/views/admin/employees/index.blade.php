@extends('admin.layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Drixo</a></li>
                        <li class="breadcrumb-item"><a href="#">Forms</a></li>
                        <li class="breadcrumb-item active">Form Validation</li>
                    </ol>
                </div>
                <h5 class="page-title">Add Employees </h5>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            @if (Session::has('flash_message_error'))
                            <div class="alert alert-error alert-block">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{!! session('flash_message_error') !!}</strong>
                            </div>
                        @endif
                        @if (Session::has('flash_message_success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{!! session('flash_message_success') !!}</strong>
                            </div>
                        @endif
                            <h4 class="mt-0 header-title">Create Employee</h4>

                            <form class="" enctype="multipart/form-data" method="POST" action="{{ route('submitEmployee') }}">{{csrf_field()}}
                                <div class="form-group">
                                    <label>Employees First Name</label>
                                    <div>
                                        <input type="text" name="fname" class="form-control" required placeholder="Enter Employee First Name"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Employees Last Name</label>
                                    <div>
                                        <input type="text" name="lname" class="form-control" required placeholder="Enter Employee Last Name"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Select Company</label>
                                    <select name="company_id" value="#" id="company_id" class="form-control">
                                        <option  disabled selected>Select</option>
                                        @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                      </select>
                                </div>

                                <div class="form-group">
                                    <label>Employee Email</label>
                                    <div>
                                        <input type="email" name="email" class="form-control" required placeholder="Enter Employee Email"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Employee Phone Number</label>
                                    <div>
                                        <input type="number" name="phone" class="form-control" required placeholder="Employee Phone Number"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">View Created Companies</h4>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->fname }}</td>
                                    <td>{{ $employee->lname }}</td>
                                    <td>{{ $employee->company->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ date('F j, Y g:i a',strtotime($employee->created_at)) }}</td>
                                    <div class="fr"><td class="center"><a href="{{ route('editEmployee', $employee->id) }}" class="btn btn-primary btn-sm"><i class="ti-pencil"></i></a>
                                        <a  href="{{ route('deleteEmployee', $employee->id )}}" class="btn btn-primary btn-sm"><i class="ti-trash"></i></a></td>
                                    </div>
                            @endforeach
                            {{ $employees->links() }}
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container fluid -->
@endsection
