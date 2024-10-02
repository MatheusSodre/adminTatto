<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    {{-- Base Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Custom Meta Tags --}}
    @yield('meta_tags')

    {{-- Title --}}
    <title>
        @yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title', config('adminlte.title', 'AdminLTE 3'))
        @yield('title_postfix', config('adminlte.title_postfix', ''))
    </title>

    {{-- Custom stylesheets (pre AdminLTE) --}}
    @yield('adminlte_css_pre')

    {{-- Base Stylesheets --}}
    @if (!config('adminlte.enabled_laravel_mix'))
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-fileinput@5.2.3/css/fileinput.min.css" rel="stylesheet">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

        @if (config('adminlte.google_fonts.allowed', true))
            <link rel="stylesheet"
                href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        @endif
    @else
        <link rel="stylesheet" href="{{ mix(config('adminlte.laravel_mix_css_path', 'css/app.css')) }}">
    @endif

    {{-- Extra Configured Plugins Stylesheets --}}
    @include('adminlte::plugins', ['type' => 'css'])

    {{-- Livewire Styles --}}
    @if (config('adminlte.livewire'))
        @if (intval(app()->version()) >= 7)
            @livewireStyles
        @else
            <livewire:styles />
        @endif
    @endif

    {{-- Custom Stylesheets (post AdminLTE) --}}
    @yield('adminlte_css')

    {{-- Favicon --}}
    @if (config('adminlte.use_ico_only'))
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
    @elseif(config('adminlte.use_full_favicon'))
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicons/android-icon-192x192.png') }}">
        <link rel="manifest" crossorigin="use-credentials" href="{{ asset('favicons/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>

<body class="@yield('classes_body')" @yield('body_data')>

    {{-- Body Content --}}
    @yield('body')

    {{-- Base Scripts --}}
    @if (!config('adminlte.enabled_laravel_mix'))
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script>
            $(document).ready(function() {
                $.fn.datepicker.dates['pt_BR'] = {
                    days: ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'],
                    daysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
                    daysMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
                    months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    today: 'Hoje',
                    clear: 'Limpar',
                    weekStart: 0,
                };

                // Agora você pode inicializar o datepicker com a configuração de idioma
                $('#calendario').datepicker({
                    format: 'mm/yyyy',
                    autoclose: true,
                    todayHighlight: true,
                    language: 'pt_BR',
                    minViewMode: 1, // Exibe apenas o mês e o ano
                    viewMode: 1,
                });
            });

            $(document).ready(function() {
                $('.cnpj').mask('00.000.000/0000-00');
                $('#money').mask("#.##0,00", {reverse: true});
                $('#money_down_payment').mask("#.##0,00", {reverse: true});
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap-fileinput@5.2.3/js/fileinput.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#file-upload").fileinput({
                    browseClass: "btn btn-primary", // Classe para o botão de busca de arquivos
                    browseLabel: 'Procurar Arquivos', // Texto do botão de busca de arquivos
                    browseIcon: '<i class="fas fa-search"></i>', // Ícone do botão de busca de arquivos
                    removeLabel: 'Remover', // Texto do botão de remover
                    removeIcon: '<i class="fas fa-trash"></i>', // Ícone do botão de remover
                    uploadLabel: 'Upload', // Texto do botão de upload
                    uploadIcon: '<i class="fas fa-upload"></i>', // Ícone do botão de upload
                    theme: 'fas', // Exemplo de tema, você pode escolher o que preferir
                    showUpload: false, // Exibe o botão de upload
                    showRemove: true, // Exibe o botão de remover
                    browseOnZoneClick: true, // Permite que o usuário clique na zona de arrastar e soltar para selecionar arquivos
                    allowedFileExtensions: ['jpg', 'png', 'pdf'], // Extensões de arquivos permitidas
                    maxFileSize: 2048, // Tamanho máximo de arquivo em KB
                    maxFileCount: 5, // Número máximo de arquivos que podem ser selecionados
                    overwriteInitial: true, // Não sobrescreve a visualização inicial
                    initialPreviewAsData: true, // Exibe a visualização inicial como dados
                    showPreview: true, // Exibe a visualização do arquivo
                    showCaption: true, // Exibe o título do arquivo
                    browseClass: "btn btn-primary", // Classe para o botão de busca de arquivos
                    dropZoneEnabled: true, // Habilita a zona de arrastar e soltar
                    uploadAsync: false, // Define o upload como síncrono, enviando todos os arquivos em uma única requisição
                    language: 'pt_BR', // Define o idioma

                    // Adicione as seguintes linhas para traduzir o FileInput para português
                    dropZoneTitle: 'Arraste e solte os arquivos aqui... <span class="fileinput-button-text">ou clique para selecionar</span>',
                    msgFilesTooMany: 'Você selecionou {n} arquivos. Por favor, selecione {m} ou menos.',
                    msgFilesTooFew: 'Por favor, selecione pelo menos {n} arquivos.',
                    msgFileNotFound: 'Arquivo não encontrado!',
                    msgFileSecured: 'O acesso ao arquivo é restrito.',
                    msgFileNotReadable: 'O arquivo não pode ser lido.',
                    msgFilePreviewAborted: 'A visualização do arquivo foi abortada.',
                    msgFilePreviewError: 'Ocorreu um erro ao visualizar o arquivo.',
                    msgInvalidFileType: 'Tipo de arquivo inválido. Por favor, selecione um arquivo {types}.',
                    msgInvalidFileExtension: 'Extensão de arquivo inválida. Por favor, selecione um arquivo com extensão {extensions}.',
                    msgUploadAborted: 'O upload foi abortado.',
                    msgUploadThreshold: 'Upload em andamento...',
                    msgUploadBegin: 'Iniciando o upload...',
                    msgUploadEnd: 'Upload concluído.',
                    msgUploadEmpty: 'Nenhum arquivo foi selecionado.',
                    msgUploadError: 'Ocorreu um erro durante o upload.',
                    msgUploadTimeout: 'O tempo de upload expirou.',
                    msgUploadTooLarge: 'O arquivo é muito grande. Por favor, selecione um arquivo com tamanho máximo de {sizeLimit}.',
                    msgSelected: '{n} arquivo(s) selecionado(s).',
                    msgFoldersNotAllowed: 'Não é permitido selecionar pastas!',
                    msgImageWidthSmall: 'A largura da imagem deve ser de pelo menos {size} px.',
                    msgImageHeightSmall: 'A altura da imagem deve ser de pelo menos {size} px.',
                    msgImageWidthLarge: 'A largura da imagem deve ser de no máximo {size} px.',
                    msgImageHeightLarge: 'A altura da imagem deve ser de no máximo {size} px.',
                    msgImageResize: 'A imagem será redimensionada para {width} x {height} px.',
                    msgImageResizeConfirmation: 'Você deseja redimensionar a imagem para {width} x {height} px?',
                    msgSizeTooSmall: 'O arquivo é muito pequeno. Por favor, selecione um arquivo com tamanho mínimo de {sizeLimit}.',
                    msgPlaceholder: 'Arraste e solte os arquivos aqui... ou clique para selecionar', // Texto de placeholder
                    fileActionSettings: { // Configurações de ações sobre o arquivo (como remover, visualizar)
                        showRemove: true,
                        showUpload: false,
                        showZoom: true,
                        showDrag: true // Habilita a opção de arrastar os arquivos dentro do input
                    },
                });
            });
        </script>
    @else
        <script src="{{ mix(config('adminlte.laravel_mix_js_path', 'js/app.js')) }}"></script>
    @endif

    {{-- Extra Configured Plugins Scripts --}}
    @include('adminlte::plugins', ['type' => 'js'])

    {{-- Livewire Script --}}
    @if (config('adminlte.livewire'))
        @if (intval(app()->version()) >= 7)
            @livewireScripts
        @else
            <livewire:scripts />
        @endif
    @endif

    {{-- Custom Scripts --}}
    @yield('adminlte_js')

</body>

</html>
