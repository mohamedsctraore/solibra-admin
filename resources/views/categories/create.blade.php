@extends('layouts.master')
@section('title')
@lang('translation.Basic_Elements')
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Forms @endslot
@slot('title') Basic Elements @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Formulaire création categorie</h4>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    
                    <div class="col-lg-12 ms-lg-auto">
                        <div class="mt-5 mt-lg-4">
                            <h5 class="font-size-14 mb-4"> </h5>

                            <form action="{{ route('categories.store') }}" method="post">
                                @csrf
                                <div class="row mb-4">
                                    <label for="horizontal-Fullname-input" class="col-sm-3 col-form-label">Nom Categorie</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nom" value="{{ old('nom') }}" class="form-control" id="horizontal-Fullname-input" placeholder="Entrer le nom complet">
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        

                                        <div class="d-flex flex-wrap gap-3">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light w-md">Valider</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Form Layout -->

@endsection