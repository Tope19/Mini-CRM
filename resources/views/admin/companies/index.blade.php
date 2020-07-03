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
                <h5 class="page-title">Add Images to company</h5>
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
                            <h4 class="mt-0 header-title">Create Company</h4>

                            <form class="" enctype="multipart/form-data" method="POST" action="{{ route('submitCompany') }}">{{csrf_field()}}
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <div>
                                        <input type="text" name="name" class="form-control" required placeholder="Enter Company Name"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Company Email</label>
                                    <div>
                                        <input type="email" name="email" class="form-control" required placeholder="Enter Company Email"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Company Logo</label>
                                    <div>
                                       <input type="file" name="logo" required class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Company Website Url</label>
                                    <div>
                                        <input type="text" name="website" class="form-control" required placeholder="Company Url"/>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Web Url</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($companies as $company)
                            <tr>
                                <td>{{$company->id}}</td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->email}}</td>
                                <td>
                                    @if (!empty($company->logo))
                                      <a href="{{ asset('storage/Logo_images/'.$company->logo) }}" target="_blank" class="btn btn-primary btn-block">Click to View Image</a>
                                      {{--  <img src="{{ asset('storage/Logo_images/'.$company->logo) }}" style="width:60px;">  --}}
                                    @endif
                                </td>
                                <td>{{$company->website}}</td>
                                <td>{{ date('F j, Y g:i a',strtotime($company->created_at)) }}</td>
                                <div class="fr"><td class="center"><a href="{{ route('editCompany', $company->id) }}" class="btn btn-primary btn-sm"><i class="ti-pencil"></i></a>
                                    <a  href="{{ route('deleteCompany', $company->id )}}" class="btn btn-primary btn-sm"><i class="ti-trash"></i></a></td>
                                </div>
                            </tr>
                            @endforeach
                            {{ $companies->links() }}
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container fluid -->
@endsection
