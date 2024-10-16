<div class="d-flex justify-content-between mb-4">
    <a href="#" class="btn btn-secondary btn-change-month" data-mes="{{ $mesAnterior->format('Y-m') }}">
        Mês Anterior ({{ $mesAnterior->format('F') }})
    </a>
    <h2 class="text-center">{{ $mesSelecionado->format('F Y') }}</h2>
    <a href="#" class="btn btn-secondary btn-change-month" data-mes="{{ $mesProximo->format('Y-m') }}">
        Próximo Mês ({{ $mesProximo->format('F') }})
    </a>
</div>

<div class="table-responsive">
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
            <tr>
                @php
                    $diasNoMes = $mesSelecionado->daysInMonth;
                    $primeiroDiaDoMes = $mesSelecionado->copy()->startOfMonth();
                    $diaDaSemanaPrimeiroDia = $primeiroDiaDoMes->dayOfWeek;
                @endphp

                <!-- Preenche com células vazias até o primeiro dia do mês -->
                @for ($j = 0; $j < $diaDaSemanaPrimeiroDia; $j++)
                    <td></td>
                @endfor

                <!-- Preencher os dias do mês -->
                @for ($i = 1; $i <= $diasNoMes; $i++)
                    @php
                        $dataAtual = $mesSelecionado->copy()->day($i)->toDateString();
                        $quantidadeTarefas = $tarefasPorData[$dataAtual] ?? 0;
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

                    @if (($i + $diaDaSemanaPrimeiroDia) % 7 == 0)
            </tr>
            <tr>
                @endif
                @endfor

                @if (($diasNoMes + $diaDaSemanaPrimeiroDia) % 7 != 0)
                    @for ($j = ($diasNoMes + $diaDaSemanaPrimeiroDia) % 7; $j < 7; $j++)
                        <td></td>
                    @endfor
                @endif
            </tr>
        </tbody>
    </table>
</div>
