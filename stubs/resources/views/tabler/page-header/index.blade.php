<div class="page-header d-print-none">
    <div @class([
        'container-xl' => !($fluid ?? false),
        'container-fluid' => ($fluid ?? false),
    ])>
        <div class="row g-2 align-items-center">
            <div class="col">
                @if ($pretitle ?? null)
                    <div class="page-pretitle">
                        {{ $pretitle }}
                    </div>
                @endif
                @if ($title ?? null)
                    <h2 class="page-title">
                        {{ $title }}
                    </h2>
                @endif
            </div>
            @if (isset($slot) && $slot->isNotEmpty())
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        {{ $slot }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
