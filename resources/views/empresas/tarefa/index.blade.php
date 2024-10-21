@extends('empresas.layout.admin')

@section('content')

    <div class="container">
        <h2 class="text-center">Minha Agenda - {{ $mesSelecionado->format('F Y') }}</h2>

        <!-- Botões de navegação para mudar de mês -->
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('empresas.tarefa.index', ['mes' => $mesAnterior->format('Y-m')]) }}" class="btn btn-secondary">
                Mês Anterior ({{ $mesAnterior->format('F') }})
            </a>
            <a href="{{ route('empresas.tarefa.index', ['mes' => $mesProximo->format('Y-m')]) }}" class="btn btn-secondary">
                Próximo Mês ({{ $mesProximo->format('F') }})
            </a>
        </div>

        <div class="row">
            @php
                $diasNoMes = $mesSelecionado->daysInMonth; // Número de dias no mês selecionado
                $primeiroDiaDoMes = $mesSelecionado->copy()->startOfMonth(); // Primeiro dia do mês selecionado
                $diaDaSemanaPrimeiroDia = $primeiroDiaDoMes->dayOfWeek; // Qual o dia da semana do primeiro dia do mês
            @endphp

            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Dom</th>
                            <th>Seg</th>
                            <th>Ter</th>
                            <th>Qua</th>
                            <th>Qui</th>
                            <th>Sex</th>
                            <th>Sáb</th>
                        </tr>
                    </thead>
                    <tbody>
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
@endsection
