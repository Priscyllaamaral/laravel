@extends('layouts.padrao')
@section('content')
    <div class="container ajustar">
        <div class="row">
            <div class="col lg-12">
                <div class="card" style="background-color: white;">
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-lg-12">
                            <h3><b>Fornecedores</b></h3>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Pessoal</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Endereço</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Observações</button>
                                </li>
                            </ul>
                            <br>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab"><fornecedor-pessoal/></div>
                            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab"><fornecedor-endereco/></div>
                            <div class="tab-pane" id="contact" role="tabpanel" aria-labelledby="contact-tab"><fornecedor-observacoes/></div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary" style="float:right ; margin-right: 20px">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection