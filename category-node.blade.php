<li>
    @if ($node->childrenRecursive->isNotEmpty())
        <details {{ request('category') === $node->slug ? 'open' : '' }}>
            <summary class="@if (request('category') == $node->slug) text-gray-800 font-semibold @endif hover:text-gray-700">
                {{ $node->name }}
            </summary>
            <ul>
                @foreach ($node->childrenRecursive as $child)
                    @include('partial.category-node', ['node' => $child])
                @endforeach
            </ul>
        </details>
    @else
        <a href="?category={{ $node->slug }}"
            class="@if (request('category') == $node->slug) text-gray-800 font-semibold @endif hover:text-gray-700 transition-colors duration-200">
            {{ $node->name }}
        </a>
    @endif
</li>