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
                <h4 class="card-title">Formulaire création campagne</h4>

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

                            <form action="{{ route('campagnes.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <label for="horizontal-Fullname-input" class="col-sm-3 col-form-label">Nom campagne</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nom" value="{{ old('nom') }}" class="form-control" id="horizontal-Fullname-input" placeholder="Entrer le nom de la campagne">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="horizontal-Fullname-input" class="col-sm-3 col-form-label">Media</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="media" value="{{ old('media') }}" class="form-control" id="horizontal-Fullname-input" accept="image/*,video/*,.pdf" >
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="horizontal-Fullname-input" class="col-sm-3 col-form-label">Categorie</label>
                                    <div class="col-sm-9">
                                        <select name="categorie_id" class="form-select">
                                            <option value="1">Selectionnez une catégorie</option>
                                            @foreach($categories as $categorie)
                                                <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="horizontal-Fullname-input" class="col-sm-3 col-form-label">Contenu campagne</label>
                                    <div class="col-sm-9">
                                        <textarea id="elm1" name="contenu"></textarea>
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
@section('script')
    <script src="{{ URL::asset('/assets/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-editor.init.js') }}"></script>
@endsection