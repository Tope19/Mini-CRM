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
                <h5 class="page-title">Update Employee Details</h5>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Update Company</h4>

                            <form class="" enctype="multipart/form-data" method="POST" action="{{ route('updateEmployee' , $employeeDetails->id) }}">{{csrf_field()}}
                                <div class="form-group">
                                    <label>First Name</label>
                                    <div>
                                        <input type="text" name="fname" value="{{ $employeeDetails->fname }}" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Last Name</label>
                                    <div>
                                        <input type="text" name="lname" value="{{ $employeeDetails->lname }}" class="form-control"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Select Company</label>
                                    <select name="company_id" value="#" id="company_id" class="form-control">
                                        <option value="{{ $employeeDetails->company_id}}">{{ $employeeDetails->company->name }}</option>
                                        @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <div>
                                        <input type="email" name="email" value="{{ $employeeDetails->email }}" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <div>
                                        <input type="number" name="phone" value="{{ $employeeDetails->phone }}" class="form-control"/>
                                    </div>
                                </div>  

                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Update
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

    </div><!-- container fluid -->
@endsection
