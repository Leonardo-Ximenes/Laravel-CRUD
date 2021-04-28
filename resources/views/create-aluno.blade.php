<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Cadastro de Aluno</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

</head>
<body>

    <div class="container">
        <form id="form-create" action="{{ route('aluno.store')}}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Aluno</h5>
            </div>

            <div class="modal-body">
                <!-- campo nome -->
                <div class="form-row">
                      <div class="col mb-3">
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid': '' }}" placeholder="Nome" type="text" name="name" id="name">
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name')}}
                            </div>
                        @endif
                      </div>

                      <div class="col mb-3">
                        <input class="form-control {{ $errors->has('last_name') ? 'is-invalid': '' }}" placeholder="Sobrenome" type="text" name="last_name" id="last_name">
                        @if ($errors->has('last_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('last_name')}}
                            </div>
                        @endif
                      </div>
                </div>

                <!-- campo data/genero -->
                <div class="form-row" id="bloco-1">
                    <div class="col-5 mb-3">
                        <input class="form-control" placeholder="Birthday" type="date" name="birthday" id="birthday">
                    </div>

                    <div class="col-7 mb-3 d-flex align-items-center">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" value="H" name="gender" id="male">
                            <label class="custom-control-label" for="male">Homem</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" value="M" name="gender" id="female">
                            <label class="custom-control-label" for="female">Mulher</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" value="O" name="gender" id="other">
                            <label class="custom-control-label" for="other">Outro</label>
                        </div>

                    </div>

                </div>

                <!-- campo endereco -->
                <div class="form-row" id="bloco-2">
                    <div class="col mb-3">
                      <input class="form-control" placeholder="Endereco" type="text" name="address" id="address">
                    </div>
                </div>

                <!-- campo cidade/estado/cep -->
                <div class="form-row" id="bloco-3">
                    <div class="col mb-3">
                      <input class="form-control" placeholder="Cidade" type="text" name="city" id="city">
                    </div>

                    <div class="col mb-3">
                      <input class="form-control" placeholder="Estado" type="text" name="state" id="state">
                    </div>

                    <div class="col mb-3">
                      <input class="form-control" placeholder="CEP" type="text" name="cep" id="cep">
                    </div>
                </div>

                <!-- campo email -->
                <div class="form-row">
                    <div class="col mb-3">
                        <input class="form-control {{ $errors->has('curso') ? 'is-invalid': '' }}" placeholder="Seu email" type="text" name="email" id="email" >
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email')}}
                            </div>
                        @endif
                    </div>

                    <div class="col mb-3">
                      <input class="form-control" placeholder="Celular" type="text" name="cel_number" id="cel_number">
                    </div>
                </div>

                <!-- campo curso -->
                <div class="form-row">
                    <div class="col mb-3">
                        <select class="form-control {{ $errors->has('curso') ? 'is-invalid': '' }}" aria-label=".form-select-lg example" name="curso" id="curso">
                            <option value="" selected>Selecione um Curso</option>
                            <option value="html">HTML</option>
                            <option value="javascript">JavaScript</option>
                            <option value="phyton">Phyton</option>
                          </select>
                          @if ($errors->has('curso'))
                            <div class="invalid-feedback">
                                {{ $errors->first('curso')}}
                            </div>
                          @endif

                    </div>

                </div>

                <!-- campo concordo -->
                <div class="form-row">
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" name="agree" id="agree" value="1">
                        <label class="custom-control-label" for="agree">Concordo com os termos</label>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" id="btn-create" class="btn btn-primary">Enviar</button>
                <button id="btn-erase" class="btn btn-secondary">Limpar</button>
                <a href="{{ route('aluno.index') }}"  class="btn btn-secondary">Voltar</a>
            </div>

        </form>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
