<div @class([
    'page',
    'page-wrapper' => $type === 'horizontal' || $type === 'boxed' || $type === 'fluid',
])>
    @if ($type === 'vertical' || $type === 'combo' || $type === 'condensed')
        {{ $sidebar ?? '' }}
    @endif

    <div class="page-wrapper">
        @if ($type === 'horizontal' || $type === 'combo' || $type === 'boxed' || $type === 'fluid' || $type === 'navbar-overlap')
            {{ $navbar ?? '' }}
        @endif

        {{ $slot }}

        <footer class="footer footer-transparent d-print-none">
            <div @class([
                'container-xl' => $type !== 'fluid',
                'container-fluid' => $type === 'fluid',
            ])>
                <div class="row text-center align-items-center flex-row-reverse">
                    <div class="col-lg-auto ms-lg-auto">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item"><a href="#" class="link-secondary">Documentación</a></li>
                            <li class="list-inline-item"><a href="#" class="link-secondary">Soporte</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item">
                                Copyright &copy; {{ date('Y') }}
                                <a href="." class="link-secondary">Tabler</a>.
                                Todos los derechos reservados.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
