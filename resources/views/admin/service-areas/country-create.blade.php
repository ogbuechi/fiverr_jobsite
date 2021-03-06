@extends('admin.layouts.admin-app')

@section('css')
<script src="{{ asset('lib/datatables/jquery.dataTables.css') }}"></script>
@endsection
@section('js')
<script>
    $(function(){
        'use strict'

        $('.form-layout .form-control').on('focusin', function(){
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('.form-layout .form-control').on('focusout', function(){
          $(this).closest('.form-group').removeClass('form-group-active');
        });

        // Select2
        $('#select2-a, #select2-b').select2({
          minimumResultsForSearch: Infinity
        });

        $('#select2-a').on('select2:opening', function (e) {
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('#select2-a').on('select2:closing', function (e) {
          $(this).closest('.form-group').removeClass('form-group-active');
        });

      });
</script>
@endsection
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">

    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="position:center; ">
        <h4 class="tx-gray-800 mg-b-5">Add Country</h4>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">

            <div class="row mg-t-10">
                <div class="col-xl-12">

                    @if ($errors->any())

                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success_message') }}
                            </div>
                        @endif


                        <form action="{{ route('admin.countries.store') }}" method="POST">
                        @csrf
                    <div class="form-layout form-layout-4">
                        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Add Country</h6>

                        <div class="row">
                            <label class="col-sm-4 form-control-label">Add Country: <span
                                    class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" placeholder="Add Country" required name="name">
                            </div>

                        </div>


                        <div class="form-layout-footer mg-t-30">
                            <button class="btn btn-info" type="submit">Submit </button>
                            <a href="{{ route('admin.countries.index') }}" class="btn btn-secondary">Cancel</a>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                    </form>
                </div><!-- col-6 -->

            </div>
        </div>

    </div><!-- br-mainpanel -->
@endsection
