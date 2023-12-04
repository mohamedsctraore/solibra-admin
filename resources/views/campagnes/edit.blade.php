@extends('layouts.master')
@section('title')
@lang('translation.Cards')
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') UI Elements @endslot
@slot('title') Cards @endslot
@endcomponent

<div class="row">
<div class="col-xl-4">
        
    </div>
<div class="col-xl-8 mb-3">
        <div class="float-end">
            <table>
                <form action="{{route ('clients.create')}}" method="post">
                     <td valign="bottom"><input type="file" class="form-control"  name="excel" id=""></td>
                     <td valign="bottom"><button type="submit" class="btn btn-primary"><i class="mdi mdi-file me-1"></i> Charger via Excel</button></td>
                </form>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $campagne->nom }}</h4>
                <h6 class="card-subtitle font-14 text-muted">{{ $categorie->nom }}</h6>
            </div><!-- end cardbody -->
            <img class="img-fluid" src="{{ $campagne->media }}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">{{ $campagne->contenu }}</p>
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-md-6 col-xl-9">
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
                        <th>Profession</th>
                        <th>Telephone</th>
                        <th style="width: 120px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td>
                            <div class="form-check text-center font-size-16">
                                <input type="checkbox" class="form-check-input" id="invoicecheck1">
                                <label class="form-check-label" for="invoicecheck1"></label>
                            </div>
                        </td>

                        <td><a href="javascript: void(0);" class="text-dark fw-bold">{{ $client->id }}</a> </td>
                        <td>
                        {{ $client->nom }}
                        </td>
                        <td>{{ $client->profession }}</td>
                        <td>{{ $client->telephone }}</td>

                        <td>
                            <form action="{{ route('campagnes.send') }}" method="POST">
                                @csrf
                                <input type="hidden" id="field3" name="field3" value="{{ $campagne->id }}">
                                <input type="hidden" id="field1" name="field1" value="{{ $campagne->contentsid }}">
                                <input type="hidden" id="field2" name="field2" value="{{ $client->telephone }}">
                                <button id="submitButton" type="submit" onClick="send()" class="px-3 text-primary"><i class="uil uil-message font-size-20"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
<!-- end row -->
    </div><!-- end col -->
</div>
<!-- end row -->

@endsection
@section('script')
<script>
    function send() {
        const formData = {
            field1: document.getElementById('field1').value,
            field2: document.getElementById('field2').value,
        };

        fetch('/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.message);
        })
        .catch(error => console.error(error));
    }
</script>
@endsection