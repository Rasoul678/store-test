<?php
// config
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

@if ($paginator->lastPage() > 1)
    <ul class="w-25 bg-dark pagination p-2">
        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }} mr-3">
            <h4>
                <a class="text-light" href="{{ $paginator->url(1) }}" style="text-decoration: none">First</a>
            </h4>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
                $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }} mr-3">
                    <h4>
                        <a class="text-light" href="{{ $paginator->url($i) }}" style="text-decoration: none">{{ $i }}</a>
                    </h4>
                </li>
            @endif
        @endfor
        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <h4>
                <a class="text-light" href="{{ $paginator->url($paginator->lastPage()) }}" style="text-decoration: none">Last</a>
            </h4>
        </li>
    </ul>
@endif