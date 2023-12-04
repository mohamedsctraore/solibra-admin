@extends('layouts.master')
@section('title')
@lang('translation.Invoice_List')
@endsection
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Invoices @endslot
@slot('title') Invoice List @endslot
@endcomponent

<div class="row">
    <div class="col-md-4">
        <div>
            <a href="{{route ('utilisateurs.create')}}" type="button" class="btn btn-success waves-effect waves-light mb-3"><i class="mdi mdi-plus me-1"></i> Ajouter Utilisateur</a>
        </div>
    </div>
    <div class="col-md-8">
        <div class="float-end">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">

        <div class="table-responsive mb-4">
            <table class="table table-centered datatable dt-responsive nowrap table-card-list" style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
                <thead>
                    <tr class="bg-transparent">
                        <th style="width: 24px;">
                            <div class="form-check text-center font-size-16">
                                <input type="checkbox" class="form-check-input" id="invoicecheck">
                                <label class="form-check-label" for="invoicecheck"></label>
                            </div>
                        </th>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th style="width: 120px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $utilisateur)
                    <tr>
                        <td>
                            <div class="form-check text-center font-size-16">
                                <input type="checkbox" class="form-check-input" id="invoicecheck1">
                                <label class="form-check-label" for="invoicecheck1"></label>
                            </div>
                        </td>

                        <td><a href="javascript: void(0);" class="text-dark fw-bold">{{ $utilisateur->id }}</a> </td>
                        <td>
                        {{ $utilisateur->name }}
                        </td>
                        <td>{{ $utilisateur->email }}</td>

                        <td>
                            <a href="{{ route('utilisateurs.edit', $utilisateur->id) }}" class="px-3 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                                <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"  type="submit" class="px-3 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a >
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end row -->

@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/ecommerce-datatables.init.js') }}"></script>
@endsection
