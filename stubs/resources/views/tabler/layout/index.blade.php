@php
    $type = $type ?? 'vertical';
    $sticky = $sticky ?? false;
    $overlap = $overlap ?? false;
    $theme = $theme ?? 'light';
@endphp

<div @class([
    'page',
    'page-wrapper' => $type === 'horizontal' || $type === 'boxed' || $type === 'fluid',
])>
    @if ($type === 'vertical' || $type === 'combo' || $type === 'condensed')
        @php
            $theme = $theme ?? 'dark';
            $logo = $logo ?? null;
            $brand = $brand ?? 'Tabler';
        @endphp

        <aside @class([
            'navbar navbar-vertical navbar-expand-lg',
            'navbar-dark' => $theme === 'dark',
            'navbar-light' => $theme === 'light',
        ]) data-bs-theme="{{ $theme }}">
            {{ $sidebar ?? '' }}
        </aside>
    @endif

    <div class="page-wrapper">
        @if ($type === 'horizontal' || $type === 'combo' || $type === 'boxed' || $type === 'fluid' || $type === 'navbar-overlap')
            {{ $navbar ?? '' }}
        @endif

        @php
            $title = $title ?? null;
            $subtitle = $subtitle ?? null;
        @endphp

        <div class="page-header d-print-none" {{ $attributes }}>
            {{ $slot }}
        </div>

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
