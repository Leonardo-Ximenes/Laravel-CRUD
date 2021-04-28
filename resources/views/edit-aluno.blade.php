<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Editar Aluno</title>
</head>

<body>

    <div class="container">        
        <form id="form-edit" action="{{ route('aluno.update', ['aluno'=> $aluno->id ]) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Editar Aluno</h5>
            </div>
            
            <div class="modal-body">
                <!-- campo nome -->
                <div class="form-row">
                      <div class="col mb-3">
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid': '' }}" placeholder="Nome" type="text" name="name" id="name" value="{{ $aluno->name}}">
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name')}}  
                            </div>                                     
                        @endif
                      </div>
              
                      <div class="col mb-3">
                        <input class="form-control {{ $errors->has('last_name') ? 'is-invalid': '' }}" placeholder="Sobrenome" type="text" name="last_name" id="last_name" value="{{ $aluno->last_name }}">
                        @if ($errors->has('last_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('last_name')}}  
                            </div>                                     
                        @endif
                      </div>
                </div>

                <!-- nao informar dados endereco -->
                <div class="form-row">
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" name="no_info" id="no_info" value="1">
                        <label class="custom-control-label" for="no_info">Não Informar Endereço</label>
                    </div>
                </div>

                <!-- campo data/genero -->
                <div class="form-row" id="bloco-1">
                    <div class="col-5 mb-3">
                        <input class="form-control" placeholder="Birthday" type="date" name="birthday" id="birthday" value="{{ $aluno->birth}}">
                    </div>

                    <div class="col-7 mb-3 d-flex align-items-center">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" value="H" name="gender" id="male" {{ $aluno->gender == 'H' ? 'checked' :''}}>
                            <label class="custom-control-label" for="male">Homem</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" value="M" name="gender" id="female" {{ $aluno->gender == 'M' ? 'checked' :''}}>
                            <label class="custom-control-label" for="female">Mulher</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" value="O" name="gender" id="other" {{ $aluno->gender == 'O' ? 'checked' :''}}>
                            <label class="custom-control-label" for="other">Outro</label>
                        </div>
                    </div>
                </div>

                <!-- campo endereco -->
                <div class="form-row" id="bloco-2">
                    <div class="col mb-3">
                      <input class="form-control" placeholder="Endereco" type="text" name="address" id="address" value="{{ $aluno->address }}">
                    </div>
                </div>

                <!-- campo cidade/estado/cep -->
                <div class="form-row" id="bloco-3">
                    <div class="col mb-3">
                      <input class="form-control" placeholder="Cidade" type="text" name="city" id="city" value="{{ $aluno->city }}">
                    </div>
            
                    <div class="col mb-3">
                      <input class="form-control" placeholder="Estado" type="text" name="state" id="state" value="{{ $aluno->state }}">
                    </div>
            
                    <div class="col mb-3">
                      <input class="form-control" placeholder="CEP" type="text" name="cep" id="cep" value="{{ $aluno->cep }}">
                    </div>
                </div>

                <!-- campo email -->
                <div class="form-row">
                    <div class="col mb-3">
                        <input class="form-control {{ $errors->has('curso') ? 'is-invalid': '' }}" placeholder="Seu email" type="text" name="email" id="email" value="{{ $aluno->email }}">                        
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email')}}  
                            </div>                                     
                        @endif                        
                    </div>            
                    <div class="col mb-3">
                        <input class="form-control" placeholder="Celular" type="text" name="cel_number" id="cel_number" value="{{ $aluno->cel_number }}">
                    </div>
                </div>

                <!-- campo curso -->
                <div class="form-row">
                    <div class="col mb-3">
                        <select class="form-control {{ $errors->has('curso') ? 'is-invalid': '' }}" aria-label=".form-select-lg example" name="curso" id="curso">
                            <option value="">Selecione um Curso</option>
                            <option value="html"       {{ $aluno->curso == 'html' ? 'selected': ''}}>HTML</option>
                            <option value="javascript" {{ $aluno->curso == 'javascript' ? 'selected': ''}}>JavaScript</option>
                            <option value="phyton"     {{ $aluno->curso == 'phyton' ? 'selected': ''}}>Phyton</option>
                        </select>
                        @if ($errors->has('curso'))
                            <div class="invalid-feedback">
                                {{ $errors->first('curso')}}  
                            </div>                                     
                        @endif
                    </div>
                </div>
            </div>

            <!-- footer -->
            <div class="modal-footer">
                <button type="submit" id="btn-create" class="btn btn-primary">Alterar</button>
                <a href="{{ route('aluno.index') }}"  class="btn btn-secondary">Voltar</a> 
            </div>

        </form>
    </div>
     
    <script src="{{asset('js/utils.js')}}" type="text/javascript"></script>
</body>
</html>