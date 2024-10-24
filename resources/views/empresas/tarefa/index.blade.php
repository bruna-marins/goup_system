@extends('empresas.layout.admin')

@section('content')


<!-- Cabeçalho -->
<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">Minha Agenda - <strong>{{ $mesSelecionado->format('F Y') }}</strong></h3>
    </div>
    <!-- botao -->
    <div class="ms-md-auto py-2 py-md-0">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('holdings.holding.create') }}" class="btn btn btn-secondary btn-sm" title="Cadastrar Nova Holding">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </div>
    <!-- botao -->
</div>
<!-- Cabeçalho -->

<!-- COnteudo -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <!--Inserir o COnteudo da página -->
                <!-- Botões de navegação para mudar de mês -->
                <div class="d-flex justify-content-between mb-4">
                    <a href="{{ route('empresas.tarefa.index', ['mes' => $mesAnterior->format('Y-m')]) }}" class="btn btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> {{ $mesAnterior->format('F') }}
                    </a>
                    <a href="{{ route('empresas.tarefa.index', ['mes' => $mesProximo->format('Y-m')]) }}" class="btn btn-secondary">
                        {{ $mesProximo->format('F')  }} <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>


                <div class="row">
                    <div class="col-md-4 text-left">
                        <span class="btn-group">
                            <button class="js-cal-prev btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> </button>
                            <button class="js-cal-next btn btn-secondary"><i class="fa-solid fa-arrow-right"></i></button>
                        </span>
                       
                    </div>
                    <div class="col-md-4 text-center">
                        <h3 class="fw-bold mb-3">{{ $mesSelecionado->format('F Y') }}</h3>
                    </div>
                    <div class="col-md-4 text-right">
                        <span class="btn-group">
                            <button class="js-cal-option btn btn-secondary " data-mode="year">Año</button>
                            <button class="js-cal-option btn btn-secondary " data-mode="month">Mes</button>
                            <button class="js-cal-option btn btn-secondary " data-mode="week">Semana</button>
                            <button class="js-cal-option btn btn-secondary " data-mode="day">Dia</button>
                          </span>
                    </div>
                </div>

                <div class="row">
                    @php
                        $diasNoMes = $mesSelecionado->daysInMonth; // Número de dias no mês selecionado
                        $primeiroDiaDoMes = $mesSelecionado->copy()->startOfMonth(); // Primeiro dia do mês selecionado
                        $diaDaSemanaPrimeiroDia = $primeiroDiaDoMes->dayOfWeek; // Qual o dia da semana do primeiro dia do mês
                    @endphp

                    <div class="col-12">
                        <div class="table-responsive">

                            <table class="table table-striped table-bordered table-hover mt-3">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th>Dom</th>
                                        <th>Seg</th>
                                        <th>Ter</th>
                                        <th>Qua</th>
                                        <th>Qui</th>
                                        <th>Sex</th>
                                        <th>Sáb</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <!-- Começar uma nova linha -->
                                    <tr>
                                        <!-- Preencher com células vazias até o primeiro dia do mês -->
                                        @for ($j = 0; $j < $diaDaSemanaPrimeiroDia; $j++)
                                            <td></td>
                                        @endfor

                                        <!-- Preencher os dias do mês -->
                                        @for ($i = 1; $i <= $diasNoMes; $i++)
                                            @php
                                                $dataAtual = $mesSelecionado->copy()->day($i)->toDateString(); // Obter a data no formato YYYY-MM-DD
                                                $quantidadeTarefas = $tarefasPorData[$dataAtual] ?? 0; // Verifica se existem tarefas para o dia e obtém a quantidade
                                            @endphp

                                            <td>
                                                
                                                <a href="{{ route('empresas.tarefa.create', $dataAtual) }}" class="btn btn-light">
                                                    {{ $i }}
                                                </a>
                                                <a href="{{ route('empresas.tarefa.show', $dataAtual) }}">
                                                    @if ($quantidadeTarefas > 0)
                                                        <span class="badge badge-warning">{{ $quantidadeTarefas }} Tarefa(s)</span>
                                                    @endif
                                                </a>
                                            </td>

                                            <!-- Se for o último dia da semana (sábado), fechar a linha -->
                                            @if (($i + $diaDaSemanaPrimeiroDia) % 7 == 0)
                                    </tr>
                                    <tr> <!-- Fecha e abre uma nova linha -->
                                        @endif
                                        @endfor

                                        <!-- Fechar a última linha se necessário -->
                                        @if (($diasNoMes + $diaDaSemanaPrimeiroDia) % 7 != 0)
                                            @for ($j = ($diasNoMes + $diaDaSemanaPrimeiroDia) % 7; $j < 7; $j++)
                                                <td></td> <!-- Preencher com células vazias até o final da semana -->
                                            @endfor
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
