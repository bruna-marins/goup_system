@extends('layout.admin')

@section('content')

<div class="container">
    <div id="calendar-container">
        <!-- O conteúdo inicial do calendário será carregado aqui via AJAX -->
        @include('tarefa.calendar', ['mesSelecionado' => $mesSelecionado, 'tarefasPorData' => []])
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Função para alterar o mês via AJAX
    $(document).on('click', '.btn-change-month', function(e) {
        e.preventDefault();
        
        var mes = $(this).data('mes'); // Pega o mês selecionado (Y-m)

        // Requisição AJAX para carregar o calendário do mês selecionado
        $.ajax({
            url: '{{ route('tarefa.calendar') }}', // Rota que processa o calendário via AJAX
            type: 'GET',
            data: { mes: mes },
            success: function(data) {
                $('#calendar-container').html(data); // Atualiza o calendário com o conteúdo retornado
            },
            error: function(xhr, status, error) {
                console.error(error); // Exibe erros no console, caso ocorram
            }
        });
    });
</script>
@endsection
