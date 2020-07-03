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
                <h5 class="page-title">Update Company Details</h5>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Update Company</h4>

                            <form class="" enctype="multipart/form-data" method="POST" action="{{ route('updateCompany' , $companyDetails->id) }}">{{csrf_field()}}
                                <div class="form-group">
                                    <label>Name</label>
                                    <div>
                                        <input type="text" name="name" value="{{ $companyDetails->name }}" class="form-control" required placeholder="Enter Company Name"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <div>
                                        <input type="email" name="email" value="{{ $companyDetails->email }}" class="form-control" required placeholder="Enter Company Email"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Logo</label>
                                    <div>
                                        <input type="file" name="logo" class="form-control" value="{{ $companyDetails->logo }}" id="logo" />
                                        @if (!empty($companyDetails->logo))
                                        {{--  //<a href="{{ asset('storage/Logo_images/'.$companyDetails->logo) }}" target="_blank" class="btn btn-primary btn-block">Click to View Image</a>  --}}
                                        <img src="{{ asset('storage/Logo_images/'.$companyDetails->logo) }}" style="width:60px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Website Url</label>
                                    <div>
                                        <input type="text" name="website" value="{{ $companyDetails->website }}" class="form-control" required placeholder="Enter Company Website Url"/>
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
